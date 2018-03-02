# Simple WordPress helpers library

## Installation

Require this package with composer

```shell
composer require sadekd/wp-helpers
```

## Usage

Simply use in `functions.php` in your theme directory

```php
\WpHelpers\Loader::disableGenerator();
\WpHelpers\Loader::disableEmoji();
\WpHelpers\Loader::gtm('GTM-XXXXXX');
\WpHelpers\Loader::ga('GA-XXXXXX');
```

## Like

```php
<php
  
\WpHelpers\Loader::gtm('GTM-XXXXXX');
\WpHelpers\Loader::disableEmoji();
\WpHelpers\Loader::disableGenerator();
    
function app_enqueue_scripts() {
    wp_enqueue_style('google-fonts', \WpHelpers\Google\Fonts::getHrefStatic([
        'Open Sans:400,400italic,700,700italic', 'Titillium Web:400,400italic,700,700italic',   // from Tortuga
        'Kaushan Script'
    ]), [], null);
    wp_enqueue_style('genericons', '//cdnjs.cloudflare.com/ajax/libs/genericons/3.1/genericons.min.css', [], null);
    wp_enqueue_style('font-awesome', '//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css', [], null);
    wp_enqueue_script('jquery-sticky', '//cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.min.js', ['jquery'], null);
    wp_enqueue_script('mtz-scripts', get_theme_root_uri() . '/mamtozdarma/scripts.js', ['jquery'], null);
}
add_action('wp_enqueue_scripts', 'app_enqueue_scripts');

function app_dequeue_scripts() {
    // dequeue parent theme styles&scripts
    wp_dequeue_style('tortuga-stylesheet');
    wp_dequeue_style('tortuga-default-fonts');      // using google fonts
	wp_dequeue_script('tortuga-jquery-navigation'); // minimized by gulp

	wp_dequeue_script('comment-reply');             // using disqus
	wp_dequeue_style('fontawesome');                // using newer version
	//wp_dequeue_style('easy-social-sharing-general');
}
add_action('wp_enqueue_scripts','app_dequeue_scripts', 100);
```
