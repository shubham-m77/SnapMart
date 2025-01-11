
<?php
require "../db.php";
$cat_name=$_POST["edit_cat_name"];
$cat_url=strtolower($cat_name);
$cat_url=str_replace(' ','-',$cat_url);
$cat_id=$_POST["edit_cat_id"];
$res=$db->query("UPDATE category SET category_name='$cat_name' , category_url='$cat_url' WHERE id='$cat_id'");
if($res){echo "Updated";}
else{echo "Updation Failed !!";}
 ?>