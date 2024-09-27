<?php
    require_once 'includes/config_session.php'; //session_start();
    require_once 'admin_includes/ad_signup_view.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Sign Up</title>

        <!-- link to favicon -->
        <link rel="shortcut icon" href="img/shop_img/favicon.ico" type="image/x-icon">
        <!-- link to css -->
        <link rel="stylesheet" href="css/reset.css">
        <link rel="stylesheet" href="css/shop_css/ad_signup_login.css">
</head>
<body>
    <main class="main">
        <section class="container-signup">
            <form action="admin_includes/ad_signup.inc.php" method="post" id="signup" class="signup">
                <h2>Sign Up</h2>
                <?php ad_signup_inputs(); ?> <!-- name, lastname, email inputs -->
                <input type="password" name="pwd" class="pwd" placeholder="password">
                <p>By clicking Sign Up, you agree to our Terms, Privacy Policy and Cookies Policy. You may receive SMS Notifications from us and can opt out any time.</p>
                <button type="submit" value="submit" class="submit-btn">sign up</button>
            </form>
        </section>
    </main>
</body>
</html>