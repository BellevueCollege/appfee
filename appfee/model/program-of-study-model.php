<?php
/**
 * Program of study model class file
 *
 * This file contains the Program_Of_Study_Model class that extends the default
 * model.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage Model
 * @since 1.0.0
 */

/**
 * Load the the default model class.
 */
require_once( 'default-model.php' );

/**
 * Defines the program of study model
 *
 * This class defines the model to be used with program of study.
 *
 * @since 1.0.0
 */
class Program_Of_Study_Model extends Default_Model {

	/**
	 * URL that can be used to post the program of study form.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $form_post_url;

	/**
	 * A student's date of birth.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $student_date_of_birth;

	/**
	 * A student's first name.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $student_first_name;

	/**
	 * A student's last name.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $student_last_name;

	/**
	 * A student's middle name.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $student_middle_name;

	/**
	 * Program of study model constructor.
	 *
	 * Populates some class properties from the constructor parameters.
	 *
	 * @since 1.0.0
	 *
	 * @see Default_Model::$template_uri
	 * @see Default_Model::$globals_path
	 * @see Default_Model::$globals_url
	 * @see Program_Of_Study_Model::$form_post_url
	 *
	 * @param string $template_uri File system path to a HTML template.
	 * @param string $globals_path File system path the globals resource
	 *                             library.
	 * @param string $globals_url URL that the globals library can be referenced
	 *                            from.
	 * @param string $form_post_url URL that the program of study form can be
	 *                              posted to.
	 */
	public function __construct(
		$template_uri,
		$globals_path,
		$globals_url,
		$form_post_url
	) {
		parent::__construct( $template_uri, $globals_path, $globals_url );
		$this->form_post_url = $form_post_url;
	}

	/**
	 * Get the form post url property.
	 *
	 * Helper method that returns the form post url property.
	 *
	 * @since 1.0.0
	 * @see Program_Of_Study_Model::$form_post_url
	 * @return string URL that can be posted to.
	 */
	public function get_form_post_url() {
		return $this->form_post_url;
	}

	/**
	 * Get the student date of birth.
	 *
	 * Helper method that returns the student's date of birth.
	 *
	 * @since 1.0.0
	 * @see Program_Of_Study_Model::$student_date_of_birth
	 * @return string Student's date of birth.
	 */
	public function get_student_date_of_birth() {
		return $this->student_date_of_birth;
	}

	/**
	 * Get the student first name.
	 *
	 * Helper method that returns the student's first name.
	 *
	 * @since 1.0.0
	 * @see Program_Of_Study_Model::$student_first_name
	 * @return string Student's first name.
	 */
	public function get_student_first_name() {
		return $this->student_first_name;
	}

	/**
	 * Get the student last name.
	 *
	 * Helper method that returns the student's last name.
	 *
	 * @since 1.0.0
	 * @see Program_Of_Study_Model::$student_last_name
	 * @return string Student's last name.
	 */
	public function get_student_last_name() {
		return $this->student_last_name;
	}

	/**
	 * Get the student middle name.
	 *
	 * Helper method that returns the student's middle name.
	 *
	 * @since 1.0.0
	 * @see Program_Of_Study_Model::$student_middle_name
	 * @return string Student's middle name.
	 */
	public function get_student_middle_name() {
		return $this->student_middle_name;
	}

	/**
	 * Set the student date of birth.
	 *
	 * Helper method that sets the student's date of birth.
	 *
	 * @since 1.0.0
	 * @see Program_Of_Study_Model::$student_date_of_birth
	 * @param string $student_date_of_birth The student's date of birth.
	 */
	public function set_student_date_of_birth( $student_date_of_birth ) {
		$this->student_date_of_birth = $student_date_of_birth;
	}

	/**
	 * Set the student first name.
	 *
	 * Helper method that sets the student's first name.
	 *
	 * @since 1.0.0
	 * @see Program_Of_Study_Model::$student_first_name
	 * @param string $student_first_name The student's first name.
	 */
	public function set_student_first_name( $student_first_name ) {
		$this->student_first_name = $student_first_name;
	}

	/**
	 * Set the student last name.
	 *
	 * Helper method that sets the student's last name.
	 *
	 * @since 1.0.0
	 * @see Program_Of_Study_Model::$student_last_name
	 * @param string $student_last_name The student's last name.
	 */
	public function set_student_last_name( $student_last_name ) {
		$this->student_last_name = $student_last_name;
	}

	/**
	 * Set the student middle name.
	 *
	 * Helper method that sets the student's middle name.
	 *
	 * @since 1.0.0
	 * @see Program_Of_Study_Model::$student_middle_name
	 * @param string $student_middle_name The student's middle name.
	 */
	public function set_student_middle_name( $student_middle_name ) {
		$this->student_middle_name = $student_middle_name;
	}
}
