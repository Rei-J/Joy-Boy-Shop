<?php
error_reporting(E_ALL);
ini_set("display_errors", 0);

function customErrorHandler($errno, $errstr, $errfile, $errline){
    $message = "Error: [$errno] $errstr - $errfile:$errline";
    error_log($message . PHP_EOL, 3, "error_log.txt");
}

set_error_handler("customErrorHandler");
/* ------------------------------------------------------------------------------------------ */

require_once 'includes/dbh.php';
require_once 'includes/config_session.php'; //session_start();
require_once 'admin_includes/ad_login_view.php';


$admin_user_id = $_SESSION['admin_user_id'];

if(!isset($admin_user_id)){
   header('location:admin_login.php');
   die();
}

$total_pendings = 0;
    $stmt_pending = $pdo->query("SELECT total_price FROM `orders` WHERE payment_status = 'pending'");
    if ($stmt_pending->rowCount() > 0) {
        while ($fetch_pendings = $stmt_pending->fetch(PDO::FETCH_ASSOC)) {
            $total_price = $fetch_pendings['total_price'];
            $total_pendings += $total_price;
        }
    }

    $total_completed = 0;
    $stmt_completed = $pdo->query("SELECT total_price FROM `orders` WHERE payment_status = 'completed'");
    if ($stmt_completed->rowCount() > 0) {
        while ($fetch_completed = $stmt_completed->fetch(PDO::FETCH_ASSOC)) {
            $total_price = $fetch_completed['total_price'];
            $total_completed += $total_price;
        }
    }

    $stmt_orders = $pdo->query("SELECT * FROM `orders`");
    $number_of_orders = $stmt_orders->rowCount();

    $stmt_products = $pdo->query("SELECT * FROM `products`");
    $number_of_products = $stmt_products->rowCount();

    $stmt_users = $pdo->query("SELECT * FROM `users`");
    $number_of_users = $stmt_users->rowCount(); 

    $stmt_admins = $pdo->query("SELECT * FROM `admin_users`");
    $number_of_admins = $stmt_admins->rowCount();

    $total_users = $number_of_users + $number_of_admins;

    $stmt_messages = $pdo->query("SELECT * FROM `message`");
    $number_of_messages = $stmt_messages->rowCount();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>

    <!-- link to favicon -->
    <link rel="shortcut icon" href="img/shop_img/favicon.ico" type="image/x-icon">
    <!-- link to css -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/shop_css/ad_main.css"><!-- header -->
    <link rel="stylesheet" href="css/shop_css/ad_index.css"><!-- main -->
</head>
<body>

    <!-- header -->
    <?php include_once "admin_header.php";?>  

    <main class="dashboard">
        <h1 class="title">dashboard</h1>
        <section class="box-container">

        <div class="box">
            <h3>$<?php echo $total_pendings; ?>/-</h3>
            <p>total pendings</p>
        </div>

        <div class="box">
            <h3>$<?php echo $total_completed; ?>/-</h3>
            <p>completed payments</p>
        </div>

        <div class="box">
            <h3><?php echo $number_of_orders; ?></h3>
            <p>order placed</p>
        </div>

        <div class="box">
            <h3><?php echo $number_of_products; ?></h3>
            <p>products added</p>
        </div>

        <div class="box">
            <h3><?php echo $number_of_users; ?></h3>
            <p>normal users</p>
        </div>

        <div class="box">
            <h3><?php echo $number_of_admins; ?></h3>
            <p>admin users</p>
        </div>

        <div class="box">
            <h3><?php echo $total_users; ?></h3>
            <p>total accounts</p>
        </div>

        <div class="box">
            <h3><?php echo $number_of_messages; ?></h3>
            <p>new messages</p>
        </div>
    </section>
    </main>

    <script src="js/shop_js/admin.js"></script>
</body>
</html>