<?php
/*
 * AppFee, College Admissions Processor
 * Copyright (C) 2015 Bellevue College
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
 */

/**
 * Program of study controller class file
 *
 * This file contains the Program_Of_Study_Controller class that extends the
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
 * Defines the program of study controller
 *
 * This class defines the controller to be used with program of study
 * collection.
 *
 * @since 1.0.0
 */
class Program_Of_Study_Controller extends Name_DOB_Controller {

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
	 *     @type string $no_fill       A field that needs to be blank for the
	 *                                 form to validate.
	 * }
	 *
	 * @return boolean True if the post fields are populated (even if invalid),
	 *                 false if the post fields are not populated correctly.
	 */
	public function save_data( $post_array ) {
		$data_not_valid                 = false;
		$honey_pot_field                = 'no_fill';
		$maximum_first_last_name_length = 32;
		$maximum_middle_name_length     = 16;

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
		if ( ! $this->is_valid_name( $first_name,
					$maximum_first_last_name_length
				)
		) {
			$this->model->add_error(
				'First name contains invalid characters.'
			);
			$data_not_valid = true;
		}
		if ( ! $this->is_valid_name( $last_name,
					$maximum_first_last_name_length
				)
		) {
			$this->model->add_error(
				'Last name contains invalid characters.'
			);
			$data_not_valid = true;
		}
		if ( isset( $middle_name )
			&& ! $this->is_valid_name( $middle_name,
					$maximum_middle_name_length
				)
		) {
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
