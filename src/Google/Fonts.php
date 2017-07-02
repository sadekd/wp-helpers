<?php

namespace WpHelpers\Google;

class Fonts {

	private $fontFamilies;
	private $subset;

	function __construct(array $fontFamilies, $subset = 'latin,latin-ext') {
		$this->fontFamilies = $fontFamilies;
		$this->subset = $subset;
	}

	public function getLink() {
		return "<link rel='stylesheet' type='text/css' href='{$this->getHref()}' />";
	}

	public function getHref() {
		$query_args = array(
			'family' => urlencode(implode('|', $this->fontFamilies)),
			'subset' => urlencode($this->subset),
		);

		return add_query_arg($query_args, '//fonts.googleapis.com/css');
	}

	public static function getHrefStatic(array $fontFamilies, $subset = null) {
		$fonts = new Fonts($fontFamilies, $subset);

		return $fonts->getHref();
	}
}
