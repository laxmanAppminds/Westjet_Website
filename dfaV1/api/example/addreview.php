<?php

require_once("../../wp-load.php");
require_once( '../lib/woocommerce-api.php' );

//$uname=$_REQUEST['usr'];
//$password=$_REQUEST['pwd'];

$data =json_decode(file_get_contents('php://input'),TRUE); 
//echo "<pre>";print_r($data);exit;
$comment_id=wp_insert_comment($data);
echo $values=json_encode($comment_id);


?>