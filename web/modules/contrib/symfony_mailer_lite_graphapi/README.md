# Symfony Mailer Lite GraphAPI

This module provides a lightweight transport layer to use Symfony Mailer Lite
with Microsoft Graph API. This makes it
possible to send mails using e.g. Microsoft Office 365.

It uses
the [Client credentials provider workflow with client secret](https://learn.microsoft.com/en-us/graph/sdks/choose-authentication-providers?tabs=PHP#using-a-client-secret-3)
to authenticate with Microsoft Graph API.

For a full description of the module, visit the
[project page](https://www.drupal.org/project/symfony_mailer_lite_graphapi).

Submit bug reports and feature suggestions, or track changes in the
[issue queue](https://www.drupal.org/project/issues/symfony_mailer_lite_graphapi).

## Requirements

This module requires the following modules:

- [Symfony Mailer Lite](https://www.drupal.org/project/symfony_mailer_lite)

You'll need an application in Microsoft Entra granting the permission
`Mail.Send` and providing the required
credentials: client id, client secret and tenant id.

## Installation

Install as you would normally install a contributed Drupal module. For further
information,
see [Installing Drupal Modules](https://www.drupal.org/docs/extending-drupal/installing-drupal-modules).

## Configuration

1. Enable the module at Administration > Extend.
2. Visit the transport configuration page at Administration > Configuration >
   System > Drupal Symfony Mailer Lite > Transport.
3. Add a new transport and select "MS Graph API" as the transport type. Enter
   the client credentials. The "DSN" transport type is not supported, as the
   list of available DSN transports is hardwired in Symfony Mailer.

## Limitations

- This module is strictly limited to providing a minimal transport layer. It
  does not modify the outgoing mail in any way.
- While the sender address is taken from the sent mails, the mails are always
  sent from the primary smtp address
  configured in the Microsoft Entra application. This is a limitation of the
  Microsoft Graph API. If you manage to
  figure out how to work around this e.g. using aliases, shared mailboxes or
  proxy addresses, please open an issue and
  let us know.

## Similar modules

- [Symfony Mailer GraphAPI](https://www.drupal.org/project/symfony_mailer_graphapi) -
  Same implementation for use
  with [Symfony Mailer](https://www.drupal.org/project/symfony_mailer) module.
- [Symfony Mailer Microsoft Graph](https://www.drupal.org/project/symfony_mailer_microsoft_graph) -
  Same scope, slightly different approach and libraries,
  for [Symfony Mailer](https://www.drupal.org/project/symfony_mailer) module.

## Maintainers

- Boris Böhne - [drubb](https://www.drupal.org/u/drubb)
- Christian Adamski - [christianadamski](https://www.drupal.org/u/christianadamski)

## Credits

- [James Shields](https://www.drupal.org/u/lostcarpark) - Project Browser logo.
