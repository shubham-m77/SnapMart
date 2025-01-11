<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SnapMart</title>
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
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
        body{margin:0;padding:0;}
        *{box-sizing:border-box;}
        .main-con{height: 100vh;}
        .left{width:85%;height:100vh;background-color: #F8F8F8;float:left;overflow-y: auto;}
        .right{width:15%;height:100vh;background-color:rgb(255, 167, 34);float:left;}
        .right ul{margin:0;padding:0;list-style: none;margin-top:-35px;}
        .right li{font-family: 'Montserrat', sans-serif;font-weight:500;color:white;border-bottom:1px solid white;}
        .right li:hover{color:rgb(255, 167, 34);background-color: white;transition: ease-in 0.2s;cursor: pointer;}
        .load-icon{animation: spin 3s linear infinite;}
        .msg{display: flex;align-items: center;justify-content: center;width:85%;height:100vh;z-index: 100;position: fixed;top:0;left:0;right:15%;}
        @keyframes spin{
    0% {
      transform: rotate(0deg);
    }
    100% {
      transform: rotate(360deg);
    }
  }
  .logo{width:200px;margin-top: 15px;padding-bottom: 40px;}
  .left{font-family:poppins;}
      </style>
</head>
<body>
    <div class="w-100 d-flex main-con">
        <div class="left p-3">
            <div class="msg d-none">
            </div>
            <!-- Response Box for AJAX Feedback -->
<div id="response-box" class="container mt-3 d-none">
    <div class="alert" role="alert" id="response-message"></div>
</div>
        </div>
        <div class="right">
          <a href="#"><img src="../images/snap_logo.png" alt="logo" class="logo"></a>
        <ul>
                <li class="px-4 py-2 menu products-menu" p_link="add_products">Add Products</li>
                <li class="px-4 py-2 menu category-menu" p_link="add_category">Category</li>
                <li class="px-4 py-2 menu all-products-menu" p_link="all_products">All Products</li>
                <li class="px-4 py-2 menu orders-menu" p_link="orders">Orders</li>
            </ul>
        </div>
    </div>

<!-- JavaScript -->
<script>
$(document).ready(function(){
    //Menu Coding//
    $(".menu").each(function(){
        $(this).click(function(){
            var p_link=$(this).attr("p_link");
            $.ajax({
                type:"POST",
                url:p_link+".php",
                beforeSend:function(){
                  $(".msg").removeClass("d-none");
                    $(".msg").html("<i class='fa-sharp fa-solid fa-loader fa-spin load-icon text-dark fs-2'></i>");
                },
                success:function(response)
                {$(".msg").addClass("d-none");
                $(".left").html(response);
                }

            });
        });
    });
});
</script>
</body
</html>