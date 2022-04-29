<?php
//###################################
session_start();
include("../databaseconnection.php");
$sqlcustomer= "SELECT * FROM customer WHERE customer_id='$_SESSION[customer_id]'";
$qresultcustomer = mysqli_query($con,$sqlcustomer);
$rscustomer = mysqli_fetch_array($qresultcustomer);
//####################################
$sqlpayment = "SELECT * FROM billing WHERE billing_id='$_GET[paymentid]'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
$rspayment= mysqli_fetch_array($qsqlpayment);
//####################################
require 'src/Payment.php';
require 'src/Validator.php';
require 'src/Crypto.php';

$fname          = $rscustomer['customer_name'];
$product_name   = $rspayment['payment_type'];
$email          = $rscustomer['email_id'];
$amount         = $rspayment['purchase_amount'];
$contact        = $rscustomer['mobile_no'];
$country        = "India";
$state          = $rscustomer['state'];
$city           = $rscustomer['city'];
$postalcode     = $rscustomer['pincode'];
$address        = $rscustomer['address'];
$billing_id		= $rspayment['billing_id'];
$paymentid      = sprintf("%010s", $billing_id);

/**
 *  Parameters requires to initialize an object of Payment are as follow.
 *  mid => Merchant Id provided by Paykun
 *  accessToken => Access Token provided by Paykun
 *  encKey =>  Encryption provided by Paykun
 *  isLive => Set true for production environment and false for sandbox or testing mode
 *  isCustomTemplate => Set true for non composer projects, will disable twig template
 */

$obj = new \Paykun\Checkout\Payment('025300685929049', '73D55DBC7EF17F4BFE9830778231C5DB', '30867E5500E00BDF02F9A2E8700605DE', false, true);

$successUrl = str_replace("request.php", "success", $_SERVER['HTTP_REFERER']);
$failUrl 	= str_replace("request.php", "failed", $_SERVER['HTTP_REFERER']);

// Initializing Order
$obj->initOrder($paymentid, $product_name,  $amount, $successUrl,  $failUrl, 'INR');
//$obj->initOrder(generateByMicrotime(), $product_name,  $amount, $successUrl,  $failUrl, 'INR');

// Add Customer
$obj->addCustomer($fname, $email, $contact);

// Add Shipping address
$obj->addShippingAddress('', '', '', '', '');

$obj->addBillingAddress('', '', '', '', '');
// Add Billing Address

//Enable if require custom fields
$obj->setCustomFields(array('udf_1' => 'Some Dummy text'));
//Render template and submit the form
echo $obj->submit();

/* Check for transaction status
 * Once your success or failed url called then create an instance of Payment same as above and then call getTransactionInfo like below
 *  $obj = new Payment('merchantUId', 'accessToken', 'encryptionKey', true, true); //Second last false if sandbox mode
 *  $transactionData = $obj->getTransactionInfo(Get payment-id from the success or failed url);
 *  Process $transactionData as per your requirement
 *
 * */


function generateByMicrotime() {
    $microtime = str_replace('.', '', microtime(true));
    return (substr($microtime, 0, 14));
}
?>