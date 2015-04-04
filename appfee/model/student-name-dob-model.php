<?php
/**
 * Student name and date of birth model class file
 *
 * This file contains the Student_Name_DOB_Model class that extends the default
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
 * Defines the student name and date of birth model
 *
 * This class defines the model to be used with student name and date of birth
 * collection.
 *
 * @since 1.0.0
 */
class Student_Name_DOB_Model extends Default_Model {

	/**
	 * URL that can be used to post the program of study form.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var string
	 */
	protected $form_post_url;

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
	 * @param string $template_uri          File system path to a HTML template.
	 * @param object $globals_configuration HTML resource configuration object.
	 * @param string $form_post_url         URL that the student name and date
	 *                                      of birth form can be posted to.
	 */
	public function __construct(
		$template_uri,
		$globals_configuration,
		$form_post_url
	) {
		parent::__construct( $template_uri, $globals_configuration );
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
}
