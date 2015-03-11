<?php

require_once( 'default-controller.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */

class Cybersource_Payment_Controller extends Default_Controller {

	public function save_data( $post_array ) {
		$date_of_birth = $post_array['date_of_birth'];
		$first_name = $post_array['first_name'];
		$last_name = $post_array['last_name'];
		$middle_name = $post_array['middle_name'];

		$this->model->student_date_of_birth = $date_of_birth;
		$this->model->student_first_name = $first_name;
		$this->model->student_last_name = $last_name;
		$this->model->student_middle_name = $middle_name;

		$this->model->generate_signature();

		return True;
	}
}
