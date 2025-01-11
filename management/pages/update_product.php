
<?php
require "../db.php";
$product_name=$_POST["edit_prd_name"];
$product_category=$_POST["edit_prd_category"];
$old_prd_pic=$_POST["old_prd_pic"];
$product_img=$_FILES["edit_prd_image"];
$product_img_name=$product_img["name"];
$product_img_location=$product_img["tmp_name"];

$product_des=$_POST["edit_prd_des"];
$product_qty=$_POST["edit_prd_qty"];
$product_amt=$_POST["edit_prd_amt"];
$prd_id=$_POST["edit_prd_id"];
if($product_img_name === "")
{$res=$db->query("UPDATE products SET product_name='$product_name' ,
product_description='$product_des',
 product_quantity='$product_qty',
 product_amount='$product_amt',category='$product_category' WHERE id='$prd_id'");
 if($res){echo "Updated";}
 else{echo "Updation Failed !!";}
}
else{
    $del=unlink("../product_images/".$old_prd_pic);
    if($del){
        $check_img=file_exists("../product_images/".$product_img_name);
        if($check_img) {echo "Image Already Exist";}
        else{
            $img_upload=move_uploaded_file($product_img_location,"../product_images/".$product_img_name);
            if($img_upload)
            {
                $update=$db->query("UPDATE products SET product_name='$product_name' ,product_description='$product_des', product_quantity='$product_qty',product_amount='$product_amt',product_img='$product_img_name',category='$product_category' WHERE id='$prd_id'");
        if($update){echo "Updated";}
        else{echo "Updation Failed !!";}
            }
            else{echo "image upload failed";}

        }}
        else{echo "Image not deleted";}
    
}
 ?>
 