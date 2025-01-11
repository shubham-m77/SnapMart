<?php
require "../db.php";
 $prd_id=$_POST['product_id'];
 $res= $db->query("SELECT * FROM products WHERE id='$prd_id'");
 $ary=$res->fetch_assoc();
 echo json_encode($ary);
 ?>