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
 * Name and Date of Birth model class file
 *
 * This file contains the Name_DOB_Model class that extends the form post model.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage Model
 * @since 1.0.0
 */

/**
 * Load the the form post model class.
 */
require_once( 'form-post-model.php' );

/**
 * Defines the name and date of birth model
 *
 * This class defines the model to be used with storing name and date of birth
 * information.
 *
 * @since 1.0.0
 */
class Name_DOB_Model extends Form_Post_Model {

    /**
	 * A year quarter applied for.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $year_quarter_applied_for;
	/**
	 * A date of birth.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $date_of_birth;

	/**
	 * A first name.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $first_name;

	/**
	 * A last name.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $last_name;

	/**
	 * A middle name.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $middle_name;

        
        public function __construct(
		$template_uri,
		$globals_configuration,
                $post_url,
                $database_configuration
		
	) {
		parent::__construct(
			$template_uri,
			$globals_configuration,
			$post_url,
                        $database_configuration
		);
                
        }
        /**
	 * Get the Year Quarter applied for.
	 *
	 * Helper method that returns the year quarter applied for.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Model::$year_quarter_applied_for
	 * @return string year quarter applied for.
	 */
	public function get_year_quarter_applied_for() {
		return $this->year_quarter_applied_for;
	}
        
	/**
	 * Get the date of birth.
	 *
	 * Helper method that returns the date of birth.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Model::$date_of_birth
	 * @return string Date of birth.
	 */
	public function get_date_of_birth() {
		return $this->date_of_birth;
	}

	/**
	 * Get the first name.
	 *
	 * Helper method that returns the first name.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Model::$first_name
	 * @return string first name.
	 */
	public function get_first_name() {
		return $this->first_name;
	}

	/**
	 * Get the last name.
	 *
	 * Helper method that returns the last name.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Model::$last_name
	 * @return string last name.
	 */
	public function get_last_name() {
		return $this->last_name;
	}

	/**
	 * Get the middle name.
	 *
	 * Helper method that returns the middle name.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Model::$middle_name
	 * @return string middle name.
	 */
	public function get_middle_name() {
		return $this->middle_name;
	}
        
        /**
	 * Set the year quarter applied for.
	 *
	 * Helper method that sets the year quarter applied for.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Model::$year_quarter_applied_for
	 * @param string $year_quarter_applied_for The year quarter applied for.
	 */
	public function set_year_quarter_applied_for( $year_quarter_applied_for ) {
		$this->year_quarter_applied_for = $year_quarter_applied_for;
	}

	/**
	 * Set the date of birth.
	 *
	 * Helper method that sets the date of birth.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Model::$date_of_birth
	 * @param string $date_of_birth The date of birth.
	 */
	public function set_date_of_birth( $date_of_birth ) {
		$this->date_of_birth = $date_of_birth;
	}

	/**
	 * Set the first name.
	 *
	 * Helper method that sets the first name.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Model::$first_name
	 * @param string $first_name The first name.
	 */
	public function set_first_name( $first_name ) {
		$this->first_name = $first_name;
	}

	/**
	 * Set the last name.
	 *
	 * Helper method that sets the last name.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Model::$last_name
	 * @param string $last_name The last name.
	 */
	public function set_last_name( $last_name ) {
		$this->last_name = $last_name;
	}

	/**
	 * Set the middle name.
	 *
	 * Helper method that sets the middle name.
	 *
	 * @since 1.0.0
	 * @see Name_DOB_Model::$middle_name
	 * @param string $middle_name The middle name.
	 */
	public function set_middle_name( $middle_name ) {
		$this->middle_name = $middle_name;
	}
}
