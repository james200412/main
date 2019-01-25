<?php
//step 1 & 2 - paypal ClientID and ClientSecret
include 'paypal_bootstrap.php';
//
session_start();
$amountpaypal = $_SESSION['forpaypalamount'];

use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;

$payer = new Payer();
$payer->setPaymentMethod("paypal");


$item = new Item();
$item->setName('Product Name')
    ->setCurrency('HKD')
    ->setQuantity(1)
    ->setSku("sku")
    ->setPrice(200);

$itemList = new ItemList();
$itemList->setItems([$item]);
$details = new Details();
$details->setShipping(5)
    ->setTax(1)
    ->setSubtotal(200);

$amount = new Amount();
$amount->setCurrency("HKD")
    ->setTotal(206)
    ->setDetails($details);
	
$transaction = new Transaction();
$transaction->setAmount($amount)
    ->setItemList($itemList)
    ->setDescription("Total Payment")
    ->setInvoiceNumber(uniqid());
	
$baseUrl = "http://fypfinal";
$redirectUrls = new RedirectUrls();
$redirectUrls->setReturnUrl("$baseUrl/paypal_ExecutePayment.php?success=true")
    ->setCancelUrl("$baseUrl/paypal_ExecutePayment.php?success=false");
	
$payment = new Payment();
$payment->setIntent("sale")
    ->setPayer($payer)
    ->setRedirectUrls($redirectUrls)
    ->setTransactions(array($transaction));
	
	
$request = clone $payment;
try {
    $payment->create($apiContext);
}catch (Exception $ex) {
	/* print "<pre>";
	print_r($ex);
	print "</pre>"; */
	exit(1);
}
$approvalUrl = $payment->getApprovalLink();
header("location:".$approvalUrl);
?>