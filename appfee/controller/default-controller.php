<?php
/**
 * Default controller class file
 *
 * This file contains the Default_Controller class.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @subpackage Controller
 * @since 1.0.0
 */

/**
 * Default controller class defines the basic application controller
 *
 * This class is usually extended but can be used when additional functionality
 * is not needed. It is used to define the bare minimum information needed to
 * implement a controller within the application.
 *
 * @since 1.0.0
 */
class Default_Controller {

	/**
	 * Stores the model object.
	 *
	 * @since 1.0.0
	 * @access protected
	 * @var object
	 */
	protected $model;

	/**
	 * Default controller constructor.
	 *
	 * Populates the model properties from the constructor parameter.
	 *
	 * @since 1.0.0
	 * @see Default_Controller::$model
	 * @param object $model A model object.
	 */
	public function __construct( $model ) {
		$this->model = $model;
	}
}
