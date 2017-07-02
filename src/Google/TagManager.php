<?php

namespace WpHelpers\Google;

class TagManager {

	private $containerId;

	public function __construct($containerId) {
		$this->containerId = $containerId;
	}

	public function getScript() {
		return "<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src='https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);})(window,document,'script','dataLayer','{$this->containerId}');</script>";
	}

	public function getNoScript() {
		return "<noscript><iframe src=\"https://www.googletagmanager.com/ns.html?id={$this->containerId}\" height=\"0\" width=\"0\" style=\"display:none;visibility:hidden\"></iframe></noscript>";
	}
}
