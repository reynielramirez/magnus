<?php

namespace Drupal\symfony_mailer_office365;

use Drupal\symfony_mailer_office365\Transport\Smtp\Auth\XOAuth2Authenticator;
use Psr\EventDispatcher\EventDispatcherInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\Mailer\Transport\AbstractTransportFactory;
use Symfony\Component\Mailer\Transport\Dsn;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mailer\Transport\TransportInterface;

/**
 * Factory class for Office365EsmtpTransportFactory.
 */
final class Office365EsmtpTransportFactory extends AbstractTransportFactory {

  /**
   * The XOAUTH2 authenticator instance.
   *
   * @var \Drupal\symfony_mailer_office365\Transport\Smtp\Auth\XOAuth2Authenticator
   */
  protected $authenticator;

  /**
   * Constructs the OAuthEsmtpTransportFactory object.
   *
   * @param \Drupal\symfony_mailer_office365\Transport\Smtp\Auth\XOAuth2Authenticator $authenticator
   *   The XOAUTH2 authenticator used for creating transport.
   * @param \Psr\EventDispatcher\EventDispatcherInterface|null $dispatcher
   *   Optional event dispatcher.
   * @param \Sentry\HttpClient\HttpClientInterface|null $client
   *   Optional HTTP client.
   * @param \Psr\Log\LoggerInterface|null $logger
   *   Optional logger interface.
   */
  public function __construct(
    XOAuth2Authenticator $authenticator,
    ?EventDispatcherInterface $dispatcher = NULL,
    ?HttpClientInterface $client = NULL,
    ?LoggerInterface $logger = NULL,
  ) {
    parent::__construct($dispatcher, $client, $logger);
    $this->authenticator = $authenticator;
  }

  /**
   * {@inheritdoc}
   */
  public function create(Dsn $dsn): TransportInterface {
    $transport = new EsmtpTransport(
      host: $dsn->getHost(),
      port: $dsn->getPort(),
      authenticators: [$this->authenticator],
    );
    $transport->setUsername($dsn->getOption('user'));
    $transport->setPassword($dsn->getPassword());

    return $transport;
  }

  /**
   * {@inheritdoc}
   */
  protected function getSupportedSchemes(): array {
    return ['office365', 'microsoft'];
  }

  /**
   * {@inheritdoc}
   */
  public function supports(Dsn $dsn): bool {
    return TRUE;
  }

}
