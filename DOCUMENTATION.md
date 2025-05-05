
## How to install?

Install via the Control Panel or via composer

```bash
composer require jeroenpeters1986/statamic-matomo-widget
```

## Add environment variables
Add the following to your `.env` file:

```dotenv
MATOMO_URL=https://your-matomo-url
MATOMO_SITE_ID=1
MATOMO_API_TOKEN=your-token-auth
```

## Enable Widget

Add widget to control panel configuration `config/statamic/cp.php` file.

e.g:
```php
[
	'type' => 'matomo_stats',
	'width' => 50,
],
```

