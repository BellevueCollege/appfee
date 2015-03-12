<?php

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Default_Model {

	public $errors;
	public $redirect_url;
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
		$this->errors = array();
	}

	public function add_error( $error_message ) {
		$this->errors[] = $error_message;
	}

	public function get_current_url() {
		$request_scheme = ( isset( $_SERVER['HTTPS'] ) ) ? 'https' : 'http';
		$current_url =
			$request_scheme .
			'://' .
			$_SERVER['HTTP_HOST'] .
			$_SERVER['REQUEST_URI']
		;
		return $current_url;
	}

	public function get_errors() {
		return $this->errors;
	}

	public function get_globals_path() {
		return $this->globals_path;
	}

	public function get_globals_url() {
		return $this->globals_url;
	}

	public function get_redirect_url() {
		return $this->redirect_url;
	}

	public function get_template_uri() {
		return $this->template_uri;
	}

	public function set_redirect_url( $url ) {
		$this->redirect_url = $url;
	}

	public function set_template_uri( $uri ) {
		$this->template_uri = $uri;
	}
}
