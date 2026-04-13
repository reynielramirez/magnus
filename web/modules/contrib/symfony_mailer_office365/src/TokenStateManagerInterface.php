<?php

declare(strict_types=1);

namespace Drupal\symfony_mailer_office365;

use Exception;
use League\OAuth2\Client\Token\AccessTokenInterface;

/**
 * Token State Manager manages OAuth Token state.
 */
interface TokenStateManagerInterface {

  /**
   * Gets the token and refreshes if necessary.
   */
  public function getToken(): ?AccessTokenInterface;

  /**
   * Get redirect URL.
   */
  public function getRedirectUrl(): string;

  /**
   * Gets auth URL.
   */
  public function getAuthUrl(string $tenant_id): string;

  /**
   * Gets token URL.
   */
  public function getTokenUrl(string $tenant_id): string;

  /**
   * Gets login URL.
   */
  public function getLoginUrl(): string;

  /**
   * Fetches token.
   */
  public function fetchToken(string $code): ?AccessTokenInterface;

  /**
   * Get configured mail.
   */
  public function getMail(): string;

  /**
   * Refresh with refresh token.
   */
  public function refresh(): ?AccessTokenInterface;

  /**
   * Handles any related exceptions and logs them.
   */
  public function handleException(Exception $e, ?string $context = ""): void;

}
