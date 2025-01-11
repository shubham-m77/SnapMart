<?php
session_start();

// Check if the cart is set and the index is provided
if (isset($_POST['index']) && isset($_SESSION['cart'])) {
    $index = $_POST['index'];

    // Remove the item from the cart
    if (isset($_SESSION['cart'][$index])) {
        unset($_SESSION['cart'][$index]);
    }

    // Send a success response
    echo 'success';
} else {
    echo 'error';
}
?>
