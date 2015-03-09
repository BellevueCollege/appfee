<?php

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Default_View {

	private $model;
	private $controller;

	public function __construct( $controller, $model ) {
		$this->controller = $controller;
		$this->model = $model;
	}

	public function get_output() {
		$header_uri = $this->model->get_html_header_uri();
		$footer_uri = $this->model->get_html_footer_uri();
		$template_uri = $this->model->get_template_uri();
		require_once( $template_uri );
	}
}
