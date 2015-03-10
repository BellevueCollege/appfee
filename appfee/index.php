<?php

/*
 * This is where URL mapping to backend code happens
 */

require_once( 'configuration.php' );

/** @var string Contains HTTP_HOST eliment from the $_SERVER array */
$request_host = $_SERVER['HTTP_HOST'];

/** @var string Contains REQUEST_URI eliment from the $_SERVER array */
$request_uri = $_SERVER['REQUEST_URI'];

/** @var string Contains BASE_URI constant without trailing slashes */
$base_uri = rtrim( BASE_URI, '/' );

// Redirect to HTTPS
if ( ! isset( $_SERVER['HTTPS'] ) ) {
	$url = 'https://' . $request_host . $request_uri;
	header( 'HTTP/1.1 301 Moved Permanently' );
	header( 'Location: ' . $url );
	exit();
}

$application_uri = substr( $request_uri, strlen( $base_uri ) );
switch ( $application_uri ) {
	case 'general-admissions':
		require_once( 'model/student-info-payment-model.php' );
		require_once( 'view/student-info-payment-view.php' );
		$model = new Student_Info_Payment_Model(
			'template/general-admissions-fee-to-cybersource-template.php',
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
			'General Admissions Fee',
			'1',
			'34.00',
			DEFAULT_TRANSACTION_TYPE
		);
		$controler = NULL;
		$view = new Student_Info_Payment_View( $controler, $model );
		echo $view->get_output();
		break;

	default:
		echo $application_uri;
}
