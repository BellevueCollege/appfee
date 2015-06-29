<?php
foreach ( $errors as $index => $error ) {
	header( "X-Error-$index: $error" );
}
header( $_SERVER['SERVER_PROTOCOL'] . ' 302 Found' );
header( 'Location: ' . $redirect_url );
