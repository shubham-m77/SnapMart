<?php 
require "db.php";
$mob_no=$_POST['mobile_no'];
$check_table=$db->query("SHOW TABLES LIKE 'register'");
if($check_table->num_rows != 0)
{}
else{
    // OTP
    $patterns="1234567890";
    $lenth=strlen($patterns);
    $otp=[];
    for ($i=0; $i<=6 ; $i++) { 
        $random=rand(0,$lenth);
        $otp[]=$patterns[$random];
    }



    $create_table=$db->query("CREATE TABLE register(id INT(11) NOT NULL AUTO_INCREMENT,
    full_name VARCHAR(100),
    email VARCHAR(100),
    mobile_no INT(11),
    password VARCHAR(100),
    date DATE,
    PRIMARY KEY(id)");
    if($create_table){
        
    }
    else{echo "Table not Created";}
}
// $check_mob=$db->query("SELECT * FROM register WHERE mobile_no='$mob_no'");
//     if($check_table->num_rows != 0)
//     {
//         echo "User already Exist";
//     }
?>
