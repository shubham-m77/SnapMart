<?php
require "../db.php";
$o_status=$_POST['order_status'];
$o_date=$_POST['order_date'];
$data_array=[];

if (!empty($o_status) && !empty($o_date)) {
    // If both status and date are selected, use DATE() to compare only the date part of the DATETIME column
    $res = $db->query("SELECT * FROM received_order WHERE order_status='$o_status' AND DATE(order_time)='$o_date'");
} elseif (!empty($o_status)) {
    // If only order status is selected
    $res = $db->query("SELECT * FROM received_order WHERE order_status='$o_status'");
} elseif (!empty($o_date)) {
    // If only order date is selected, use DATE() to compare only the date part
    $res = $db->query("SELECT * FROM received_order WHERE DATE(order_time)='$o_date'");
} else {
    // If no filters are selected, fetch all orders
    $res = $db->query("SELECT * FROM received_order");
}
while($data=$res->fetch_assoc()){
    array_push($data_array,$data);
    
}
echo json_encode($data_array);
?>