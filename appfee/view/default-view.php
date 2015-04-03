<?php
/**
 * Default view class file
 *
 * This file contains the Default_View class.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage View
 * @since 1.0.0
 */

/**
 * Default view class defines the basic application view
 *
 * This class is usually extended but can be used when additional functionality
 * is not needed. It is used to define the bare minimum information needed to
 * implement a view within the application.
 *
 * @since 1.0.0
 */
class Default_View {

	/**
	 * Stores the controller object.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var object
	 */
	protected $controller;

	/**
	 * Stores the model object.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var object
	 */
	protected $model;

	/**
	 * Default view constructor.
	 *
	 * Populates the controller and model properties from the constructor
	 * parameters.
	 *
	 * @since 1.0.0
	 *
	 * @see Default_View::$controller
	 * @see Default_View::$model
	 *
	 * @param object $controller A controller object.
	 * @param object $model A model object.
	 */
	public function __construct( $controller, $model ) {
		$this->controller = $controller;
		$this->model = $model;
	}

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
		$globals_path = $this->model->get_globals_path();
		$globals_url  = $this->model->get_globals_url();
		$redirect_url = $this->model->get_redirect_url();
		$template_uri = $this->model->get_template_uri();
		require( $template_uri );
	}
}
