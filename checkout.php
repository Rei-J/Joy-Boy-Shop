<?php 
    require_once 'includes/config_session.php'; //session_start();
    require_once 'includes/login_view.php';//for the header
    require_once 'includes/checkout_view.php';

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
    header('location:login.php');
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
    <link rel="stylesheet" href="css/shop_css/cart.css"><!-- main -->
    <link rel="stylesheet" href="css/shop_css/main_shop.css"><!-- footer -->

    <script src="js/shop_js/quick.js"></script>
</head>
<body>

<!-- header -->
<?php include_once "header.php";?>

<!-- main -->
    <main>
        <section class="checkout_main">
            <h1>Place your order!</h1>
            <?php //checkErrors(); ?> <!-- check the errors -->
            <section class="cart_checkout"><?php displayCart(); ?></section>
            <form action="includes/checkout.inc.php" method="post" class="checkout">
                <label for="name">your name :</label>
                <input type="text" name="name" placeholder="enter your name">
                <label for="number">your number :</label>
                <input type="number" name="number" placeholder="enter your number">
                <label for="email">your email :</label>
                <input type="email" name="email" placeholder="enter your email">
                <label for="method_payment">payment method :</label>
                <select name="method">
                    <option value="cash on delivery">cash on delivery</option>
                    <option value="credit card">credit card</option>
                    <option value="paypal">paypal</option>
                    <option value="paytm">paytm</option>
                </select>
                <label for="address">address line 01 :</label>
                <input type="number" min="0" name="flat" placeholder="flat no.">                        
                <label for="address">address line 01 :</label>
                <input type="text" name="street" placeholder="street name">
                <label for="city">city :</label>
                <input type="text" name="city" placeholder="city">                        
                <label for="state">state :</label>
                <input type="text" name="state" placeholder="state">                        
                <label for="country">country :</label>
                <input type="text" name="country" placeholder="country">                        
                <label for="postal_code">postal code :</label>
                <input type="number" min="0" name="pin_code" placeholder="postal code"> 
                <button type="submit" value="order now" class="order_btn" name="order_btn">order now</button>
            </form>
        </section>
    </main>

    <!-- footer -->
    <?php include_once "footer.php";?>

<!-- part of the profile_header.php -->
    <script src="js/shop_js/profile.js"></script>
<!-- -->
</body>
</html>