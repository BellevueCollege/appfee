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
 * Name and date of birth controller class file
 *
 * This file contains the Name_DOB_Controller class that extends the default
 * controller.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage Controller
 * @since 1.0.0
 */

/**
 * Load the the default controller class.
 */
require_once( 'default-controller.php' );

/**
 * Defines the name and date of birth controller
 *
 * This class defines the controller to be used with processing and validating
 * name and date of birth information.
 *
 * @since 1.0.0
 */
class Name_DOB_Controller extends Default_Controller {

	/**
	 * Array containing data to work with.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var array
	 */
	protected $data;

	/**
	 * Contains regular expression to use for date of birth validation.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $regex_date_of_birth;

	/**
	 * Contains regular expression to use for name validation.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $regex_name;

	/**
	 * Name and date of birth controller constructor.
	 *
	 * Populates the controller properties.
	 *
	 * @since 1.0.0
	 *
	 * @see Default_Controller::$model
	 * @see Name_DOB_Controller::$regex_date_of_birth
	 * @see Name_DOB_Controller::$regex_name
	 *
	 * @param object $model A model object.
	 */
	public function __construct( $model ) {
		parent::__construct( $model );

		$this->regex_date_of_birth = '/^(0?[1-9]|1[0-2])\/'
			. '(0?[1-9]|[1-2][0-9]|3[0-1])\/'
			. '((19|[2-9][0-9])[0-9]{2})$/'
		;
		$this->regex_name = "/^[a-z\-_'\s]+$/i";
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
		$max_first_last_name = 32;
		$max_middle_name     = 16;
		$data_valid = true;

		if ( ! $this->is_valid_date_of_birth( $this->data['date_of_birth'] ) ) {
			$this->model->add_error(
				'Date of birth is not valid or is in the future.'
			);
			$data_valid = false;
		}
		if ( ! $this->is_valid_name( $this->data['first_name'],
					$max_first_last_name
				)
		) {
			$this->model->add_error(
				'First name contains invalid characters.'
			);
			$data_valid = false;
		}
		if ( ! $this->is_valid_name( $this->data['last_name'],
					$max_first_last_name
				)
		) {
			$this->model->add_error(
				'Last name contains invalid characters.'
			);
			$data_valid = false;
		}
		if ( ! empty( $this->data['middle_name'] )
			&& ! $this->is_valid_name( $this->data['middle_name'], $max_middle_name )
		) {
			$this->model->add_error(
				'Middle name contains invalid characters.'
			);
			$data_valid = false;
		}

		return $data_valid;
	}

	/**
	 * Validates a date of birth.
	 *
	 * Validates a date of birth using a regular expression for date format and
	 * the PHP checkdate() function.
	 *
	 * @since 1.0.0
	 *
	 * @see Name_DOB_Controller::$regex_date_of_birth
	 *
	 * @param string $date_of_birth A date of birth.
	 *
	 * @return boolean              True for valid, false for invalid.
	 */
	public function is_valid_date_of_birth( $date_of_birth ) {
		$is_valid_date = preg_match(
			$this->regex_date_of_birth,
			$date_of_birth,
			$matches
		);
		if ( ! $is_valid_date ) {
			return false;
		}

		$year = $matches[3];
		$month = $matches[1];
		$day = $matches[2];
		$date_of_birth_integer = strtotime( $date_of_birth );
		if ( $date_of_birth_integer > time()
			|| ! checkdate( $month, $day, $year )
		) {
			return false;
		}

		return true;
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
		$honey_pot_field = 'no_fill';
		if ( ! empty( $this->data['form_url'] )
			&& ! empty( $this->data['date_of_birth'] )
			&& ! empty( $this->data['first_name'] )
			&& ! empty( $this->data['last_name'] )
			&& ( array_key_exists( $honey_pot_field, $this->data )
				&& empty( $this->data[ $honey_pot_field ] )
			)
		) {
			return true;
		}

		return false;
	}

	/**
	 * Validates a name.
	 *
	 * Validates a name using a regular and expression to make sure the name
	 * contains valid characters and that it does not exceed a maximum length.
	 *
	 * @since 1.0.0
	 *
	 * @see Name_DOB_Controller::$regex_name
	 *
	 * @param string  $name    A name.
	 * @param integer $length  Maximum name length.
	 *
	 * @return boolean         True for valid, false for invalid.
	 */
	public function is_valid_name( $name, $length ) {
		$is_valid_name = preg_match(
			$this->regex_name,
			$name
		);
		$name_length = strlen( $name );
		if ( ! $is_valid_name || $name_length > $length ) {
			return false;
		}
		return true;
	}

	/**
	 * Process an array of data.
	 *
	 * Process data passed in by the data parameter.
	 *
	 * @since 1.0.0
	 *
	 * @see Name_DOB_Controller::$data
	 *
	 * @param array $data {
	 *     Array of key values usually passed in from the PHP $_POST variable.
	 *
	 *     @type string $date_of_birth A date of birth.
	 *     @type string $first_name    A first name.
	 *     @type string $form_url      URL that the form posted from.
	 *     @type string $last_name     A last name.
	 *     @type string $middle_name   A middle name.
	 *     @type string $no_fill       A field that needs to be blank for the
	 *                                 keys to validate.
	 * }
	 *
	 * @return boolean                 True if data processes sucessfully.
	 */
	public function process_data( $data ) {
		// Set the data property.
		$this->data = $data;

		// Validate array for expected key values.
		if ( ! $this->is_valid_keys() ) {
			$this->model->set_template_uri(
				'template/blank-page-template.php'
			);
			return false;
		}

		// Validate array data.
		if ( ! $this->is_valid_data() ) {
			$this->model->set_redirect_url( $this->data['form_url'] );
			$this->model->set_template_uri(
				'template/error-redirect-template.php'
			);
			return false;
		}

		// If all went well save variables.
		$this->save_variables();
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
		// Set middle name to null if it is empty.
		if ( empty( $this->data['middle_name'] ) ) {
			$this->data['middle_name'] = null;
		}

		$this->model->set_date_of_birth( $this->data['date_of_birth'] );
		$this->model->set_first_name( $this->data['first_name'] );
		$this->model->set_last_name( $this->data['last_name'] );
		$this->model->set_middle_name( $this->data['middle_name'] );
                $this->model->set_year_quarter_applied_for($this->data['yrq']);
	}
}
