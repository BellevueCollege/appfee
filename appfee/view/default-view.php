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
		$globals_path = $this->model->get_globals_path();
		$globals_url  = $this->model->get_globals_url();
		$template_uri = $this->model->get_template_uri();
		require_once( $template_uri );
	}
}
