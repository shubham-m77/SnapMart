<?php
require "../db.php";
$btn_type=$_POST['btn_type'];
$oid=$_POST['oid'];
if($btn_type=="order_status"){
$update=$db->query("UPDATE received_order SET $btn_type='Delivered' WHERE id='$oid'");
    if($update){
    echo "Order Updated";
    }
    else{
        echo "Failed";
    }
}
else if($btn_type=="payment_status"){
    $update=$db->query("UPDATE received_order SET $btn_type='Completed' WHERE id='$oid'");
    if($update){
        echo "Order Updated";
        }
        else{
            echo "Failed";
        }
    }

?>