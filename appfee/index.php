<?php

/*
 * This is where URL mapping to backend code happens
 */

require_once( 'configuration.php' );

/** @var string Contains BASE_URI constant without trailing slashes */
$base_uri = rtrim( BASE_URI, '/' );

/** @var string Contains REQUEST_URI eliment from the $_SERVER array */
$request_uri = $_SERVER['REQUEST_URI'];
$request_uri = substr( $request_uri, strlen( $base_uri ) );

switch ( $request_uri ) {
	case '/general-admissions':
		require_once( 'model/default-model.php' );
		require_once( 'view/default-view.php' );
		$model = new Default_Model( 'template/test-template.php' );
		$controler = NULL;
		$view = new Default_View( $controler, $model );
		echo $view->get_output();
		break;

	default:
		echo $request_uri;
}
