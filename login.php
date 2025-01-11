<?php
require "php/db.php";
require "php/navbar.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register / Login</title>
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
    a{text-decoration: none;border: none;}
    .row{font-family: poppins;}
    .card{background: rgb(180,212,255);border:none;
        background: linear-gradient(266deg, rgba(180,212,255,1) 0%, rgba(222,233,255,1) 100%);}
        #response-box {
          background-color: rgba(0, 0, 0, 0.4);
    width: 100%;
    max-width: 500px;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    padding: 15px;
    box-shadow: 0px 4px 20px rgba(0, 0, 0, 0.2);
    border-radius: 8px;
}
#response-message {
  padding: 10px;
  font-size: 16px;
  text-align: center;
font-family:montserrat;}
#email{padding-right:50px;position: relative;}
.spin-icon {
    position: absolute;
    top: 44%;
    right: 30px; /* Adjust right position as necessary */
    transform: translateY(-50%); /* Center the spinner vertically */
    font-size: 20px; /* Adjust size */
    color: #007bff; /* Change the color of the spinner to match your theme */
}
.checker {
    position: absolute;
    top: 46.75%;
    right: 30px; /* Adjust right position as necessary */
    transform: translateY(-50%); /* Center the spinner vertically */
    font-size: 20px; /* Adjust size */
    color: #007bff; /* Change the color of the spinner to match your theme */
}

/* Mobile Responsive */
@media (max-width:800px)
{.spin-icon{top:42.5%;}
.checker{top:45.5%;}
}
</style>
</head>
<body>
        <!-- Response Box for AJAX Feedback -->

<div class="row">
  
    <div class="col-md-4"></div>
    <div class="col-md-4 mt-3">
    <!-- Register form -->
    <div class="card rounded p-3 shadow">
        <h2 class="text-center">Sign-In with us</h2>
        <hr>
        <form class="login-form">
                <label for="email" class="mt-3">Enter Your Email Id</label>
                <input type="email" class="form-control mt-1" id="email" name="email" placeholder="xyz@gmail.com"><i class='fa-regular fa-loader fa-spin spin-icon d-none'></i>
                <span class="checker"></span>
                <label for="password" class="mt-3">Enter Password</label>
                <input type="password" class="form-control mt-1" id="pass" name="password" placeholder="Ramesh@567">
                <div class="text-center"><button class="btn btn-primary w-50 mt-2 rounded-pill login_btn">Login now <i class="fa-solid fa-arrow-right"></i></button></div>
        </form>
        </div>
    
        <!-- Verify form -->
        <div class="card rounded p-4 shadow d-none">
        <h2 class="text-center">Verify User</h2>
        <hr>
        <form class="verify-form">
          <label for="otp"></label>
            <input type="number" class="form-control mt-1" name="otp" id="otp">
                <div class="text-center"><button class="btn btn-primary w-50 mt-2 rounded-pill verify-btn"> <i class="fa-solid fa-arrow-right"></i></button></div>
        </form>
        </div>
    </div>
    <div class="col-md-4"></div>
</div> 
<div id="response-box" class="container mt-3 d-none">
<div class="alert" role="alert" id="response-message"></div>
<!-- javascript -->
<script>
$(document).ready(function(){
// Login Form
$(".login-form").submit(function(event){
event.preventDefault();
var email = $("#email").val().trim();
    var password = $("#pass").val().trim();

    // Basic validation to check if fields are empty
    if (email === "" || password === "") {
        $("#response-box").removeClass("d-none");
        $("#response-message").removeClass().addClass('alert alert-danger').text("Please fill in both email and password!");
        setTimeout(function(){
          $("#response-box").addClass("d-none");
        },1500);
        return;  // Stop the form submission
    }
$.ajax({
  type:"POST",
  url:"http://localhost/SnapMart/php/login_user.php",
  data:new FormData(this),
  contentType:false,
  processData:false,
  beforeSend:function(){
    $(".login_btn").attr("disabled");
    $(".login_btn").html("Please Wait... <i class='fa-regular fa-loader fa-spin'></i>");
  },
  success:function(response){$(".login_btn").removeAttr("disabled");
 $(".login_btn").html("Login now <i class='fa-solid fa-arrow-right'></i>");
// Show the response box and message based on the response
 if(response.trim() != "User found") {
  $("#response-box").removeClass("d-none");
  $("#response-message").removeClass().addClass('alert alert-danger').text(response);
 } else {
  $("#response-box").removeClass("d-none");
$("#response-message").removeClass().addClass('alert alert-success').text("Login Success");
}
// Hide the response box after 2.5 seconds
   setTimeout(function(){
 $("#response-box").addClass("d-none");
 if(response.trim() == "User found"){
  location.href="http://localhost/SnapMart/";
 }
 else{$(this).trigger("reset");}
}, 2500);
 }
});
});
// Email loader
$("#email").on('input',function(){
  $(".spin-icon").removeClass("d-none");
  $(".checker").html("");
});
$("#email").on('change',function(){
    $(".spin-icon").addClass("d-none");
    $.ajax({
      type:"POST",
      url:"http://localhost/SnapMart/php/email_checker.php",
      data:{email:$(this).val()},
      success:function(res){
        if(res.trim()=="User found")
      {
        $(".checker").html("<i class='fa-solid fa-user-check text-success'></i>");
        $(".login_btn").attr("disabled",false);
      }
      else{
        $(".checker").html("<i class='fa-solid fa-user-xmark text-danger'></i>");
        $(".login_btn").attr("disabled",true);
      }
      }
    });
  });
});




</script>   
</body>
</html>
