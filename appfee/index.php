<?php
/**
 * Controls URL name-space and routing for the application
 *
 * This file handles all http calls to the application and loads the appropriate
 * model, view, & controller for each URL request. It also defines the current
 * application version number.
 *
 * @copyright 2015 Bellevue College
 * @license GNU General Public License, version 2
 * @link https://github.com/BellevueCollege/appfee
 * @package AppFee
 * @since 1.0.0
 */

/**
 * Load configuration structures.
 */
require( 'include/configuration-structures.php' );

/**
 * Defines the application version number.
 *
 * @since 1.0.0
 * @var string
 */
define( 'VERSION_NUMBER', '0.3.0.3' );

// Set the timezone.
date_default_timezone_set( TIMEZONE );

$request_host = $_SERVER['HTTP_HOST'];
$request_uri = $_SERVER['REQUEST_URI'];
$base_uri = rtrim( BASE_URI, '/' ) . '/';

// Check to make sure we are hosted out of the correct directory.
if ( $base_uri !== substr( $request_uri, 0, strlen( $base_uri ) ) ) {
	$error_message = 'The BASE_URI constant does not match the requested '
		. 'URI. Please review the configuration.php file and set BASE_URI to '
		. 'the appropriate path'
	;
	throw new Exception( $error_message );
}

// Redirect to HTTPS if the request is made over HTTP.
if ( ! isset( $_SERVER['HTTPS'] ) ) {
	$url = 'https://' . $request_host . $request_uri;
	header( $_SERVER['SERVER_PROTOCOL'] . ' Moved Permanently' );
	header( 'Location: ' . $url );
	exit();
}

$application_uri = substr( $request_uri, strlen( $base_uri ) );
switch ( $application_uri ) {
	case 'general-admissions':
		/**
		 * Load class file for Student Name DOB Model.
		 */
		require( 'model/student-name-dob-model.php' );

		/**
		 * Load class file for Student Name DOB View.
		 */
		require( 'view/student-name-dob-view.php' );
		$post_url = 'https://'
			. $request_host
			. $base_uri
			. 'general-admissions/program-of-study'
		;
		$model = new Student_Name_DOB_Model(
			'template/student-name-dob-template.php',
			GLOBALS_PATH,
			GLOBALS_URL,
			$post_url
		);
		$controller = NULL;
		$view = new Student_Name_DOB_View( $controller, $model );
		echo $view->get_output();
		break;

	case 'general-admissions/program-of-study':
		/**
		 * Load class file for Program Of Study Model.
		 */
		require( 'model/program-of-study-model.php' );

		/**
		 * Load class file for Program Of Study Controller.
		 */
		require( 'controller/program-of-study-controller.php' );

		/**
		 * Load class file for Program Of Study View.
		 */
		require( 'view/program-of-study-view.php' );
		$post_url = 'https://'
			. $request_host
			. $base_uri
			. 'general-admissions/save'
		;
		$model = new Program_Of_Study_Model(
			'template/program-of-study-template.php',
			GLOBALS_PATH,
			GLOBALS_URL,
			$post_url
		);
		$controller = new Program_Of_Study_Controller( $model );
		$view = new Program_Of_Study_View( $controller, $model );
		$controller->save_data( $_POST );
		echo $view->get_output();
		break;

	case 'general-admissions/save':
		/**
		 * Load class file for Cybersource Payment Model.
		 */
		require( 'model/cybersource-payment-model.php' );

		/**
		 * Load class file for Cybersource Payment Controller.
		 */
		require( 'controller/cybersource-payment-controller.php' );

		/**
		 * Load class file for Cybersource Payment View.
		 */
		require( 'view/cybersource-payment-view.php' );

		// Configuration objects.
		$cybersource_configuration = new General_Admissions_Configuration();
		$database_configuration = new Database_Configuration();
		$resource_library_configuration = new HTML_Resource_Library();

		// Model view controller objects.
		$model = new Cybersource_Payment_Model(
			'template/cybersource-payment-template.php',
			$resource_library_configuration,
			$database_configuration,
			$cybersource_configuration
		);
		$controller = new Cybersource_Payment_Controller( $model );
		$view = new Cybersource_Payment_View( $controller, $model );

		// View and controller actions.
		$controller->save_data( $_POST );
		echo $view->get_output();
		break;

	default:
		/**
		 * Load class file for the Default Model.
		 */
		require( 'model/default-model.php' );

		/**
		 * Load class file for the Default View.
		 */
		require( 'view/default-view.php' );
		$model = new Default_Model(
			'template/error-404-template.php',
			GLOBALS_PATH,
			GLOBALS_URL
		);
		$view = new Default_View( NULL, $model );
		header( $_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found' );
		echo $view->get_output();
}
