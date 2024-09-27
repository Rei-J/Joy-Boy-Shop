<?php
declare(strict_types=1);
/*
*check for errors*
function checkErrors() {
    if (isset($_SESSION['errors_cart'])) {
        $errors = $_SESSION['errors_cart'];
        echo '<script>';
        foreach ($errors as $error) {
            echo 'alert("' . $error . '");';
        }
        echo '</script>';
        unset($_SESSION['errors_cart']);
    } else if (isset($_GET['order']) && $_GET['order'] === "success") {
        echo '<script>alert("order success!");</script>';
    }
}*/
function displayCart() {
    require_once 'dbh.php';
    $grand_total = 0;
    $user_id = $_SESSION['user_id'];
    
    $select_products = $pdo->prepare("SELECT * FROM `cart` WHERE user_id = :user_id");
    $select_products->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $select_products->execute();

    if ($select_products->rowCount() > 0) {
        while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            $sub_total = ($fetch_products['price'] * $fetch_products['quantity']);
            $grand_total += $sub_total;
            echo '<div class="fetch_products"><p>' . $fetch_products['name'] . '<span> [' . '$' . $fetch_products['price'] . '/' . ' x=' . $fetch_products['quantity'] . ']</span></p></div>';
        }
    } else {
        echo '<p class="empty">Your cart is empty</p>';
    }

    echo '<div class="grand-total"><p>Grand total : <span>$' . $grand_total . '/-</span></p></div>';
}


