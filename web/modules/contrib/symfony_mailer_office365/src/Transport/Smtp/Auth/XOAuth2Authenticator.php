<?php

namespace Drupal\symfony_mailer_office365\Transport\Smtp\Auth;

use Drupal\symfony_mailer_office365\TokenStateManager;
use Exception;
use Symfony\Component\Mailer\Transport\Smtp\Auth\AuthenticatorInterface;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Drupal\Core\StringTranslation\StringTranslationTrait;

/**
 * XOAUTH2 authenticator.
 */
class XOAuth2Authenticator implements AuthenticatorInterface {
  use StringTranslationTrait;
  /**
   * Constructs the XOAuth2Authenticator object.
   */
  public function __construct(
    protected readonly TokenStateManager $tokenStateManager
  ) {}

  /**
   * {@inheritDoc}
   *
   * Returns the keyword for the XOAUTH2 authentication mechanism.
   *
   * @return string
   *   The XOAUTH2 authentication keyword.
   */
  public function getAuthKeyword(): string {
    return 'XOAUTH2';
  }

  /**
   * {@inheritDoc}
   *
   * Authenticates the SMTP client using the XOAUTH2 mechanism.
   *
   * Retrieves an OAuth2 token from the token provider and constructs the
   * required authentication command to be sent to the SMTP server. This
   * command uses the retrieved token for XOAUTH2-based authentication.
   *
   * @param \Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport $client
   *   The SMTP client being authenticated.
   *
   * @throws \RuntimeException
   *   Throws an exception if token retrieval or authentication fails.
   */
  public function authenticate(EsmtpTransport $client): void {
    $token = $this->tokenStateManager->getToken();
    if (!$token) {
      // TODO: DI.
      $messenger = \Drupal::messenger();
      $messenger->addError($this->t('Could not connect to Office 365'));

      return;
    }

    $access_token = $token->getToken();
    $mail = $this->tokenStateManager->getMail();

    $auth = sprintf("user=%s%sauth=Bearer %s%s%s",
        $mail, chr(1),
        $access_token, chr(1), chr(1),
    );
    $base64 = base64_encode($auth);
    $command = "AUTH XOAUTH2 " . $base64 . "\r\n";
    try {
      $client->executeCommand($command, [235]);
    }
    catch (Exception $e) {
      $this->tokenStateManager->handleException($e, "send mail");
    }
  }

}
