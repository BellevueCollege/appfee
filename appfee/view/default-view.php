<?php

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Default_View {

	public $model;
	public $controller;

	public function __construct( $controller, $model ) {
		$this->controller = $controller;
		$this->model = $model;
	}

	public function get_output() {
		$current_url = $this->model->get_current_url();
		$errors = $this->model->get_errors();
		$globals_path = $this->model->get_globals_path();
		$globals_url  = $this->model->get_globals_url();
		$redirect_url = $this->model->get_redirect_url();
		$template_uri = $this->model->get_template_uri();
		require_once( $template_uri );
	}
}
