<?php
require "db.php";
// User Details
$email=base64_decode($_COOKIE['sm_auth_ui']);
$cust_name=$_POST['cust_name'];
$address=$_POST['address_line_1'];
$city=$_POST['city'];
$pin_code=$_POST['pin-code'];
$state=$_POST['state'];
$phone=$_POST['phone'];
$del_inst=$_POST['delivery_instructions'];
$pay_mode=$_POST['payment_mode'];

// Product details
$prd_id=$_POST['prd_id'];
$prd_sql=$db->query("SELECT * FROM products WHERE id='$prd_id'");
$product=$prd_sql->fetch_assoc();
$prd_name=$product["product_name"];
$prd_amt=$product["product_amount"];
$prd_amt=$product["product_amount"]-($product["product_amount"]*5/100);
$prd_qty=$_POST['qty'];
$total_amt=$prd_amt*$prd_qty;

// Include the Razorpay PHP SDK
require('../vendor/autoload.php');
use Razorpay\Api\Api;
// Create an order
$api = new Api('rzp_test_qXuy0x5vinwn5H', 'JF7o1oQtIGE4dffVBzjRvgqT');

$orderData = [
    'receipt'         => $prd_id,
    'amount'          =>($total_amt*100), 
    'currency'        => 'INR',
    'payment_capture' => 1
];

try {
    // Create order via Razorpay API
    $order = $api->order->create($orderData);
    $orderId = $order->id;
    
    // Return order details to frontend
    echo json_encode([
        'order_id' => $orderId, 
        'amount' => ($total_amt * 100),  // Amount in paise
        'key_id' => 'rzp_test_qXuy0x5vinwn5H',
         'prd_id'=>$prd_id,
         'prd_qty'=>$prd_qty,
         'pay_mode'=>$pay_mode
    ]);}
    catch (Exception $e) {
        // Log and display error
        error_log($e->getMessage());
        echo json_encode(['error' => 'Something went wrong while creating the payment order.']);
        exit;
    }
?>

