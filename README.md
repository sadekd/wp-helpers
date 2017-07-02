# Simple WordPress helpers library

## Installation

Require this package with composer:

```shell
composer require sadekd/wp-helpers
```

## Usage

Use `functions.php` in your theme directory:

```php
\WpHelpers\Loader::disableEmoji();
\WpHelpers\Loader::gtm('GTM-XXXXXX');
...
```
