<?php

require_once( '../lib/woocommerce-api.php' );

$options = array(
	'debug'           => true,
	'return_as_array' => false,
	'validate_url'    => false,
	'timeout'         => 30,
	'ssl_verify'      => false,
);

try {

	$client = new WC_API_Client( 'http://www.westjetapp.com/dfaV1/', 'ck_bd4ecc122c4fdcdef19e23f60a265d22', 'cs_327ec3191fe0c420cfaac0134fa6e3a1', $options );

	$_REQUEST = json_decode(file_get_contents('php://input'),TRUE);

	$response_json=$client->customers->create(array( 'first_name' => $_REQUEST['fname'], 'last_name' => $_REQUEST['lname'] ,'email' => $_REQUEST['email'],'username' => $_REQUEST['email'],'password'=>$_REQUEST['pwd'] ) );
	echo $values=json_encode($response_json);exit;
	
} catch ( WC_API_Client_Exception $e ) {

	echo $e->getMessage() . PHP_EOL;
	echo $e->getCode() . PHP_EOL;

	if ( $e instanceof WC_API_Client_HTTP_Exception ) {

		print_r( $e->get_request() );
		print_r( $e->get_response() );
	}
}
