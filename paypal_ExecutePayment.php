<?php

use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
include 'paypal_bootstrap.php';

if(!isset($_GET["success"] , $_GET["paymentId"] , $_GET["PayerID"])){
	die('cancel');
}
if((bool) $_GET["success"] === false){
	die('success');
}
$paymentId = $_GET["paymentId"];
$payerId = $_GET["PayerID"];
$payment = Payment::get($paymentId,$apiContext );
$execute = new PaymentExecution();
$execute->setPayerId($payerId);
try{
	$result = $payment->execute($execute , $apiContext );
	/* var_dump($result); */
header('Location: front_ordersuccess.php');
}
catch(Exception $e){
	$data = json_decode($e->getData());
	var_dump($data->message);
	die();
}
?>