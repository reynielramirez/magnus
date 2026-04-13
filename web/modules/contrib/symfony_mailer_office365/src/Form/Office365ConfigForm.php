<?php

declare(strict_types=1);

namespace Drupal\symfony_mailer_office365\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Link;
use Drupal\Core\Url;

/**
 * Configure Symfony Mailer office365 settings for this site.
 */
final class Office365ConfigForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId(): string {
    return 'symfony_mailer_office365_config';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames(): array {
    return ['symfony_mailer_office365.config'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state): array {
    // TODO: DI
    $token_state_manager = \Drupal::service('symfony_mailer_office365.token_state_manager');

    $form['client_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Client ID'),
      '#description' => $this->t('This can also be called Application ID.'),
      '#default_value' => $this->config('symfony_mailer_office365.config')->get('client_id'),
      '#required' => TRUE,
    ];
    $client_secret = $this->config('symfony_mailer_office365.config')->get('client_secret');
    $description = $this->t('This can also be called Secret Value.');
    if (!empty($client_secret)) {
      $description .= ' ' . $this->t('Leave empty to keep current Client Secret.');
    }
    $form['client_secret'] = [
      '#type' => 'password',
      '#title' => $this->t('Client Secret'),
      '#description' => $description,
      '#required' => empty($client_secret),
      '#attributes' => ['placeholder' => !empty($client_secret) ? str_repeat("*", 40) : ''],
    ];
    $form['tenant_id'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Tenant ID'),
      '#default_value' => $this->config('symfony_mailer_office365.config')->get('tenant_id'),
      '#required' => TRUE,
    ];
    $form['mail'] = [
      '#type' => 'email',
      '#title' => $this->t('E-Mail'),
      '#default_value' => $this->config('symfony_mailer_office365.config')->get('mail'),
      '#required' => TRUE,
    ];

    $form['redirect_url'] = [
      '#prefix' => '<p><label><strong>Redirect URL</strong></label><br/>',
      '#markup' => $token_state_manager->getRedirectUrl(),
      '#suffix' => '</p>',
    ];

    // State.
    $form['state'] = $this->buildStateForm();

    $form['save_hint'] = [
      '#prefix' => '<p><strong>',
      '#suffix' => '</strong></p>',
      '#markup' => $this->t('Careful: Saving this form will clear the state and require re-login.')
    ];

    return parent::buildForm($form, $form_state);
  }

  private function buildStateForm() {
    $build = [];

    $build['set'] = [
      '#type' => 'fieldset',
      '#title' => $this->t('State'),
      '#collapsible' => FALSE,
    ];

    // TODO: DI
    $token_state_manager = \Drupal::service('symfony_mailer_office365.token_state_manager');
    $token = $token_state_manager->getToken();
    if (!$token) {
      $link = Link::fromTextAndUrl($this->t('Login via Microsoft'), Url::fromUri($token_state_manager->getLoginUrl()));

      $content = $this->t('Not functional. Login is needed: ');
      $build['set']['login_indicator'] = [
        '#prefix' => '<p>',
        '#markup' => $content,
        '#suffix' => '</p>',
      ];
      $build['set']['login_indicator']['link'] = $link->toRenderable();
      $build['set']['login_indicator']['callback_hint'] = [
        '#prefix' => '</p>',
        '#markup' => 'Before logging in, make sure to add the Redirect URL in your Microsoft OAuth Configuration.',
        '#suffix' => '</p>',
      ];

      return $build;
    }

    // TODO: DI.
    $date_formatter = \Drupal::service('date.formatter');
    $date_formatted = $date_formatter->format($token->getExpires(), 'custom', 'Y-m-d H:i:s');

    $build['set']['expires'] = [
      '#prefix' => '<p><strong>Expiry date: </strong>',
      '#suffix' => '</p>',
      '#markup' => $date_formatted
    ];

    return $build;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state): void {
    $config = $this->config('symfony_mailer_office365.config')
      ->set('client_id', $form_state->getValue('client_id'))
      ->set('tenant_id', $form_state->getValue('tenant_id'))
      ->set('mail', $form_state->getValue('mail'));

    if (!empty($form_state->getValue('client_secret'))) {
      $config->set('client_secret', $form_state->getValue('client_secret'));
    }

    $config->save();

    // TODO: DI
    $token_state_manager = \Drupal::service('symfony_mailer_office365.token_state_manager');
    $token_state_manager->clear();

    parent::submitForm($form, $form_state);
  }

}
