<?php
require '../../src/Payment.php';
require '../../src/Crypto.php';
require '../../src/Validator.php';


$obj = new \Paykun\Checkout\Payment('025300685929049', '73D55DBC7EF17F4BFE9830778231C5DB', '30867E5500E00BDF02F9A2E8700605DE', false, true);
$response = $obj->getTransactionInfo($_REQUEST['payment-id']);

var_dump($response);
if(is_array($response) && !empty($response)) {

    if($response['status'] && $response['data']['transaction']['status'] == "Success") {
        echo "Transaction success";
    } else {
        echo "Transaction failed";
    }
}
?>