<?php
session_start();
$id=session_id();
$merchant_id         = $_POST['merchant_id'];
$order_id             = $_POST['order_id'];
$payhere_amount     = $_POST['payhere_amount'];
$payhere_currency    = $_POST['payhere_currency'];
$status_code         = $_POST['status_code'];
$md5sig                = $_POST['md5sig'];


$merchant_secret = '4JFpBsLg9aA4TnP2FD0aZs4KFgXCnNkQK8Qq9JzM9OPD'; // Replace with your Merchant Secret (Can be found on your PayHere account's Settings page)

$local_md5sig = strtoupper (md5 ( $merchant_id . $order_id . $payhere_amount . $payhere_currency . $status_code . strtoupper(md5($merchant_secret)) ) );

if (($local_md5sig === $md5sig) AND ($status_code == 2) ){
        //TODO: Update your database as payment success
        $add_payment=$con->prepare("INSERT INTO payment(user_id, pro_id, qnty, urgent,addDate) VALUES('$id', '$pro_id', '1', ' ',NOW())");
}

?>