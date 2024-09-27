<?php
require_once 'includes/dbh.php';
require_once 'includes/config_session.php';
require_once 'includes/login_view.php';

$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile</title>

    <!-- link to favicon -->
    <link rel="shortcut icon" href="img/shop_img/favicon.ico" type="image/x-icon">
    <!-- link to css -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/shop_css/profile_header.css">
    <link rel="stylesheet" href="css/shop_css/cart.css">
    <link rel="stylesheet" href="css/shop_css/main_shop.css">

</head>

<body>

    <!-- header -->
    <?php include_once "header.php"; ?>

    <main>
        <h1>placed orders</h1>
        <section class="placed-orders">
            <?php
            // echo "Session User ID: " . $_SESSION['user_id'] . "<br>";
            try {
                $stmt = $pdo->prepare("SELECT * FROM orders WHERE user_id = :user_id");
                $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
                $stmt->execute();
                $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
                //echo "User ID: " . $user_id . "<br>"; // Debugging line
                //echo "Number of orders: " . count($orders) . "<br>"; // Debugging line

            if (!empty($orders)) {
                foreach ($orders as $fetch_orders) {
            ?>
                    <div class="prod_box">
                        <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span></p>
                        <p> name : <span><?php echo $fetch_orders['name']; ?></span></p>
                        <p> number : <span><?php echo $fetch_orders['number']; ?></span></p>
                        <p> email : <span><?php echo $fetch_orders['email']; ?></span></p>
                        <p> address : <span>flat no.<?php echo $fetch_orders['address']; ?></span></p>
                        <p> payment method : <span><?php echo $fetch_orders['method']; ?></span></p>
                        <p> your orders : <span><?php echo $fetch_orders['total_products']; ?></span></p>
                        <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span></p>
                        <p> payment status : <span style="color:<?php echo ($fetch_orders['payment_status'] == 'pending') ? 'red' : 'green'; ?>;"><?php echo $fetch_orders['payment_status']; ?></span></p>
                    </div>
            <?php
                }
            } else {
                echo '<p class="empty">Your cart is empty</p>';
            }

        } catch (PDOException $e) {
            echo "Error executing query: " . $e->getMessage();
        }
            ?>
        </section>
    </main>
    <!-- footer -->
    <?php include_once "footer.php"; ?>

    <!-- part of the profile_header.php -->
    <script src="js/shop_js/profile.js"></script>
    <!-- -->
</body>
</html>
