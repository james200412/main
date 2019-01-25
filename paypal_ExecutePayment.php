<?php
Session_start();
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
include 'paypal_bootstrap.php';

if(!isset($_GET["success"] , $_GET["paymentId"] , $_GET["PayerID"])){

	unset($_SESSION['ispaypal']);
	header('Location: checkout.php');
}
if((bool) $_GET["success"] === false){
die('error1');
//header('Location: cartaction.php?action=placeOrder');

}
$paymentId = $_GET["paymentId"];
$payerId = $_GET["PayerID"];
$payment = Payment::get($paymentId,$apiContext );
$execute = new PaymentExecution();
$execute->setPayerId($payerId);
try{
	$result = $payment->execute($execute , $apiContext );
	/* var_dump($result); */
	$_SESSION['ispaypal'] =1;
header('Location: cartaction.php?action=placeOrderpaypal');
}
catch(Exception $e){
	$data = json_decode($e->getData());
	var_dump($data->message);
	die();
}
?>