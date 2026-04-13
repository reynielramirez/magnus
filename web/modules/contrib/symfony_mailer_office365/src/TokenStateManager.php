<?php

declare(strict_types=1);

namespace Drupal\symfony_mailer_office365;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\State\StateInterface;
use Drupal\Core\Url;
use Exception;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Provider\GenericProvider;
use League\OAuth2\Client\Token\AccessTokenInterface;

/**
 * Token State Manager manages OAuth State and wraps the OAuth Client.
 */
final class TokenStateManager implements TokenStateManagerInterface {

  const SCOPES = [
    "https://outlook.office365.com/IMAP.AccessAsUser.All",
    "https://outlook.office365.com/SMTP.Send",
    "offline_access",
  ];

  private GenericProvider $provider;

  /**
   * Constructs a TokenStateManager object.
   */
  public function __construct(
    private readonly StateInterface $state,
    private readonly ConfigFactoryInterface $configFactory,
    private readonly LanguageManagerInterface $languageManager,
  ) {
    $config = $this->configFactory->get('symfony_mailer_office365.config');

    $tenant_id = $config->get('tenant_id');
    $this->provider = new GenericProvider([
      'clientId'                => $config->get('client_id'),
      'clientSecret'            => $config->get('client_secret'),
      'redirectUri'             => $this->getRedirectUrl(),
      'urlAuthorize'            => $this->getAuthUrl($tenant_id ?? "common"),
      'urlAccessToken'          => $this->getTokenUrl($tenant_id ?? "common"),
      'urlResourceOwnerDetails' => '',
      'scopes' => implode(' ', self::SCOPES),
    ]);
  }

  /**
   * {@inheritdoc}
   */
  protected function store(?AccessTokenInterface $token): void {
    if (!$token) {
      return;
    }
    $this->state->set('office365_oauth_token', $token);
  }

  /**
   * {@inheritdoc}
   */
  protected function load(): ?AccessTokenInterface {
    return $this->state->get('office365_oauth_token');
  }

  /**
   * {@inheritdoc}
   */
  public function getToken(): ?AccessTokenInterface {
    $token = $this->load();
    if (!$token) {
      return NULL;
    }

    if ($token->hasExpired()) {
      $token = $this->refresh();
    }

    return $token;
  }

  /**
   * {@inheritdoc}
   */
  public function clear(): void {
    $this->state->set('office365_oauth_token', NULL);
  }

  /**
   * {@inheritdoc}
   */
  public function getRedirectUrl(): string {
    $language_none = $this->languageManager->getLanguage(LanguageInterface::LANGCODE_NOT_APPLICABLE);
    return Url::fromRoute('symfony_mailer_office365.callback', [], [
      'absolute' => TRUE,
      'language' => $language_none,
    ])->toString();
  }

  /**
   * {@inheritdoc}
   */
  public function getAuthUrl(string $tenant_id): string {
    return "https://login.microsoftonline.com/" . $tenant_id . "/oauth2/v2.0/authorize";
  }

  /**
   * {@inheritdoc}
   */
  public function getTokenUrl(string $tenant_id): string {
    return "https://login.microsoftonline.com/" . $tenant_id . "/oauth2/v2.0/token";
  }

  /**
   * {@inheritdoc}
   */
  public function getLoginUrl(): string {
    return $this->provider->getAuthorizationUrl() . "&login_hint=" . $this->getMail();
  }

  /**
   * {@inheritdoc}
   */
  public function fetchToken(string $code): ?AccessTokenInterface {
    try {
      $token = $this->provider->getAccessToken('authorization_code', ['code' => $code]);
      $this->store($token);

      return $token;
    } catch (Exception $e) {
      $this->handleException($e, "fetch token");
    }

    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  public function getMail(): string {
    return $this->configFactory->get('symfony_mailer_office365.config')->get('mail') ?? "";
  }

  /**
   * {@inheritdoc}
   */
  public function refresh(bool $force = FALSE): ?AccessTokenInterface {
    $token = $this->load();
    if (!$token) {
      // Nothing to refresh.
      return NULL;
    }
    if (!$token->hasExpired() && !$force) {
      return $token;
    }

    try {
      $token = $this->provider->getAccessToken('refresh_token', [
        'refresh_token' => $token->getRefreshToken(),
      ]);
      $this->store($token);
    } catch (Exception $e) {
      $this->handleException($e, "refresh token");

      // Token is expired, we can't refresh.
      // Probably best to clear the token.
      $this->clear();
      return NULL;
    }

    return $token;
  }

  /**
   * {@inheritdoc}
   */
  public function handleException(Exception $e, ?string $context = ""): void {
    // TODO: DI.
    $logger = \Drupal::logger('symfony_mailer_office365');
    $response = "";
    if ($e instanceof IdentityProviderException) {
      $response_body = $e->getResponseBody();
      if (isset($response_body['error_description'])) {
        $response = $response_body['error_description'];
      }
    }

    $msg = "";
    if ($context) {
      $msg .= "($context )";
    }
    $msg .= $e->getMessage();
    if ($response) {
      $msg .= ": $response";
    }
    $logger->error($msg);
  }

}
