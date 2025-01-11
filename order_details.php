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
    .search-input{padding-right: 30px;margin-top: 15px;}
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
    .form-control {
            margin-bottom: 15px;
        }
        .form-select {
            margin-bottom: 15px;
        }
        .address-row {
            display: flex;
            justify-content: space-between;
        }
        .address-row .col {
            flex: 1;
            margin-right: 10px;
        }
        .address-row .col:last-child {
            margin-right: 0;
        }
    .real-price{text-decoration: line-through;}
    .container{font-family: montserrat;}
    .buy-btn,.fake-buy-btn{background-color:rgb(255, 170, 0);font-weight: 500;float:left;width:30%;margin-left:10px;}
    .add-cart-btn,.fake-add-cart-btn{background-color:rgb(255, 196, 2);font-weight: 500;float:left;margin-left:10px;width:30%;}
    .buy-btn:hover,.fake-buy-btn:hover{background-color:rgb(255, 196, 2);transition: ease-in 0.2s;}
    .add-cart-btn:hover,.fake-add-cart-btn:hover{background-color:rgb(251, 230, 2);transition: ease-in 0.2s;}
/* Style for the success box */
#successBox {

            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #28a745; /* Green background for success */
            color: white;
            width: 400px;
            height: 100px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 0;
            box-shadow: 0 4px 8px rgba(204, 204, 204, 0.3);
            z-index: 9999;
            transition: opacity 0.5s ease-in-out;
            font-size:20px;
            font-family: montserrat;
            padding:0 10px;
        float:left;}
        #successBox p {
            padding-left:40px;
    margin: 0; /* Remove default margin to make sure it’s centered */
    display: flex;
    align-items: center;
    justify-content: center; /* Ensure text is centered inside the box */
    text-align: center; /* Center the text */
}

        .checkmark {
    opacity: 0; /* Initially hidden */
    font-size: 30px; /* Checkmark size */
    position: absolute;
    left: 20px; /* Align to the left side of the success box */
    display: flex;
    justify-content: center;
    align-items: center;
    width: 50px; /* Round box size */
    height: 50px;
    border-radius: 50%;
    background-color: #fff;
    color: #28a745;
    border: 3px solid #28a745;
    transform: scale(0); /* Initially scaled down */
    animation: checkmarkAnim 1s ease forwards;
float:left;}
@keyframes checkmarkAnim {
    0% {
        opacity: 0;
        transform: scale(0);
    }
    50% {
        opacity: 0.5;
        transform: scale(1.2);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

        /* Keyframes for the round box animation (scale up) */
        @keyframes scaleUp {
            0% {
                opacity: 0;
                transform: translate(-50%, -50%) scale(0);
            }
            100% {
                opacity: 1;
                transform: translate(-50%, -50%) scale(1);
            }
        }


        /* Apply scaleUp animation to the round box */
        .showBox {
            animation: scaleUp 0.5s ease forwards;
        }
/* Style for the Payment ID Response Box */
#paymentResponseBox {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #17a2b8; /* Blue background for response */
    color: white;
    width: 400px;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(204, 204, 204, 0.3);
    z-index: 9999;
    opacity: 0;
    transition: opacity 0.5s ease-in-out;
    font-size: 18px;
    font-family: montserrat;
}

#paymentResponseBox h5 {
    font-size: 22px;
}

#paymentResponseBox p {
    font-size: 18px;
}
/* Loading Spinner Styles */
.loadingSpinner {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 9999;
    display: none;
}





    @media (max-width:800px)
    {.add-cart-btn,.fake-add-cart-btn{width:100%;margin-left:0;margin-top:8px;}
    .buy-btn,.fake-buy-btn{width:100%;margin:0;}
    #paymentResponseBox {
        width: 90%; /* Even smaller width on very small screens */
        max-width: 250px; /* Further restrict max-width */
        padding: 10px; /* Smaller padding */
    }

    #paymentResponseBox h5 {
        font-size: 18px;
    }

    #paymentResponseBox p {
        font-size: 14px;
    }
    #successBox {
        width: 80%; /* Make the width smaller on mobile */
        max-width: 250px; /* Limit max width further on mobile */
        padding: 15px; /* Reduce padding */
        height: auto; /* Adjust height dynamically */
    }

    #successBox p {
        font-size: 16px; /* Reduce font size */
        padding-left: 20px; /* Adjust padding */
    }

    .checkmark {
        width: 40px; /* Smaller checkmark */
        height: 40px; /* Smaller checkmark */
        font-size: 24px; /* Smaller checkmark icon */
    }

    }
</style>
</head>
<body>
    <!-- Navbar -->
<?php
$prd_id=$_GET['p_id'];
$query=$db->query("SELECT * FROM products WHERE id='$prd_id'");
$products=$query->fetch_assoc();

$user=base64_decode($_COOKIE['sm_auth_ui']);
$query_2=$db->query("SELECT * FROM register WHERE email='$user'");
$user_dtl=$query_2->fetch_assoc();
$username=$user_dtl['full_name'];
$email_id=$user_dtl['email'];
$mob_no=$user_dtl['mobile_no'];

?>

<div class="container">
<h2 class="text-center my-3">Order Details</h2>
    <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6 rounded border">
            <div class="d-flex p-3 ps-2">
            <div class=""><img src="http://localhost/SnapMart/images/<?php echo $products['product_img'] ?>" alt="product_img" width="100px"></div>
            <div class="mt-4 mx-3">
                <h5 class="fs-5"><?php echo $products['product_name']?></h5>
                <h5 class="fs-5">&#8377; <?php echo $products['product_amount']-($products['product_amount']*5/100);?> <span class="fs-6 text-secondary real-price"><?php echo $products['product_amount']?></span> <span class="fs-5 text-success">5% OFF</span></h5>
            </div>
        </div>
 
    <!-- shipping form -->
    <form class="ship-form" >
    <label for="qty">Product Quantity:</label>
                    <select name="qty" id="qty" class="form-select">
                        <?php
                        // Example: Set a quantity range from 1 to 10
                        for ($i = 1; $i <= 10; $i++) {
                            echo "<option value='$i'>$i</option>";
                        }
                        ?>
                    </select>
                    <hr>
                    <h4>Shipping Address </h4>
    <!-- Address Fields -->
                <label for="cust_name">Customer Name:</label>
                <input type="text" name="cust_name" id="cust_name" class="form-control" value="<?php echo $username; ?>" required>

                <label for="address">Address:</label>
                <textarea type="address" name="address_line_1" id="address_line_1" class="form-control" required></textarea>

                <label for="city">City:</label>
                <input type="text" name="city" id="city" class="form-control" required>

                <div class="address-row">
                    <div class="col">
                        <label for="state">State:</label>
                        <input type="text" name="state" id="state" class="form-control" required>
                    </div>
                    <div class="col">
                        <label for="pin-code">Pin Code:</label>
                        <input type="number" name="pin-code" id="pin-code" class="form-control" required>
                    </div>
                </div>

                <label for="phone">Phone Number (for delivery confirmation):</label>
                <input type="text" name="phone" id="phone" class="form-control" value="<?php echo $mob_no; ?>" required>

                <input type="hidden" name="prd_id" value="<?php echo $prd_id; ?>">

                <label for="delivery_instructions">Delivery Instructions (Optional):</label>
                <textarea name="delivery_instructions" id="delivery_instructions" class="form-control"></textarea>
                <hr>

<!-- Payment Mode Selection (Radio Buttons) -->
                <h4>Select Payment Mode</h4>
            <div class="form-check">
                    <input type="radio" class="form-check-input" id="payment_cod" name="payment_mode" value="COD" checked>
                     <label class="form-check-label" for="payment_cod">Cash on Delivery (COD)</label>
                    </div>
                    <div class="form-check">
                    <input type="radio" class="form-check-input" id="payment_online" name="payment_mode" value="Online">
                    <label class="form-check-label" for="payment_online">Online Payment (e.g., Paytm, UPI, Debit/Credit Card)</label>
                    </div>
                <hr>

                <button type="submit" class="btn btn-success w-100">Place Order</button>

    </form>
    </div>
        <div class="col-md-3"></div>
        </div>
    </div>
</div>
<!-- Success Notification (Initially Hidden) -->
<div id="successBox" class="successBox">
<i class="fa-solid fa-check checkmark"> </i> <p>Order Placed Successfully!</p>
    </div>


<!-- Payment ID Response Box (Initially Hidden) -->
<div id="paymentResponseBox" class="paymentResponseBox">
    <h5>Payment Successful!</h5>
    <p>Your Payment ID: <span id="paymentId"></span></p>
</div>
<!-- Loading Spinner (Initially Hidden) -->
<div id="loadingSpinner" class="loadingSpinner" style="display: none;">
    <div class="spinner-border text-primary" role="status">
        <span class="visually-hidden"><i class="fa-solid fa-circle-notch fa-spin"></i></span>
    </div>
</div>
<script>
    $(document).ready(function(){
        $(".ship-form").submit(function(event){
            event.preventDefault();
            var pay_mode=$("input[name='payment_mode']:checked").val();
            if(pay_mode=="COD"){
            $.ajax({
                type:"POST",
                url:"http://localhost/SnapMart/php/order_receive.php",
                data:new FormData(this),
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $("#loadingSpinner").show();
                },
                success:function(response){
                    $("#loadingSpinner").hide();
                if(response.trim()=="Order Success")
               {
 // Show success notification
 $("#successBox").addClass("showBox").fadeIn();
 setTimeout(function(){
                        $(".checkmark").css("opacity", 1); // Show checkmark after a slight delay
                    }, 100);
// Hide the success box after 3 seconds
setTimeout(function() {
    $("#successBox").fadeOut(); // Fade out the notification after 3 seconds
    window.location.href = 'http://localhost/SnapMart/my_orders.php'; // Redirect to order confirmation page
}, 3000);
}

                    else{
                    alert(response);
                }
                }
                
            });}
            else if(pay_mode=="Online")
            {$.ajax({
                type:"POST",
                url:"http://localhost/SnapMart/php/online_pay.php",
                data:new FormData(this),
                processData: false,
                contentType: false,
                beforeSend:function(){
                    $("#loadingSpinner").show();
                },

                success:function(response){
                    $("#loadingSpinner").hide();
                    var result = JSON.parse(response);
                    if (result.error) {
            alert(result.error); // Display error message
            return;
        }
                    var options = {
                        "key": result.key_id, // Your Razorpay key
                        "amount": result.amount, // Amount in paise
                        "currency": "INR",
                        "order_id": result.order_id, // The order ID returned from Razorpay
                        "name": "SnapMart",
                        "description": "Payment for " + <?php echo json_encode($products['product_name']); ?>,
                        "image": "http://localhost/SnapMart/images/snap_logo.png", // Optional logo
                        "handler": function(response) {
                                // After successful payment, show success message and redirect
                                // Show the success notification with animation
                                 
                                    // Display payment response box with payment ID
                                    $("#paymentResponseBox").fadeIn().css("opacity", 1);
                                    $("#paymentId").text(response.razorpay_payment_id);  // Set the payment ID in the response box
                                // Hide the success box and show payment response box with payment ID
                                setTimeout(function() {
                                    $("#paymentResponseBox").fadeOut();  // Hide success box
                                    var ship_form = $(".ship-form");
        var formData = new FormData(ship_form[0]);
        formData.append("payment_id", response.razorpay_payment_id);  // Add Razorpay payment ID to the form data
        formData.append("payment_status", "Success");
                                    $.ajax({
                type:"POST",
                url:"http://localhost/SnapMart/php/order_receive.php",
                //  data: //{
                // //     prd_id:result.prd_id,
                // //     qty:result.prd_qty,
                // //     payment_mode:"Online",
                // //     payment_id:response.razorpay_payment_id
                // // },
                data:formData,
                processData: false,
                contentType: false,
                success:function(res){
            if (res.trim() != "Order Failed !!") {
                                    $("#successBox").addClass("showBox").fadeIn();
                                    setTimeout(function() {
                                        $(".checkmark").css("opacity", 1); // Show checkmark after a slight delay
                                    }, 100);
                                    setTimeout(function() {
                                        $("#successBox").fadeOut(); // Fade out the notification after 3 seconds
                                        window.location.href="http://localhost/SnapMart/my_orders.php";
                                    }, 3000);
                                } else {
                                    alert(res);
                                }
                            }
                        });
                    }, 1000);
                },
                    };

                    var rzp1 = new Razorpay(options);
                    rzp1.open();
                
                }
                
            });}
        });
    });
</script>
<?php  require "php/footer.php"; ?>
</body>
</html>