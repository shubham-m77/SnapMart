<?php

require "php/db.php";
require "php/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SnapMart - Cart</title>
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
    body{margin:0;padding: 0;overflow-x: hidden;}
    .navbar{font-family: poppins;box-shadow:0 0px 15px #ccc;}
    .search-form{width:49%;}
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
    body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }
        .cart {
            min-height: 100vh;
            padding: 40px 0;
        }
        .cart-item {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 15px;
        }
        .cart-item img {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .cart-item .item-details {
            margin-left: 20px;
        }
        .cart-item .item-details h5 {
            font-weight: 600;
            font-size: 1.2rem;
            margin-bottom: 10px;
        }
        .cart-item .item-details p {
            font-size: 0.9rem;
            margin: 0;
        }
        .quantity-control {
            display: flex;
            align-items: center;
            gap: 10px;
        }
        .quantity-control button {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
        .quantity-control input {
            width: 50px;
            text-align: center;
            font-size: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .total-price {
            font-size: 1.5rem;
            font-weight: 600;
            margin-top: 20px;
        }
        .btn-checkout {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            border: none;
            font-weight: 500;
            cursor: pointer;
        }
        .btn-checkout:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container cart">
    <h2 class="text-center mb-4">Your Cart <i class="fa-solid fa-cart-shopping"></i></h2>
    <hr>
    <div class="row">
        <?php
        // Check if the cart is empty
        if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
            echo "<h2 class='text-center my-5 text-danger'>Your cart is empty!</h2>";
        } else {
            $total_price = 0;
            foreach ($_SESSION['cart'] as $index => $item) {
                $total_price += $item['price'] * $item['quantity'];
                echo "
                    <div class='col-md-12 cart-item'>
                        <div class='d-flex align-items-center'>
                            <img src='http://localhost/SnapMart/images/{$item['image']}' alt='product_image'>
                            <div class='item-details'>
                                <h5>{$item['name']}</h5>
                                <p class='item-price' data-price='{$item['price']}'>Price: &#8377; {$item['price']}</p>


                                <div class='quantity-control'>
                                    <button class='decrease-btn' data-index='{$index}'>-</button>
                                    <input type='text' value='{$item['quantity']}' readonly>
                                    <button class='increase-btn' data-index='{$index}'>+</button>
                                </div>
                                <p><strong>Total: &#8377; <span class='item-total'>" . ($item['price'] * $item['quantity']) . "</span></strong></p>
                            </div>
                        </div>
                    </div>
                ";
            }
        }
        ?>
    </div>
    <?php if (!empty($_SESSION['cart'])): ?>
    <!-- Total price and checkout button -->

    <div class="text-center">
        <h3 class="total-price">Total Price: &#8377; <?php echo $total_price; ?></h3>
        <a href="http://localhost/SnapMart/Checkout/<?php echo urlencode('id-' . $item['id']); ?>/<?php echo urlencode('amount-' . $total_price); ?>/<?php echo urlencode('qty-' . $item['quantity']); ?>" class="btn btn-checkout mt-3">Proceed to Checkout</a>
        <?php endif; ?>
    </div>
</div>


<?php require "php/footer.php"; ?>

<script>
// Handle quantity increase
$('.increase-btn').click(function() {
    const index = $(this).data('index');
    updateQuantity(index, 1);
});

// Handle quantity decrease
$('.decrease-btn').click(function() {
    const index = $(this).data('index');
    updateQuantity(index, -1);
});

function updateQuantity(index, change) {
    const quantityInput = $(`[data-index="${index}"]`).closest('.cart-item').find('input');
    let quantity = parseInt(quantityInput.val()) + change;

    // Ensure quantity doesn't go below 1 or delete the item if quantity goes to 0
    if (quantity < 1) {
        quantity = 0;
    }

    // Update the quantity in the input field
    quantityInput.val(quantity);

    // Get the price for the item directly from the data-price attribute
    const price = parseFloat($(`[data-index="${index}"]`).closest('.cart-item').find('.item-price').data('price'));

    // Calculate the total price for this item
    let total = price * quantity;

    // Update the total price for the item
    $(`[data-index="${index}"]`).closest('.cart-item').find('.item-total').text(total);

    // Update the total price for the entire cart
    updateTotalCartPrice();

    // If quantity is 0, delete the item from the cart
    if (quantity === 0) {
        removeItemFromCart(index);
    } else {
        // Otherwise, update the session with the new quantity
        $.ajax({
            url: 'http://localhost/SnapMart/php/update_cart.php',
            type: 'POST',
            data: { index: index, quantity: quantity },
            success: function(response) {
                const res = JSON.parse(response);
                if (res.status === 'success') {
                    $('.cart-count').text(res.cart_count); // Update cart count in the navbar
                checkCartStatus(); // Check cart status after updating quantity
            }}
        });
    }
}

function removeItemFromCart(index) {
    // Send an AJAX request to remove the item from the session
    $.ajax({
        url: 'http://localhost/SnapMart/php/remove_from_cart.php',
        type: 'POST',
        data: { index: index },
        success: function(response) {
            // If the item is removed, hide it from the cart display
            $(`[data-index="${index}"]`).closest('.cart-item').remove();
            updateTotalCartPrice();
            checkCartStatus(); // Check cart status after removing item
        }
    });
}

function updateTotalCartPrice() {
    let totalPrice = 0;
    $('.item-total').each(function() {
        totalPrice += parseFloat($(this).text());
    });
    $('.total-price').html('Total Price: &#8377; ' + totalPrice);
}

// Function to check the cart status and hide checkout button if necessary
function checkCartStatus() {
    let cartEmpty = true;
    
    // Check if any item has a quantity greater than 0
    $('.quantity-control input').each(function() {
        if ($(this).val() > 0) {
            cartEmpty = false;
        }
    });

    // If cart is empty, hide the checkout button
    if (cartEmpty) {
        $('.btn-checkout').hide();
    } else {
        $('.btn-checkout').show();
    }
}

// Check cart status on page load
$(document).ready(function() {
    checkCartStatus();
});

</script>
</body>
</html>