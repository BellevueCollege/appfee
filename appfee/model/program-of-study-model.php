<?php

require_once( 'default-model.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */
class Program_Of_Study_Model extends Default_Model {

	protected $form_post_url;
	protected $student_date_of_birth;
	protected $student_first_name;
	protected $student_last_name;
	protected $student_middle_name;

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

	public function get_student_date_of_birth() {
		return $this->student_date_of_birth;
	}

	public function get_student_first_name() {
		return $this->student_first_name;
	}

	public function get_student_last_name() {
		return $this->student_last_name;
	}

	public function get_student_middle_name() {
		return $this->student_middle_name;
	}

	public function set_student_date_of_birth( $student_date_of_birth ) {
		$this->student_date_of_birth = $student_date_of_birth;
	}

	public function set_student_first_name( $student_first_name ) {
		$this->student_first_name = $student_first_name;
	}

	public function set_student_last_name( $student_last_name ) {
		$this->student_last_name = $student_last_name;
	}

	public function set_student_middle_name( $student_middle_name ) {
		$this->student_middle_name = $student_middle_name;
	}
}
