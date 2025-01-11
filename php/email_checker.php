<?php
require "db.php";
$email=$_POST['email'];
$data=$db->query("SELECT * FROM register WHERE email='$email'");
if($data->num_rows!=0){
  echo "User found";
}
else{
  echo "User not found";
}

?>