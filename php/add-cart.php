<?php
session_start();
require 'db.php';

if (isset($_POST['product_id']) && isset($_POST['product_quantity'])) {
    $product_id = $_POST['product_id'];
    $product_quantity = $_POST['product_quantity'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_image = $_POST['product_image'];

    // Check if the cart exists in the session, if not, create an empty cart
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    // Check if the product already exists in the cart
    $found = false;
    foreach ($_SESSION['cart'] as &$item) {
        if ($item['id'] == $product_id) {
            $item['quantity'] += $product_quantity; // Increment the quantity
            $found = true;
            break;
        }
    }

    // If the product is not in the cart, add it
    if (!$found) {
        $_SESSION['cart'][] = array(
            'id' => $product_id,
            'name' => $product_name,
            'price' => $product_price,
            'quantity' => $product_quantity,
            'image' => $product_image
        );
    }

     // Recalculate the total cart count
    $cart_count = 0;
    foreach ($_SESSION['cart'] as $item) {
        $cart_count += $item['quantity'];
    }
    $response['cart_count'] = $cart_count;
    $response['cart_items'] = $_SESSION['cart'];


    // Return a success response
    echo json_encode(['status' => 'success', 'message' => 'Item added to cart!', 'cart_count'=>$response]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Failed to add item to cart.']);
}
?>
