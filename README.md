![statamic-matomo-widget](https://laravel-og.beyondco.de/Matomo%20widget%20for%20Statamic.png?theme=light&packageManager=composer+require&packageName=jeroenpeters1986%2Fstatamic-matomo-widget&pattern=plus&style=style_2&description=Matomo+stats+by+the+dashboard+light&md=1&showWatermark=0&fontSize=100px&images=chart-square-bar&heights=150)

# Matomo Widget for Statamic

<!-- statamic:hide -->
![Statamic 3.3+](https://img.shields.io/badge/Statamic-3.3+-FF269E?style=for-the-badge&link=https://statamic.com)
[![Latest Version on Packagist](https://img.shields.io/packagist/v/jeroenpeters1986/statamic-matomo-widget.svg?style=for-the-badge)](https://packagist.org/packages/jeroenpeters1986/statamic-matomo-widget)
[![Number of downloads](https://img.shields.io/packagist/dt/jeroenpeters1986/statamic-matomo-widget.svg?style=for-the-badge)](https://packagist.org/packages/jeroenpeters1986/statamic-matomo-widget)
<!-- /statamic:hide -->

## Installation

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

## Support
I love to share with the community. Nevertheless, coding/learning/updating takes a lot of work, time and effort.
You can contact me through my personal site https://jeroenpeters.com/contact, or if you have any issues with 
this package, please create an issue on GitHub.

If you like my software, feel free to [buy me a coffee or two with Ko-Fi](https://ko-fi.com/jeroenpeters)

## Changelog

### 1.0.0
First version

## License
This plugin is published under the MIT license.

## Other..

### Disclaimer
This add-on is not affiliated, associated, authorized, endorsed by, or in any way officially connected with
Matomo / Piwiki, or any of its subsidiaries or its affiliates. This add-on merely enables users to easily 
access their stats.

### Requirements
- PHP 7.4 or 8.0
- Laravel 7 or 8
- Statamic 3.3+ (also includes Statamic v4 and v5)

I chose not to enforce these requirements in the composer.json, as it will probably stay compatible with newer versions of Statamic.

