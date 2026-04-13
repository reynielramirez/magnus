<?php

declare(strict_types=1);

namespace Drupal\symfony_mailer_office365\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\State\StateInterface;
use Drupal\symfony_mailer_office365\TokenStateManagerInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Returns responses for Symfony Mailer office365 routes.
 */
final class Office365Controller extends ControllerBase {

  /**
   * The controller constructor.
   */
  public function __construct(
    private readonly StateInterface $state,
    private readonly TokenStateManagerInterface $tokenStateManager,
  ) {}

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container): self {
    return new self(
      $container->get('state'),
      $container->get('symfony_mailer_office365.token_state_manager'),
    );
  }

  /**
   * OAuth Callback.
   */
  public function OAuthCallback() {
    // TODO: DI.
    $code = \Drupal::request()->get('code');
    if (!$code) {
      return $this->redirect('<front>');
    }

    $token = $this->tokenStateManager->fetchToken($code);

    // We redirect to front page.
    $messenger = \Drupal::messenger();
    if ($token && !$token->hasExpired()) {
      // TODO: DI.
      $messenger->addMessage($this->t('Login succesful. Everything should be set up.'));
    } else {
      $messenger->addError($this->t('An error logging in occured. Please check system logs.'));
    }

    return $this->redirect('<front>');
  }

}
