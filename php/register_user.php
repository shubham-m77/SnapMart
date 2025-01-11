<?php 
require "db.php";
$full_name=mysqli_real_escape_string($db,strip_tags($_POST['full_name']));
$email=mysqli_real_escape_string($db,strip_tags($_POST['email']));
$mobile=mysqli_real_escape_string($db,strip_tags($_POST['mobile_no']));
$password=mysqli_real_escape_string($db,strip_tags(md5($_POST['password'])));
$date=date("Y-m-d");
$check_table=$db->query("SHOW TABLES LIKE 'register'");
if($check_table->num_rows != 0)
{
    $check_user=$db->query("SELECT * FROM register WHERE email='$email'");
    if($check_user->num_rows !=0)
    {echo "Email Already Exist";}
    else{
    $data=$db->query("INSERT INTO register(full_name,email,mobile_no,password,date)
    VALUES('$full_name','$email','$mobile','$password','$date')");
    if($data)
    {echo "Registered Success";}
    else{echo "Register Failed !!";}
    }
}
else{
    $create_table=$db->query("CREATE TABLE register(id INT(11) NOT NULL AUTO_INCREMENT,
    full_name VARCHAR(100),
    email VARCHAR(100),
    mobile_no VARCHAR(15),
    password VARCHAR(100),
    date DATE,
    PRIMARY KEY(id))");
    if($create_table){
        $check_user=$db->query("SELECT * FROM register WHERE email='$email'");
        if($check_user->num_rows !=0)
        {echo "Email Already Exist";}
        else{
        $data=$db->query("INSERT INTO register(full_name,email,mobile_no,password,date)
        VALUES('$full_name','$email','$mobile','$password','$date')");
        if($data)
        {echo "Registered Success";}
        else{echo "Register Failed !!";}
        }
        
    }
    else{echo "Table not Created";}
}

?>
