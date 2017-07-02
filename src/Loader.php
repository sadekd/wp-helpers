<?php

namespace WpHelpers;

use WpHelpers\Google\Analytics;
use WpHelpers\Google\TagManager;

class Loader {

	public static function ga($trackingId) {
		$analytics = new Analytics($trackingId);

		add_action('wp_head', function () use ($analytics) {
			echo $analytics->getScript();
		});
	}

	public static function gtm($containerId) {
		$tagManager = new TagManager($containerId);

		add_action('wp_head', function () use ($tagManager) {
			echo $tagManager->getScript();
		});

		add_action('wp_footer', function () use ($tagManager) {
			echo $tagManager->getNoScript();
		});
	}

	public static function disableEmoji() {
		add_action('init', function () {
			remove_action('admin_print_styles', 'print_emoji_styles');
			remove_action('wp_head', 'print_emoji_detection_script', 7);
			remove_action('admin_print_scripts', 'print_emoji_detection_script');
			remove_action('wp_print_styles', 'print_emoji_styles');
			remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
			remove_filter('the_content_feed', 'wp_staticize_emoji');
			remove_filter('comment_text_rss', 'wp_staticize_emoji');
			add_filter('emoji_svg_url', '__return_false');
		});
	}

	public static function disableGenerator() {
		add_action('init', function () {
			add_filter('the_generator', '__return_false');
		});
	}
}
