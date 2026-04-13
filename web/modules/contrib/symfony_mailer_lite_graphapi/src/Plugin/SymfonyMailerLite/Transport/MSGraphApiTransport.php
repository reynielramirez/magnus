<?php

namespace Drupal\symfony_mailer_lite_graphapi\Plugin\SymfonyMailerLite\Transport;

use Drupal\Core\Form\FormStateInterface;
use Drupal\symfony_mailer_lite\Plugin\SymfonyMailerLite\Transport\TransportBase;

/**
 * Defines the Microsoft Graph API Mail Transport plug-in.
 *
 * @SymfonyMailerLiteTransport(
 *   id = "symfony_mailer_lite_graphapi_transport",
 *   label = @Translation("MS Graph API"),
 *   description = @Translation("Use the Microsoft Graph API to send mails."),
 * )
 */
class MSGraphApiTransport extends TransportBase {

  /**
   * {@inheritdoc}
   */
  public function getDsn(): string {
    return 'microsoft-graph-api://' .
      $this->configuration['client_id'] . ':' .
      $this->configuration['client_secret'] . '@' .
      $this->configuration['tenant_id'];
  }

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration(): array {
    return [
      'client_id' => '',
      'client_secret' => '',
      'tenant_id' => '',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state): array {
    $form['client_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Client ID'),
      '#default_value' => $this->configuration['client_id'],
      '#description' => $this->t('The client ID for the Microsoft Graph API.'),
      '#required' => TRUE,
    ];
    $form['client_secret'] = [
      '#type' => 'password',
      '#title' => $this->t('Client Secret'),
      '#default_value' => $this->configuration['client_secret'],
      '#description' => $this->t('The client secret for the Microsoft Graph API.'),
      '#required' => TRUE,
    ];
    $form['tenant_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Tenant ID'),
      '#default_value' => $this->configuration['tenant_id'],
      '#description' => $this->t('The tenant ID for the Microsoft Graph API.'),
      '#required' => TRUE,
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state): void {
    $this->configuration['client_id'] = $form_state->getValue('client_id');
    $this->configuration['client_secret'] = $form_state->getValue('client_secret');
    $this->configuration['tenant_id'] = $form_state->getValue('tenant_id');
  }

}
