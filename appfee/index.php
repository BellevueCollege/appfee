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
define( 'VERSION_NUMBER', '0.3.0.4' );

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
		 * Load class file for Form Post Model.
		 */
		require( 'model/form-post-model.php' );

		/**
		 * Load class file for Form Post View.
		 */
		require( 'view/form-post-view.php' );

		// Configuration objects and variables.
		$post_url = 'https://'
			. $request_host
			. $base_uri
			. 'general-admissions/program-of-study'
		;
		$resource_library_configuration = new HTML_Resource_Library();

		// Model view controller objects.
		$model = new Form_Post_Model(
			'template/student-name-dob-template.php',
			$resource_library_configuration,
			$post_url
		);
		$controller = NULL;
		$view = new Form_Post_View( $controller, $model );

		// View and controller actions.
		echo $view->get_output();
		break;

	case 'general-admissions/program-of-study':
		/**
		 * Load class file for Name & Date of Birth Model.
		 */
		require( 'model/name-dob-model.php' );

		/**
		 * Load class file for Name & Date of Birthy Controller.
		 */
		require( 'controller/name-dob-controller.php' );

		/**
		 * Load class file for Name & Date of Birth View.
		 */
		require( 'view/name-dob-view.php' );

		// Configuration objects and variables.
		$post_url = 'https://'
			. $request_host
			. $base_uri
			. 'general-admissions/save'
		;
		$resource_library_configuration = new HTML_Resource_Library();

		// Model view controller objects.
		$model = new Name_DOB_Model(
			'template/program-of-study-template.php',
			$resource_library_configuration,
			$post_url
		);
		$controller = new Name_DOB_Controller( $model );
		$view = new Name_DOB_View( $controller, $model );

		// Display Output
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

		// Configuration objects.
		$resource_library_configuration = new HTML_Resource_Library();

		// Model view controller objects.
		$model = new Default_Model(
			'template/error-404-template.php',
			$resource_library_configuration
		);
		$view = new Default_View( NULL, $model );

		// View and controller actions.
		header( $_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found' );
		echo $view->get_output();
}
