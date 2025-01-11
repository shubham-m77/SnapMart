<?php
require "php/db.php";
require "php/navbar.php"; 
// Start session to track the cart
session_start();

// Retrieve product details
$prd_id = $_GET['id'];
$query = $db->query("SELECT * FROM products WHERE id='$prd_id'");
$products = $query->fetch_assoc();

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
    .real-price{text-decoration: line-through;}
    .container{font-family: montserrat;}
    .buy-btn,.fake-buy-btn{background-color:rgb(255, 170, 0);font-weight: 500;float:left;width:30%;margin-left:10px;}
    .add-cart-btn,.fake-add-cart-btn{background-color:rgb(255, 196, 2);font-weight: 500;float:left;margin-left:10px;width:30%;}
    .buy-btn:hover,.fake-buy-btn:hover{background-color:rgb(255, 196, 2);transition: ease-in 0.2s;}
    .add-cart-btn:hover,.fake-add-cart-btn:hover{background-color:rgb(251, 230, 2);transition: ease-in 0.2s;}
    @media (max-width:800px)
    {.add-cart-btn,.fake-add-cart-btn{width:100%;margin-left:0;margin-top:8px;}
    .buy-btn,.fake-buy-btn{width:100%;margin:0;}
    }
    #cart-message {
    display: none;
    position: fixed;
    top: 50%; /* Top of the screen with some margin */
    left: 50%;
    transform: translateX(-50%); /* Horizontally center it */
    z-index: 1000;
    width: 80%;
    max-width: 350px;
    background-color: #28a745; /* Green background for success */
    color: white;
    padding: 15px;
    border-radius: 8px; /* Rounded corners */
    font-size: 16px;
    font-weight: 600;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    animation: slideIn 0.5s ease-out, fadeOut 3s ease-in 2.5s forwards; /* Animation */
}

#cart-message .cart-icon {
    margin-right: 10px;
    font-size: 20px; /* Icon size */
}

@keyframes slideIn {
    from {
        transform: translateX(-50%) translateY(-100px); /* Slide from top */
        opacity: 0;
    }
    to {
        transform: translateX(-50%) translateY(0); /* Slide to center */
        opacity: 1;
    }
}

@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}


@keyframes fadeOut {
    from {
        opacity: 1;
    }
    to {
        opacity: 0;
    }
}

</style>
</head>
<body>
    <!-- Navbar -->
<?php
$prd_id=$_GET['id'];
$query=$db->query("SELECT * FROM products WHERE id='$prd_id'");
$products=$query->fetch_assoc();
?>

<div class="container">
<h2 class="text-center my-3">Product Overview</h2>
    <div class="row">
        <div class="col-md-6 ps-4">
            <img src="http://localhost/SnapMart/images/<?php echo $products['product_img'];?>" alt="product_image" class="w-75">
        </div>
        <div class="col-md-6 p-4">
            <div class="d-flex justify-content-center flex-column">
            <h3 class=""><?php echo $products['product_name'];?></h3>
            <h3 class="text-primary">&#8377; <?php echo $products['product_amount']-($products['product_amount']*5/100);?> <span class="fs-6 text-secondary real-price"><?php echo $products['product_amount']?></span> <span class="fs-5 text-success">5% OFF</span></h3>
        <?php if($products['product_quantity']==0)
        {echo "<span class='fs-5 text-danger'>Product out of Stock !!</span>";}
        else{echo "<span class='fs-5 text-success'>Available</span>";}?>
        <hr>
            <label class="fs-6">Product Feature</label>
        <?php echo $products['product_description'];?></div>
        <?php if (empty($_COOKIE["sm_auth_ui"])): ?>
                    <a href="http://localhost/SnapMart/Login">
                        <button class="btn rounded-pill btn-md fake-buy-btn">Buy Now <i class="fa-solid fa-arrow-right"></i></button>
                        <button class="btn rounded-pill btn-md fake-add-cart-btn">Add To Cart <i class="fa-solid fa-arrow-up"></i></button>
                    </a>
                <?php else: ?>
                    <a href="http://localhost/SnapMart/Buy/<?php echo $prd_id; ?>">
                        <button class="btn rounded-pill btn-md buy-btn">Buy Now <i class="fa-solid fa-arrow-right"></i></button>
                    </a>
                    <!-- Add to Cart Form -->
                    <form id="add-to-cart-form" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $products['id']; ?>">
                        <input type="hidden" name="product_name" value="<?php echo $products['product_name']; ?>">
                        <input type="hidden" name="product_price" value="<?php echo $products['product_amount']; ?>">
                        <input type="hidden" name="product_image" value="<?php echo $products['product_img']; ?>">
                        <input type="hidden" name="product_quantity" value="1">
                        <button type="submit" name="add_to_cart" class="btn rounded-pill btn-md add-cart-btn">Add To Cart <i class="fa-solid fa-arrow-up"></i></button>
                    </form>
                <?php endif; ?>
                <div id="cart-message">
    <i class="fa-solid fa-check-circle cart-icon"></i> <strong>Item added to cart!</strong>
</div>



</div>
        </div>
        
        </div>
    </div>
</div>


<?php  require "php/footer.php"; ?>
<script>
$(document).ready(function () {
    // Initially hide the success message on page load
    $('#cart-message').hide();

    // Add to Cart form submission
    $('#add-to-cart-form').submit(function (e) {
        e.preventDefault(); // Prevent the form from submitting normally

        const form = $(this);
        const formData = form.serialize(); // Get all the form data

        $.ajax({
            type: 'POST',
            url: 'http://localhost/SnapMart/php/add-cart.php', // The PHP file that will handle the request
            data: formData, // Send the form data
            success: function (response) {
                const res = JSON.parse(response);
                console.log(res);  // Log the response to see the output

                if (res.status === 'success') {
                    // Show the success message
                    $('#cart-message').fadeIn();
                    $('.cart-count').text(res.cart_count.cart_count); 
                    // Hide the success message after 3 seconds
                    setTimeout(() => {
                        $('#cart-message').fadeOut();
                    }, 3000);
                } else {
                    alert('Error: ' + res.message);
                }
            },
            error: function () {
                alert('An error occurred while adding to cart.');
            }
        });
    });
});




</script>

</body>
</html>