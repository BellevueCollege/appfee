<?php

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Default_Model {

	public $html_footer_uri;
	public $html_header_uri;
	public $html_template_uri;

	public function __construct( $html_template_uri,
		$html_header_uri = NULL, $html_footer_uri = NULL
	) {
		$this->html_template_uri = $html_template_uri;
		if ( isset( $html_header_uri ) ) {
			$this->html_header_uri = $html_header_uri;
		}
		if ( isset( $html_footer_uri ) ) {
			$this->html_footer_uri = $html_footer_uri;
		}
	}

	public function get_html_header_uri() {
		return $this->html_header_uri;
	}

	public function get_html_footer_uri() {
		return $this->html_footer_uri;
	}

	public function get_template_uri() {
		return $this->html_template_uri;
	}
}
