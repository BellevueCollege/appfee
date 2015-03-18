<?php

require_once( 'name-dob-controller.php' );

/*
 * TODO: Add PHP DocBlock for this Class
 */

class Program_Of_Study_Controller extends Name_DOB_Controller {

	public function save_data( $post_array ) {
		$data_not_valid = false;
		$honey_pot_field = 'no_fill';

		/*
		 * Check that all required form fields were posted. On failure load a
		 * blank page because someone is likely tampering with the form.
		 * Otherwise set initial variables.
		 */
		if ( ! empty( $post_array['form_url'] )
			&& ! empty( $post_array['date_of_birth'] )
			&& ! empty( $post_array['first_name'] )
			&& ! empty( $post_array['last_name'] )
			&& ( array_key_exists( $honey_pot_field, $post_array )
				&& empty( $post_array[ $honey_pot_field ] )
			)
		) {
			$form_url = $post_array['form_url'];
			$date_of_birth = $post_array['date_of_birth'];
			$first_name = $post_array['first_name'];
			$last_name = $post_array['last_name'];
		} else {
			$this->model->set_template_uri(
				'template/blank-page-template.php'
			);
			return false;
		}

		$middle_name = NULL;
		if ( ! empty( $post_array['middle_name'] ) ) {
			$middle_name = $post_array['middle_name'];
		}

		// Validate variables
		if ( ! $this->is_valid_date_of_birth( $date_of_birth ) ) {
			$this->model->add_error(
				'Date of birth is not valid or is in the future.'
			);
			$data_not_valid = true;
		}
		if ( ! $this->is_valid_name( $first_name ) ) {
			$this->model->add_error(
				'First name contains invalid characters.'
			);
			$data_not_valid = true;
		}
		if ( ! $this->is_valid_name( $last_name ) ) {
			$this->model->add_error(
				'Last name contains invalid characters.'
			);
			$data_not_valid = true;
		}
		if ( isset( $middle_name ) && ! $this->is_valid_name( $middle_name ) ) {
			$this->model->add_error(
				'Middle name contains invalid characters.'
			);
			$data_not_valid = true;
		}

		// If variables are not valid
		if ( $data_not_valid ) {
			$this->model->set_redirect_url( $form_url );
			$this->model->set_template_uri(
				'template/error-redirect-template.php'
			);
			return true;
		}

		// Set model variables
		$this->model->set_student_date_of_birth( $date_of_birth );
		$this->model->set_student_first_name( $first_name );
		$this->model->set_student_last_name( $last_name );
		$this->model->set_student_middle_name( $middle_name );

		return true;
	}
}