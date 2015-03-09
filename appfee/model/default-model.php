<?php

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Default_Model {

	public $globals_path;
	public $globals_url;
	public $template_uri;

	public function __construct( $template_uri,
		$globals_path = NULL, $globals_url = NULL
	) {
		$this->template_uri = $template_uri;
		if ( isset( $globals_path ) ) {
			$this->globals_path = $globals_path;
		}
		if ( isset( $globals_url ) ) {
			$this->globals_url = $globals_url;
		}
	}

	public function get_globals_path() {
		return $this->globals_path;
	}

	public function get_globals_url() {
		return $this->globals_url;
	}

	public function get_template_uri() {
		return $this->template_uri;
	}
}
