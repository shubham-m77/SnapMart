<?php
require "php/db.php";
require "php/navbar.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SnapMart - Products</title>
    <script src="http://localhost/SnapMart/js/jquery.min.js"></script>
    <script src="http://localhost/SnapMart/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://localhost/SnapMart/css/bootstrap.min.css">
<link
      rel="stylesheet"
      data-purpose="Layout StyleSheet"
      title="Web Awesome"
      href="/css/app-wa-4605c815f1874757bc9ac33aa114fb0f.css?vsn=d">
<link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/all.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-thin.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-solid.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-regular.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-duotone-light.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-thin.css">

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-solid.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-regular.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/sharp-light.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/duotone-thin.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/duotone-regular.css"
      >

      <link
        rel="stylesheet"
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/duotone-light.css"
      >
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
    body{margin:0;padding:0;overflow-x:hidden;}
    *{box-sizing:border-box}
    .navbar{font-family: poppins;box-shadow:0 0px 15px #ccc;display: flex;
    align-items: center; /* Centers the navbar items vertically */
    justify-content: space-between; height: 70px;}
    .search-form{width:49%;padding-top:15px;}
    .search-input{padding-right: 30px;}
    .search-container {
        position: relative;
        display: inline-block;
        width: 100%;
    }
    .search-icon{
        position: absolute;
        border: none;
        background-color: none;
        padding: none;
        top: 50%;
        right: 20px;
        transform: translateY(-50%);
    }
    .card-body{background-color:rgb(239, 247, 252);}
    .row{font-family: montserrat;}
    .price-tag{font-weight:500;}
    .card-body button{background-color:rgb(255, 196, 0);float:right;font-weight: 450;}
    .card-body button:hover{background-color:rgb(255, 170, 2);transition: ease-in 0.2s;}
    .real-price{text-decoration: line-through;}
    a{text-decoration: none;border: none;}
</style>
</head>
<body>
<?php
$prd_category=$_GET['product_category'];
$prd_category=str_replace('-',' ',$prd_category);
$prd_category=ucfirst($prd_category);
$product_data=$db->query("SELECT * FROM products WHERE category='$prd_category'  ORDER BY id DESC"); 
    echo "<div class='row'>
    <h2 class='text-center my-4'>".$prd_category."</h2>
    ";
    while($prd_array=$product_data->fetch_assoc()){
        echo "<div class='col-md-3 px-4'>
        <a href='http://localhost/SnapMart/Product-details/".$prd_array["id"]."'>
        <div class='card d-flex justify-content-center align-items-center'>
        <img src='http://localhost/SnapMart/images/".$prd_array['product_img']."' class='w-50 py-2 pb-0'>
        <div class='card-body w-100'>
        <label class='fs-6 text-center'>".$prd_array['product_name']."</label><br>
     <div class='d-flex justify-content-between align-items-center'><label class='fs-4 text-dark price-tag dis-price'>&#8377; ".$prd_array['product_amount']-($prd_array['product_amount']*5/100)."</label>
        <button class='btn rounded-pill btn-sm'>Add To Cart</button></div>
        <span class='fs-6 text-secondary real-price'> ".$prd_array['product_amount']."</span>
        </div></div></a>
        </div>";
    }
    echo '</div>';
    
?>
<?php  require "php/footer.php"; ?>
</body>
</html>