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
$prd_img=$product["product_img"];
$prd_amt=$product["product_amount"];
$prd_amt=$product["product_amount"]-($product["product_amount"]*5/100);
$prd_qty=$_POST['qty'];
$total_amt=$prd_amt*$prd_qty;


//Payment Status Check
if($pay_mode=="COD"){
  $pay_status="Pending"; 
  $pay_id='N/A';
}
else if($pay_mode=="Online"){
    $pay_status="Completed";  
    $pay_id=$_POST['payment_id'];
  }
$check_table=$db->query("SHOW TABLES LIKE 'received_order'");
if($check_table->num_rows != 0){
    $data=$db->query("INSERT INTO received_order(prd_name,prd_img,prd_amount,total_amount,payment_status,prd_qty,c_name,c_address,c_city,c_state,c_pincode,c_del_instructions,c_mobile,c_email,payment_mode,payment_id)
    VALUES('$prd_name','$prd_img','$prd_amt','$total_amt','$pay_status','$prd_qty','$cust_name','$address','$city','$state','$pin_code','$del_inst','$phone','$email','$pay_mode','$pay_id')");
        if($data){
            echo "Order Success";
        }
        else{
            echo "Order Failed !!";
        }
}
else{
    $table=$db->query("CREATE TABLE received_order(id INT(11) NOT NULL AUTO_INCREMENT,
    prd_name VARCHAR(255),
    prd_img VARCHAR(255),
    prd_amount VARCHAR(255),
    total_amount VARCHAR(255),
    prd_qty VARCHAR(255),
    c_name VARCHAR(255),
    c_address VARCHAR(255),
    c_city VARCHAR(255),
    c_state VARCHAR(255),
    c_pincode VARCHAR(255),
    c_del_instructions VARCHAR(255),
    c_mobile VARCHAR(255),
    c_email VARCHAR(255),
    payment_mode VARCHAR(255),
    payment_status VARCHAR(255),
    payment_id VARCHAR(255),
    order_time DATETIME DEFAULT CURRENT_TIMESTAMP,
    order_status VARCHAR(255) DEFAULT 'pending',
    PRIMARY KEY(id))");
    if($table){
        $data=$db->query("INSERT INTO received_order(prd_name,prd_img,prd_amount,total_amount,payment_status,prd_qty,c_name,c_address,c_city,c_state,c_pincode,c_del_instructions,c_mobile,c_email,payment_mode,payment_id)
    VALUES('$prd_name','$prd_img','$prd_amt','$total_amt','$pay_status','$prd_qty','$cust_name','$address','$city','$state','$pin_code','$del_inst','$phone','$email','$pay_mode','$pay_id')");
      if($data){
            echo "Order Success";
            
        }
        else{
            echo "Order Failed !!";
        }
    }
    else{
        echo "Table not created";
    }
}


?>