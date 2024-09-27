<?php 
    require_once 'includes/config_session.php'; //session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JoyBoy Log In</title>

        <!-- link to favicon -->
        <link rel="shortcut icon" href="img/shop_img/favicon.ico" type="image/x-icon">
        <!-- link to css -->
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/shop_css/signup_login.css">
</head>
<body>
    <main class="main">
        <section class="container-login">
            <?php if(!isset($_SESSION["user_id"])){ ?>
            <form action="includes/login.inc.php" method="post" id="login" class="login">
                <h2>Log In</h2>
                <input type="email" name="email" class="email" placeholder="email"> 
                <input type="password" name="pwd" class="pwd" placeholder="password">
                <button class="submit-btn">Log In</button>
                <p>don't have an account? <a href="signup.php" target="_blank">sign up for free!</a> </p>
            </form>
            <?php } ?>

            <!-- if you want to see the error messages remove the comment here and in login_view.php -->
           <?php // check_login_errors(); ?>
        </section>
    </main>
</body>
</html>