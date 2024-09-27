<?php 
    require_once 'includes/config_session.php'; //session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Log In</title>

        <!-- link to favicon -->
        <link rel="shortcut icon" href="img/shop_img/favicon.ico" type="image/x-icon">
        <!-- link to css -->
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/shop_css/ad_signup_login.css">
</head>
<body>
    <main class="main">
        <section class="container-login">
            <?php if(!isset($_SESSION["admin_user_id"])){ ?>
            <form action="admin_includes/ad_login.inc.php" method="post" id="login" class="login">
                <h2>Log In</h2>
                <input type="email" name="email" class="email" placeholder="email"> 
                <input type="password" name="pwd" class="pwd" placeholder="password">
                <button class="submit-btn">Log In</button>
                <p>don't have an account? <a href="admin_signup.php" target="_blank">sign up for free!</a> </p>
            </form>
            <?php } ?>
        </section>
    </main>
</body>
</html>