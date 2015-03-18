<?php

require_once( 'default-view.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Program_Of_Study_View extends Default_View {

	public function get_output() {
		$current_url = $this->model->get_current_url();
		$errors = $this->model->get_errors();
		$form_post_url = $this->model->get_form_post_url();
		$globals_path = $this->model->get_globals_path();
		$globals_url  = $this->model->get_globals_url();
		$redirect_url = $this->model->get_redirect_url();
		$student_date_of_birth = $this->model->get_student_date_of_birth();
		$student_first_name = $this->model->get_student_first_name();
		$student_last_name = $this->model->get_student_last_name();
		$student_middle_name = $this->model->get_student_middle_name();
		$template_uri = $this->model->get_template_uri();
		require( $template_uri );
	}
}
