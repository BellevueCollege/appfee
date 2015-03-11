<?php

require_once( 'default-model.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Student_Name_DOB_Model extends Default_Model {

	public $form_post_url;

	public function __construct(
		$template_uri,
		$globals_path,
		$globals_url,
		$form_post_url
	) {
		parent::__construct( $template_uri, $globals_path, $globals_url );
		$this->form_post_url = $form_post_url;
	}

	public function get_form_post_url() {
		return $this->form_post_url;
	}
}
