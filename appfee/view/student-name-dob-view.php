<?php
/**
 * Student name and date of birth view class file
 *
 * This file contains the Student_Name_DOB_View class that extends the default
 * view.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage View
 * @since 1.0.0
 */

/**
 * Load the the default view class.
 */
require_once( 'default-view.php' );

/**
 * Defines the student name and date of birth view
 *
 * This class defines the view to be used with student name and date of birth
 * collection.
 *
 * @since 1.0.0
 */
class Student_Name_DOB_View extends Default_View {

	/**
	 * Set template variables and get template output.
	 *
	 * Set the variables needed for the template and load the template getting
	 * the template HTML output.
	 *
	 * @since 1.0.0
	 */
	public function get_output() {
		$current_url = $this->model->get_current_url();
		$errors = $this->model->get_errors();
		$form_post_url = $this->model->get_form_post_url();
		$globals_path = $this->model->get_globals_path();
		$globals_url  = $this->model->get_globals_url();
		$template_uri = $this->model->get_template_uri();
		require( $template_uri );
	}
}
