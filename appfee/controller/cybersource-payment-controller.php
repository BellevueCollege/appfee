<?php
/**
 * CyberSource payment controller class file
 *
 * This file contains the Cybersource_Payment_Controller class that extends the
 * name and date of birth controller.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage Controller
 * @since 1.0.0
 */

/**
 * Load the the name and date of birth controller class.
 */
require_once( 'name-dob-controller.php' );

/**
 * Defines the CyberSource payment controller
 *
 * This class defines the controller to be used to submit CyberSource payment.
 *
 * @since 1.0.0
 */
class Cybersource_Payment_Controller extends Name_DOB_Controller {

	/**
	 * Get the program of study code.
	 *
	 * Get the program of study code from the post array.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args {
	 *     Array of key values usually passed in from the PHP $_POST variable.
	 *
	 *     @type string $proftech_type Optional. Professional technical
	 *                                 certificate / degree code.
	 *     @type string $what_degree   Optional. A non-professional technical
	 *                                 certificate / degree code.
	 *     @type string $no_degree     Optional. A code for non-degree
	 *                                 selections.
	 * }
	 * @return string|false Program of study code or false if program of study
	 *                      can not be found.
	 */
	public function get_program_of_study( $post_array ) {
		if ( ! empty( $post_array['proftech_type'] ) ) {
			return $post_array['proftech_type'];
		} elseif ( ! empty( $post_array['what_degree'] ) ) {
			return $post_array['what_degree'];
		} elseif ( ! empty( $post_array['no_degree'] ) ) {
			return $post_array['no_degree'];
		} else {
			return false;
		}
	}

	// TODO: Implement program of study code validation.
	public function is_valid_program_of_study( $program_of_study ) {
		return true;
	}

	/**
	 * Validate and save HTTP post data to the model object.
	 *
	 * Validates an array of key values (usually from HTTP post) and saves
	 * values from the array to a model object.
	 *
	 * @since 1.0.0
	 *
	 * @param array $args {
	 *     Array of key values usually passed in from the PHP $_POST variable.
	 *
	 *     @type string $date_of_birth A date of birth.
	 *     @type string $first_name    A first name.
	 *     @type string $form_url      URL that the form posted from.
	 *     @type string $last_name     A last name.
	 *     @type string $middle_name   A middle name.
	 *     @type string $no_degree     Optional. A code for non-degree
	 *                                 selections.
	 *     @type string $no_fill       A field that needs to be blank for the
	 *                                 form to validate.
	 *     @type string $proftech_type Optional. Professional technical
	 *                                 certificate / degree code.
	 *     @type string $what_degree   Optional. A non-professional technical
	 *                                 certificate / degree code.
	 * }
	 *
	 * @return boolean True if the post fields are populated (even if invalid),
	 *                 false if the post fields are not populated correctly.
	 */
	public function save_data( $post_array ) {
		$data_not_valid = false;
		$honey_pot_field = 'no_fill';
		$program_of_study = $this->get_program_of_study( $post_array );

		/*
		 * Check that all required form fields were posted. On failure load a
		 * blank page because someone is likely tampering with the form.
		 * Otherwise set initial variables.
		 */
		if ( ! empty( $post_array['form_url'] )
			&& ! empty( $post_array['date_of_birth'] )
			&& ! empty( $post_array['first_name'] )
			&& ! empty( $post_array['last_name'] )
			&& $program_of_study
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
		if ( ! $this->is_valid_program_of_study( $program_of_study ) ) {
			$this->model->add_error(
				'The program of study code is invalid.'
			);
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
		$this->model->set_program_of_study( $program_of_study );

		// Have model save the data
		$this->model->save_data();

		// Set the model signature
		$this->model->set_signature();

		return true;
	}
}
