<?php
foreach ( $errors as $index => $error ) {
	header( "X-Error-$index: $error" );
}
header( 'HTTP/1.1 302 Found' );
header( 'Location: ' . $redirect_url );
