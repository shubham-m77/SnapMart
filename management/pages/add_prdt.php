<?php
require "../db.php";
$cat_name=$_POST['category_name'];
$prdt_name=$_POST['product_name'];
$prdt_des=$_POST['product_description'];
$prdt_qty=$_POST['product_qty'];
$prdt_amt=$_POST['product_amt'];

$prdt_img=$_FILES['product_img'];
$prdt_img_name=$prdt_img['name'];
$prdt_img_location=$prdt_img['tmp_name'];
$check_table=$db->query("SHOW TABLES LIKE 'products'");
if($check_table->num_rows != 0){
    $file_check=file_exists("../product_images/".$prdt_img_name);
        if($file_check){
            echo "File Already exist !!";
        }
        else{
            $file_upload=move_uploaded_file($prdt_img_location,"../product_images/".$prdt_img_name);
            if($file_upload){
                $data_store=$db->query("INSERT INTO products(category,product_name,product_img,product_description,product_quantity,product_amount)
        VALUES('$cat_name','$prdt_name','$prdt_img_name','$prdt_des','$prdt_qty','$prdt_amt')");
                if($data_store){
                    echo "Data Stored";
                }
                else{echo "Data not Stored";}
        }
            else{echo "File not uploaded";}
        
        } 
}
else{
    $table_create=$db->query("CREATE TABLE products(id INT(11) NOT NULL AUTO_INCREMENT,
    category VARCHAR(100),
    product_name VARCHAR(200),
    product_img VARCHAR(200),
    product_description MEDIUMTEXT,
    product_quantity VARCHAR(100),
    product_amount VARCHAR(100),
    PRIMARY KEY(id)
    )
    ");
    if($table_create){
        $file_check=file_exists("../product_images/".$prdt_img_name);
        if($file_check){
            echo "File Already exist !!";
        }
        else{
            $file_upload=move_uploaded_file($prdt_img_location,"../product_images/".$prdt_img_name);
            if($file_upload){
                $data_store=$db->query("INSERT INTO products(category,product_name,product_img,product_description,product_quantity,product_amount)
        VALUES('$cat_name','$prdt_name','$prdt_img_name','$prdt_des','$prdt_qty','$prdt_amt')");
                if($data_store){
                    echo "Data Stored";
                }
                else{echo "Data not Stored";}
        }
            else{echo "File not uploaded";}
        
        }
        
    }
    else{
        echo "Table Creation Failed";
    }
}
?>