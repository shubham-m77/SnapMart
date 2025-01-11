<?php
require "php/db.php";
require "php/navbar.php";
// Get the order_id from the URL
$order_id = $_GET['order_id'];
if (isset($_COOKIE['sm_auth_ui'])) {
    $encodedEmail = $_COOKIE['sm_auth_ui'];
    $email = base64_decode($encodedEmail);  // Decode the base64-encoded email
    $stmt=$db->query("SELECT * FROM register WHERE email='$email'");
      $user=$stmt->fetch_assoc();
      $userName = $user['full_name'];  // Set the user's name to be displayed
// Fetch the order details
$query = $db->query("SELECT * FROM received_order WHERE id = '$order_id'");
$order = $query->fetch_assoc();

if (!$order) {
    echo "Order not found!";
    exit;
}}
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
    *{box-sizing: border-box;}
    body {
        font-family: 'montserrat', sans-serif;
        background-color: #f8f9fa;
        margin:0;padding:0;
        overflow-x: hidden;
    }

        .product-image img {
        max-width: 100%; /* Make sure the image doesn't exceed the column width */
        
        border-radius: 10px;
        background: white;
    }

    .product-info {
        background-color: rgba(255, 247, 178, 0.5);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        padding: 30px;
    }
    .order-date {
            font-size: 16px;
            color: #555;
            margin-top: 15px;
        }

    .product-info h3 {
        font-size: 24px;
        color: #333;
    }

    .product-info p {
        font-size: 16px;
        color: #555;
    }

    .cancel-order, .return-order {
        font-size: 16px;
        padding: 10px 20px;
        border-radius: 5px;
        font-weight: 500;
    }
    

    .cancel-order {
        background-color: #e74c3c;
        color: white;
        border: none;
    }

    .cancel-order:hover {
        background-color: #c0392b;
    }

    .return-order {
        background-color: #3498db;
        color: white;
        border: none;
    }
    .return-order:hover {
        background-color: #2980b9;
    }

    .badge {
        font-size: 14px;
        padding: 5px 10px;
    }

    .badge-success {
        background-color: #28a745;
    }

    .badge-warning {
        background-color: #f39c12;
    }
    .row::after {
        content: "";
        clear: both;
        display: table;
    }
    .shipping-address {
            margin-top: 30px;
            padding: 20px;
            background-color: rgba(240, 255, 172, 0.97);
            border-radius: 10px;
        }

        .shipping-address h5 {
            font-size: 18px;
            color: #333;
            margin-bottom: 15px;
        }

        .shipping-address p {
            font-size: 16px;
            color: #555;
        }
        .prd-image{float: right;width: 390px;margin-top: -55px;}
        .back-btn {
            position: absolute;
            top:98px;left:20px;
            background: none;
            border: none;
            font-size: 24px;
            color: #333;
            cursor: pointer;
            z-index: 1000; /* Ensure it's above other elements */
        }

        .back-btn:hover {
            color: #007bff; /* Change color on hover */
        }
        /* Responsive */
        @media (max-width:800px){
        .cancel-order, .return-order{font-size: 14px;padding: 5px 10px;}
        .product-image img{margin-left: 71px;}
        .prd-image{margin-top: -72px;}
        .back-btn {
    top: 92px;}
    }
       
</style>
</head>
<body>
<?php
// Order status and delivery status
$order_status = $order['order_status'];
// Format the order date to a more user-friendly format (e.g., MM/DD/YYYY)
$order_date = new DateTime($order['order_time']);
$formatted_order_date = $order_date->format('F j, Y');
?>
   <!-- Back Icon (Positioned at top-left) -->
   <button class="btn back-icon back-btn" onclick="window.history.back();">
    <i class="fas fa-arrow-left fs-4"></i>
</button>
<!-- Enhanced UI for Product Details -->
<h2 class="text-center my-4">Order Details</h2>
     

    <div class="row rounded shadow ">
        <!-- Left Column: Product Image -->


        <!-- Right Column: Product Info (Price, Order Status, etc.) -->
        <div class="col-12 px-4">
            <div class="product-info rounded shadow box p-4 ">
            <div class="prd-image p-5">
            <div class="product-image">
                <img src="http://localhost/SnapMart/images/<?php echo $order['prd_img']; ?>" alt="Product Image" class="img-fluid">
            </div>
        </div>
            <label class="text-secondary">Order Id: <?php echo $order['id']; ?></label>
                <h3><?php echo $order['prd_name']; ?></h3>
                <p class="text-muted">Price: ₹<?php echo $order['prd_amount']; ?></p>
                <p><strong>Payment Mode:</strong> <?php echo $order['payment_mode']; ?></p>
                <p><strong>Order Status:</strong> <span class="badge <?php echo ($order_status == 'Delivered') ? 'badge-success' : 'badge-warning'; ?>"><?php echo $order_status; ?></span></p>
            <p class="order-date"><strong>Order Date:</strong> <?php echo $formatted_order_date; ?></p>
                <!-- Cancel and Return Options -->
                <div class="mt-4 btns">
                    <!-- Cancel Order Button -->
                    <button class="btn btn-danger cancel-order" data-order-id="<?php echo $order['id']; ?>">Cancel Order</button>
                    <!-- Return Product Button (if applicable) -->
                    <?php if ($order_status == 'Delivered') { ?>
                        <button class="btn btn-primary return-order">Return Product</button>
                    <?php } ?>
                </div>
                
                <!-- Shipping Address Section -->
            <div class="shipping-address">
                <h5>Shipping Address</h5>
                <p><strong>Name:</strong> <?php echo $order['c_name']; ?></p>
                <p><strong>Mobile:</strong> <?php echo $order['c_mobile']; ?></p>
                <p><strong>Address:</strong> <?php echo $order['c_address']; ?></p>
                <p><strong>City:</strong> <?php echo $order['c_city']; ?></p>
                <p><strong>State:</strong> <?php echo $order['c_state']; ?></p>
                <p><strong>Pin Code:</strong> <?php echo $order['c_pincode']; ?></p>
                <p><strong>Delivery Instructions</strong> <?php echo $order['c_del_instructions']; ?></p>
                
            </div>
            </div>
        </div>
        
    </div>

<script>
    $(document).ready(function(){
        // Cancel order button click
        $(".cancel-order").click(function(){
            var order_id = $(this).data('order-id');

            if (confirm("Are you sure you want to cancel this order?")) {
                $.ajax({
                    type: "POST",
                    url: "cancel_order.php",
                    data: { order_id: order_id },
                    success: function(response) {
                        alert(response);
                        window.location.href = 'my_orders.php';  // Redirect to the orders list page after cancellation
                    }
                });
            }
        });

        // Return product button click (you can implement the return functionality)
        $(".return-order").click(function(){
            alert("Product return functionality can be implemented here.");
            // Add your return functionality here
        });
    });
</script>
   
</body>
</html>


