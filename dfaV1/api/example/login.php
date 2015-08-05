<?php

require_once("../../wp-load.php");
require_once( '../lib/woocommerce-api.php' );


$_REQUEST = json_decode(file_get_contents('php://input'),TRUE);

   $username = htmlspecialchars($_REQUEST['usr']);
   $password = htmlspecialchars($_REQUEST['pwd']);

   $user = get_user_by('login', $username);

   /*** COMPARE FORM PASSWORD WITH WORDPRESS PASSWORD ***/
   if(!wp_check_password($password, $user->data->user_pass, $user->ID)):
      unset($user);
      $user->data="Username / Password incorrect";
   endif;

   //
	if(!empty($user->ID))
	{
		$options = array(
			'debug'           => true,
			'return_as_array' => false,
			'validate_url'    => false,
			'timeout'         => 30,
			'ssl_verify'      => false,
		);

		try {

			$client = new WC_API_Client( 'http://www.westjetapp.com/dfaV1/', 'ck_bd4ecc122c4fdcdef19e23f60a265d22', 'cs_327ec3191fe0c420cfaac0134fa6e3a1', $options );

			
			$customer = $client->customers->get( $user->ID );
			echo $values=json_encode($customer);
		}catch ( WC_API_Client_Exception $e ) {

			echo $e->getMessage() . PHP_EOL;
			echo $e->getCode() . PHP_EOL;

			if ( $e instanceof WC_API_Client_HTTP_Exception ) {

				print_r( $e->get_request() );
				print_r( $e->get_response() );
			}
		}
	}
	else
		echo $values=json_encode($user);


?>
