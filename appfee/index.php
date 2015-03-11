<?php

/*
 * This is where URL mapping to backend code happens
 */

require_once( 'configuration.php' );

define( 'VERSION_NUMBER', '0.1.0.1' );

/** @var string Contains HTTP_HOST eliment from the $_SERVER array */
$request_host = $_SERVER['HTTP_HOST'];

/** @var string Contains REQUEST_URI eliment from the $_SERVER array */
$request_uri = $_SERVER['REQUEST_URI'];

/** @var string Contains BASE_URI constant */
$base_uri = rtrim( BASE_URI, '/' ) . '/';

// Check to make sure we are hosted out of the correct directory
if ( $base_uri !== substr( $request_uri, 0, strlen( $base_uri ) ) ) {
	$error_message = 'The BASE_URI constant does not match the requested ' .
		'URI. Please review the configuration.php file and set BASE_URI to ' .
		'the appropriate path'
	;
	throw new Exception( $error_message );
}

// Redirect to HTTPS
if ( ! isset( $_SERVER['HTTPS'] ) ) {
	$url = 'https://' . $request_host . $request_uri;
	header( 'HTTP/1.1 301 Moved Permanently' );
	header( 'Location: ' . $url );
	exit();
}

/** @var string Contains $request_uri minus $base_uri  */
$application_uri = substr( $request_uri, strlen( $base_uri ) );
switch ( $application_uri ) {
	case 'general-admissions':
		require_once( 'model/student-name-dob-model.php' );
		require_once( 'view/student-name-dob-view.php' );
		$post_url =
			'https://' .
			$request_host .
			$base_uri .
			'general-admissions/save'
		;
		$model = new Student_Name_DOB_Model(
			'template/student-name-dob-template.php',
			GLOBALS_PATH,
			GLOBALS_URL,
			$post_url
		);
		$controler = NULL;
		$view = new Student_Name_DOB_View( $controler, $model );
		echo $view->get_output();
		break;

	case 'general-admissions/save':
		require_once( 'model/cybersource-payment-model.php' );
		require_once( 'controller/cybersource-payment-controller.php' );
		require_once( 'view/cybersource-payment-view.php' );
		$model = new Cybersource_Payment_Model(
			'template/cybersource-payment-template.php',
			GLOBALS_PATH,
			GLOBALS_URL,
			DEFAULT_BILL_TO_ADDRESS_COUNTRY,
			DEFAULT_BILL_TO_ADDRESS_STATE,
			CURRENCY,
			CYBERSOURCE_ACCESS_KEY,
			CYBERSOURCE_LOCALE,
			CYBERSOURCE_PROFILE_ID,
			CYBERSOURCE_SECRET_KEY,
			CYBERSOURCE_FORM_POST_URL,
			GENERAL_ADMISSIONS_ITEM_DESCRIPTION,
			'1',
			GENERAL_ADMISSIONS_FEE,
			DEFAULT_TRANSACTION_TYPE
		);
		$controller = new Cybersource_Payment_Controller( $model );
		$view = new Cybersource_Payment_View( $controller, $model );
		$controller->save_data( $_POST );
		echo $view->get_output();
		break;

	default:
		require_once( 'model/default-model.php' );
		require_once( 'view/default-view.php' );
		$model = new Default_Model(
			'template/error-404-template.php',
			GLOBALS_PATH,
			GLOBALS_URL
		);
		$view = new Default_View( NULL, $model );
		header( 'HTTP/1.1 404 Not Found' );
		echo $view->get_output();
}
