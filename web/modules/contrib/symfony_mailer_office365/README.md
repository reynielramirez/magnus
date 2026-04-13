# Symfony Mailer Office365 Integration

## Why?
Office365 stops support for sending via SMTP with Basic Auth information (Username & Password).

A modern OAuth Flow is required. Since there is no feasable Drupal solution as of writing, this module provides a gap until there is an implementation provided by Symfony itself or a different solution.

## How-To
1. Register your app with Microsoft Entra and provide Redirect URL: `https://example.com/office365/oauth/callback`
2. Configure with given credentials
`admin/config/system/mailer/office365`
3. Add "Office 365 - OAuth" Transport to your mailing policy
4. Login to save OAuth State with Drupal (Link available here: `admin/config/system/mailer/office365`)

## Refreshing the token state
Using OAuth requires you to keep refreshing the access token with the given refresh token once it expired.
This module provides two ways to do that.

### a) Drupal Cron
Refreshing (if necessary) happens when the Drupal Cron is run.
In that case make sure it gets run at least every 12 hours to be on the safe side.

See Token Lifetime: https://learn.microsoft.com/en-us/entra/identity-platform/refresh-tokens#token-lifetime

### b) Drush Command
If you want to refresh the token (if necessary) in an own interval separate to the cron you can run the following drush command:
```
drush office365:refresh
```

Please choose an appropriate interval for this method as well.

### Troubleshooting
You should check the status page `admin/config/system/mailer/office365` and check the system logs (watchdog f.e) for any error messages.

### Credits
This was insipired by the following gists
- https://gist.github.com/dbu/3094d7569aebfc94788b164bd7e59acc
- https://gist.github.com/beerendlauwers/03acb112c80af0bf91546a05f790057a
Even though a lot has been rewritten, this inspired a lot how this concept was implemented. Thanks!

Please also see https://github.com/symfony/symfony/pull/52585 for development with symfony, which would make this module probably obsolete.
