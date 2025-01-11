<?php


// Redirect if cart is empty
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header('Location: cart.php');
    exit;
}

// Handle order placement
if (isset($_POST['place_order'])) {
    $_SESSION['cart'] = array(); // Clear cart
    $successMessage = "Your order has been placed successfully!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout - SnapMart</title>
    <script src="http://localhost/SnapMart/js/jquery.min.js"></script>
    <script src="http://localhost/SnapMart/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="http://localhost/SnapMart/css/bootstrap.min.css">
</head>
<body>
    <!-- Navbar -->
    <?php 
    if (file_exists("php/navbar.php")) {
        require("php/navbar.php");
    } else {
        echo "<p>Navbar file missing.</p>";
    }
    ?>

    <div class="container my-5">
        <h2 class="text-center">Checkout</h2>

        <!-- Success Message -->
        <?php if (isset($successMessage)) { ?>
            <div class="alert alert-success"><?php echo htmlspecialchars($successMessage); ?></div>
        <?php } ?>

        <!-- Cart Summary -->
        <h4>Order Summary</h4>
        <table class="table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $totalPrice = 0;
                if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $item) {
                        $itemTotal = $item['price'] * $item['quantity'];
                        $totalPrice += $itemTotal;
                ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>₹<?php echo number_format($item['price'], 2); ?></td>
                    <td><?php echo $item['quantity']; ?></td>
                    <td>₹<?php echo number_format($itemTotal, 2); ?></td>
                </tr>
                <?php 
                    } 
                } else {
                    echo "<tr><td colspan='4'>Your cart is empty!</td></tr>";
                }
                ?>
            </tbody>
        </table>

        <div class="d-flex justify-content-between">
            <div class="total-price">
                Total: ₹<?php echo number_format($totalPrice, 2); ?>
            </div>
        </div>

        <!-- Order Button -->
        <form method="POST">
            <button type="submit" name="place_order" class="btn btn-success mt-3">Place Order</button>
        </form>
    </div>
</body>
</html>
