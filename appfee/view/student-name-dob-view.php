<?php

require_once( 'default-view.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Student_Name_DOB_View extends Default_View {

	public function get_output() {
		$current_url = $this->model->get_current_url();
		$errors = $this->model->get_errors();
		$form_post_url = $this->model->get_form_post_url();
		$globals_path = $this->model->get_globals_path();
		$globals_url  = $this->model->get_globals_url();
		$template_uri = $this->model->get_template_uri();
		require_once( $template_uri );
	}
}
