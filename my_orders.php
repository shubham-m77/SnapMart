<?php
require "php/db.php";
require "php/navbar.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SnapMart - Home</title>
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
      <script src="https://checkout.razorpay.com/v1/checkout.js"></script>

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
        href="https://site-assets.fontawesome.com/releases/v6.7.1/css/duotone-light.css">
      <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
<style>
    .navbar{font-family: poppins;box-shadow:0 0px 15px #ccc;display: flex;
    align-items: center; /* Centers the navbar items vertically */
    justify-content: space-between; height: 70px;}
    .search-form{width:49%;padding-top:15px; box-sizing: border-box;}
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
    body{font-family: montserrat;background-color:rgb(233, 242, 248) ;}
    .item{font-weight:500;}
    .order-list{background-color: #FFFDE7;box-shadow: 0 0 15px #FFFDE7;border-bottom: 1.5px solid #ccc;}
    a{color: inherit;text-decoration: none;}
    .order-pending{color:#ffa632;}
    .order-cancelled{color:#ff4f4f;}
    .order-delivered{color:#52f700;}
    .order-other{color:#2889ff;}
    .order-list:hover{background-color:rgb(233, 231, 207);transition: 0.2s linear;}
</style>
</head>
<body>
    <h2 class="text-center my-3">My Orders</h2>
    <div class="container my-2">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
            <?php
            $email=base64_decode($_COOKIE["sm_auth_ui"]);
            
            $data=$db->query("SELECT * FROM received_order WHERE c_email='$email'");
            while($array=$data->fetch_assoc())
            {if ($array['order_status'] == 'Pending') {
                $statusClass = 'order-pending';
            } elseif ($array['order_status'] == 'Cancelled') {
                $statusClass = 'order-cancelled';
            } elseif ($array['order_status'] == 'Delivered') {
                $statusClass = 'order-delivered';
            } else {
                $statusClass = 'order-other';
            }
                echo "<a href='http://localhost/SnapMart/Your-Order/".$array['id']."'><div class='d-flex align-items-center rounded order-list'>
                <div>
                <img src='http://localhost/SnapMart/images/".$array['prd_img']."' alt='product_img' width='100px'>
                </div>
                <div class='ps-4'>
                <label class='fs-5 $statusClass'>Order ".ucfirst($array['order_status'])."</label><br>
                <label class='fs-6 text-secondary item'>".$array['prd_name']."</label><br>
                <label class='fs-6 text-secondary item'>&#8377; ".$array['total_amount']."</label>
            
                </div>
                </div></a>";
                
                
            }
            ?>
            </div>
            <div class="col-md-3"></div>
        </div>
    </div>
    <?php  require "php/footer.php"; ?>
</body>
</html>