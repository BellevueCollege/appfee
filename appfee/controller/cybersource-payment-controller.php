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
	 * @return string|false Program of study code or false if program of study
	 *                      can not be found.
	 */
	public function get_program_of_study_code() {
		if ( ! empty( $this->data['proftech_type'] ) ) {
			return $this->data['proftech_type'];
		} elseif ( ! empty( $this->data['what_degree'] ) ) {
			return $this->data['what_degree'];
		} elseif ( ! empty( $this->data['no_degree'] ) ) {
			return $this->data['no_degree'];
		} else {
			return false;
		}
	}

	/**
	 * Validate data property values.
	 *
	 * Validates that all key values are valid in the data array.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Controller::$data
	 * @return boolean True if data is valid.
	 */
	public function is_valid_data() {
		$data_valid = parent::is_valid_data();
		if ( ! $this->is_valid_program_of_study(
				$this->get_program_of_study_code()
			)
		) {
			$this->model->add_error(
				'The program of study code is invalid.'
			);
			$data_valid = false;
		}
		return $data_valid;
	}

	/**
	 * Validate data property keys.
	 *
	 * Validates that all required keys exsist in the data array.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Controller::$data
	 * @return boolean True if keys are valid.
	 */
	public function is_valid_keys() {
		$parent_keys_valid = parent::is_valid_keys();
		if ( $parent_keys_valid && $this->get_program_of_study_code() ) {
			return true;
		}
		return false;
	}

	// TODO: Implement program of study code validation.
	public function is_valid_program_of_study( $program_of_study ) {
		return true;
	}

	/**
	 * Save data variables to model object.
	 *
	 * Helper function that saves data to the model object.
	 *
	 * @since 1.0.0
	 */
	public function save_variables() {
		parent::save_variables();
		$this->model->set_program_of_study(
			$this->get_program_of_study_code()
		);
		$this->model->save_data_and_set_reference_number();
		$this->model->set_signature();
	}
}
