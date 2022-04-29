<?php
session_start();
error_reporting(0);
$dt=date("Y-m-d");
include("databaseconnection.php");
if(isset($_POST['submitproduct']))
{
//####################################
$productdescription = mysqli_real_escape_string($con,$_POST['product_description']);
$imgname = rand() . $_FILES['product_image']['name'];
move_uploaded_file($_FILES["product_image"]["tmp_name"],"imgproduct/".$imgname);
$sql = "INSERT INTO  product (customer_id,category_id,product_name,product_description,starting_bid,ending_bid,start_date_time,end_date_time,product_cost,product_image,product_warranty,product_delivery,company_name,status) VALUES('$_SESSION[customer_id]','$_POST[category_id]','$_POST[product_name]','$productdescription','$_POST[starting_bid]','$_POST[starting_bid]','$_POST[start_date] $_POST[start_time]','$_POST[end_date] $_POST[end_time]','$_POST[product_cost]','$imgname','$_POST[product_warranty]','$_POST[product_delivery]','$_POST[company_name]','Pending')";
$qsql = mysqli_query($con,$sql);
echo mysqli_error($con);
$insid = mysqli_insert_id($con);
//####################################
$sql = "INSERT INTO  billing (purchase_date,purchase_amount,payment_type,card_type,card_number,expire_date,cvv_number,card_holder,delivery_date,note,status,customer_id,product_id) VALUES('$dt','100','Sell','$_POST[payment_type]','$_POST[card_number]','$_POST[expire_date]-01','$_POST[cvv_number]','$_POST[card_holder]','$_POST[delivery_date]','$_POST[note]','Active','$_SESSION[customer_id]','$insid')";
$qsql = mysqli_query($con,$sql);
$paymentid=mysqli_insert_id($con);
//####################################
$sqlcustomer= "SELECT * FROM customer WHERE customer_id='$_SESSION[customer_id]'";
$qresultcustomer = mysqli_query($con,$sqlcustomer);
$rscustomer = mysqli_fetch_array($qresultcustomer);
//####################################
$sqlpayment = "SELECT * FROM billing WHERE billing_id='$paymentid'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
$rspayment= mysqli_fetch_array($qsqlpayment);
//####################################
}
if(isset($_POST['submit']))
{
//####################################
$sql = "INSERT INTO  billing (purchase_date,purchase_amount,payment_type,card_type,card_number,expire_date,cvv_number,card_holder,status,customer_id) VALUES('$dt','$_POST[paid_amount]','Deposit','$_POST[card_type]','$_POST[card_number]','$_POST[expire_date]-01','$_POST[cvv_number]','$_POST[card_holder]','Pending','$_SESSION[customer_id]')";
$qsql = mysqli_query($con,$sql);
$paymentid=mysqli_insert_id($con);
//####################################
$sqlcustomer= "SELECT * FROM customer WHERE customer_id='$_SESSION[customer_id]'";
$qresultcustomer = mysqli_query($con,$sqlcustomer);
$rscustomer = mysqli_fetch_array($qresultcustomer);
//####################################
$sqlpayment = "SELECT * FROM billing WHERE billing_id='$paymentid'";
$qsqlpayment = mysqli_query($con,$sqlpayment);
$rspayment= mysqli_fetch_array($qsqlpayment);
//####################################
}
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
$ipaymentid      = "0000000000" . $paymentid;

/**
 *  Parameters requires to initialize an object of Payment are as follow.
 *  mid => Merchant Id provided by Paykun
 *  accessToken => Access Token provided by Paykun
 *  encKey =>  Encryption provided by Paykun
 *  isLive => Set true for production environment and false for sandbox or testing mode
 *  isCustomTemplate => Set true for non composer projects, will disable twig template
 */

$obj = new \Paykun\Checkout\Payment('411188426699625', 'E50411715DCA9ADA170C1C725EFDD1C5', '32E997066102B4EC8FC0840593AD0622', true, true);

$successUrl = str_replace("request.php", "success", $_SERVER['HTTP_REFERER']);
$failUrl 	= str_replace("request.php", "failed", $_SERVER['HTTP_REFERER']);

// Initializing Order
$obj->initOrder($ipaymentid, $product_name,  $amount, $successUrl,  $failUrl, 'INR');
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