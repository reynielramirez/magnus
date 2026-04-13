<?php

namespace Drupal\symfony_mailer_office365\Drush\Commands;

use Drupal\Core\Utility\Token;
use Drupal\symfony_mailer_office365\TokenStateManagerInterface;
use Drush\Attributes as CLI;
use Drush\Commands\DrushCommands;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * A Drush commandfile.
 */
final class Office365DrushCommands extends DrushCommands {

  /**
   * Constructs an Office365DrushCommands object.
   */
  public function __construct(
    private readonly Token $token,
    private readonly TokenStateManagerInterface $tokenStateManager,
  ) {
    parent::__construct();
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('token'),
      $container->get('symfony_mailer_office365.token_state_manager'),
    );
  }

  /**
   * Check and refresh state.
   */
  #[CLI\Command(name: 'symfony_mailer_office365:refresh', aliases: ['office365:refresh'])]
  #[CLI\Usage(name: 'symfony_mailer_office365:refresh', description: 'Refreshes if necessary. Unless forced.')]
  #[CLI\Option(name: 'force', description: 'Forces refresh even if not expired')]
  public function checkCommand($options = ['force' => FALSE]) {
    $result = $this->tokenStateManager->refresh($options['force']);
    if (!$result) {
      $this->logger()->success('There was an error. Check system logs.');
    } else {
      $this->logger()->success('Checked succesfully.');
    }
  }

}
