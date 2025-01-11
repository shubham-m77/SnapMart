<?php
session_start();

// Check if the cart is set
if (isset($_POST['index']) && isset($_POST['quantity']) && isset($_SESSION['cart'])) {
    $index = $_POST['index'];
    $quantity = $_POST['quantity'];

    // Update the quantity in the session
    if (isset($_SESSION['cart'][$index])) {
        if ($quantity > 0) {
            $_SESSION['cart'][$index]['quantity'] = $quantity;
        } else {
            // If quantity is 0, we can either delete the item or set its quantity to 0
            unset($_SESSION['cart'][$index]);
        }
    }
$cart_count = array_sum(array_column($_SESSION['cart'], 'quantity'));
    // Send a success response
    echo json_encode([
        'status' => 'success',
        'cart_count' => $cart_count,
        'cart_items' => $_SESSION['cart']
    ]);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid request.']);
}
?>
