<?php
declare(strict_types=1);

function place_order($pdo, $user_id, $name, $number, $email, $method, $address) {
    // Cart Retrieval
    $cart_total = 0;
    $cart_products = array();

    $cart_query = $pdo->prepare("SELECT * FROM `cart` WHERE user_id = :user_id");
    $cart_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
    $cart_query->execute();

    if ($cart_query->rowCount() > 0) {
        while ($cart_item = $cart_query->fetch(PDO::FETCH_ASSOC)) {
            $cart_products[] = $cart_item['name'] . ' (' . $cart_item['quantity'] . ') ';
            $sub_total = ($cart_item['price'] * $cart_item['quantity']);
            $cart_total += $sub_total;
        }
    }

    $total_products = implode(', ', $cart_products);

    // Order Check
    $order_query = $pdo->prepare("SELECT * FROM `orders` WHERE name = :name AND number = :number AND email = :email AND method = :method AND address = :address AND total_products = :total_products AND total_price = :cart_total");
    $order_query->bindParam(':name', $name, PDO::PARAM_STR);
    $order_query->bindParam(':number', $number, PDO::PARAM_STR);
    $order_query->bindParam(':email', $email, PDO::PARAM_STR);
    $order_query->bindParam(':method', $method, PDO::PARAM_STR);
    $order_query->bindParam(':address', $address, PDO::PARAM_STR);
    $order_query->bindParam(':total_products', $total_products, PDO::PARAM_STR);
    $order_query->bindParam(':cart_total', $cart_total, PDO::PARAM_INT);
    $order_query->execute();

    // Order Placement
    if ($cart_total == 0) {
        echo '<div class="message" id="message"><p>Your cart is empty!</p></div>';
        return false;
    } else {
        if ($order_query->rowCount() > 0) {
            echo '<div class="message" id="message"><p>Order already placed!</p></div>';
            return false;
        } else {
            $insert_query = $pdo->prepare("INSERT INTO `orders` (user_id, name, number, email, method, address, total_products, total_price, placed_on) VALUES (:user_id, :name, :number, :email, :method, :address, :total_products, :cart_total, NOW())");
            $insert_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $insert_query->bindParam(':name', $name, PDO::PARAM_STR);
            $insert_query->bindParam(':number', $number, PDO::PARAM_STR);
            $insert_query->bindParam(':email', $email, PDO::PARAM_STR);
            $insert_query->bindParam(':method', $method, PDO::PARAM_STR);
            $insert_query->bindParam(':address', $address, PDO::PARAM_STR);
            $insert_query->bindParam(':total_products', $total_products, PDO::PARAM_STR);
            $insert_query->bindParam(':cart_total', $cart_total, PDO::PARAM_INT);
            $insert_query->execute();

            // Delete items from the cart after placing the order
            $delete_cart_query = $pdo->prepare("DELETE FROM `cart` WHERE user_id = :user_id");
            $delete_cart_query->bindParam(':user_id', $user_id, PDO::PARAM_INT);
            $delete_cart_query->execute();

            echo '<div class="message" id="message"><p>Order placed successfully!</p></div>';
            return true;
        }
    }
}

function getName(object $pdo, string $name){
    $query = "SELECT name FROM users WHERE name = :name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function getEmail(object $pdo, string $email){
    $query = "SELECT name FROM users WHERE  email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}