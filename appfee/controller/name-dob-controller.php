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
 * Name and date of birth controller class defines an extendable controller
 *
 * This class is intended to be extended by other controllers that need to
 * validate names and dates of birth.
 *
 * @since 1.0.0
 */
class Name_DOB_Controller extends Default_Controller {

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
	 * Validates a date of birth.
	 *
	 * Validates a date of birth using a regular expression for date format and
	 * the PHP checkdate() function.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Controller::$regex_date_of_birth
	 * @param string $date_of_birth A date of birth.
	 * @return boolean True for valid, false for invalid.
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
}
