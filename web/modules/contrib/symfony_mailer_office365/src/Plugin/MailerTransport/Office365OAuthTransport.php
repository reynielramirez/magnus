<?php

namespace Drupal\symfony_mailer_office365\Plugin\MailerTransport;

use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;
use Drupal\symfony_mailer\Plugin\MailerTransport\TransportBase;

/**
 * Office365OAuthTransport Mailer Transport.
 *
 * @MailerTransport(
 *   id = "office365_oauth",
 *   label = @Translation("Office 365 - OAuth"),
 *   description = @Translation("Use Office 365 with OAuth."),
 * )
 */
class Office365OAuthTransport extends TransportBase {

  /**
   * {@inheritdoc}
   */
  public function defaultConfiguration() {
    // TODO: DI.
    $config = \Drupal::configFactory()->get('symfony_mailer_office365.config');

    return [
      'smtp_host' => 'smtp.office365.com',
      'smtp_port' => '587',
      'user' => $config->get('mail'),
      'client_id' => $config->get('client_id'),
      'client_secret' => $config->get('client_secret'),
      'tenant_id' => $config->get('tenant_id'),
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $url = Url::fromRoute('symfony_mailer_office365.config');
    $link = Link::fromTextAndUrl($this->t('Click here!'), $url);
    $form['info'] = [
      '#markup' => '<strong>' . $this->t('To configure this transport: ') . '</strong>'
    ];
    $form['link'] = $link->toRenderable();

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getDsn() {
    $query = [
      'tenant_id' => $this->configuration['tenant_id'],
      'user' => $this->configuration['user'],
    ];

    return sprintf("microsoft://%s:%s@%s:%s?%s",
      urlencode($this->configuration['client_id']),
      urlencode($this->configuration['client_secret']),
      urlencode($this->configuration['smtp_host']),
      urlencode($this->configuration['smtp_port']),
      http_build_query($query),
    );
  }

}
