<?php
    require_once 'includes/dbh.php';
    require_once 'includes/config_session.php'; //session_start();
    require_once 'includes/login_view.php';

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
    header('location:login.php');
    }


if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $products_name = $_POST['products_name'];
    $products_price = $_POST['products_price'];
    $products_img = $_POST['products_img'];
    $products_quantity = $_POST['products_quantity'];

    $check_cart_numbers = $pdo->prepare("SELECT * FROM `cart` WHERE name = :products_name AND user_id = :user_id");
    $check_cart_numbers->bindParam(':products_name', $products_name);
    $check_cart_numbers->bindParam(':user_id', $user_id);
    $check_cart_numbers->execute();

    if ($check_cart_numbers->rowCount() > 0) {
        echo '<div class="message" id="message"><p>already added to cart!</p></div>';
    } else {
        $insert_cart = $pdo->prepare("INSERT INTO `cart`(user_id, name, price, quantity, image) VALUES(:user_id, :products_name, :products_price, :products_quantity, :products_img)");
        $insert_cart->bindParam(':user_id', $user_id);
        $insert_cart->bindParam(':products_name', $products_name);
        $insert_cart->bindParam(':products_price', $products_price);
        $insert_cart->bindParam(':products_quantity', $products_quantity);
        $insert_cart->bindParam(':products_img', $products_img);
        $insert_cart->execute();

        echo '<div class="message" id="message"><p>product added to cart!</p></div>';

    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User profile</title>

    <!-- link to favicon -->
    <link rel="shortcut icon" href="img/shop_img/favicon.ico" type="image/x-icon">
    <!-- link to css -->
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/shop_css/profile_header.css">
    <link rel="stylesheet" href="css/shop_css/profile.css"><!-- main -->
    <link rel="stylesheet" href="css/shop_css/main_shop.css"><!-- footer -->


    <script src="js/shop_js/quick.js"></script>

</head>

<body>

<!-- header -->
<?php include_once "header.php";?>

<main>
   <h1>Welcome <?php profile_name(); ?></h1>
    <section class="profile_main">
            <?php
            $select_products = $pdo->query("SELECT * FROM `products`");

            if ($select_products->rowCount() > 0) {
                while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
            ?>
                    <form action="profile.php" method="post" class="products_box">
                    <img src="upload_img_products/<?php echo htmlspecialchars($fetch_products['image']); ?>" alt="products_img">
                        <div class="products_name"><?php echo htmlspecialchars($fetch_products['name']); ?></div>
                        <div class="products_price">$<?php echo htmlspecialchars($fetch_products['price']); ?>/-</div>
                        <input type="hidden" name="products_name" value="<?php echo htmlspecialchars($fetch_products['name']); ?>">
                        <input type="hidden" name="products_price" value="<?php echo htmlspecialchars($fetch_products['price']); ?>">
                        <input type="hidden" name="products_img" value="<?php echo htmlspecialchars($fetch_products['image']); ?>">
                        <div class="products_action">
                            <input type="number" class="products_quantity" name="products_quantity" value="1" min="1">
                            <button type="submit" class="add_to_card_btn" name="add_to_card">add to cart</button>
                        </div>
                    </form>
            <?php
                }
            } else {
                echo '<p class="empty">no products added yet!</p>';
            }
            ?>
    </section>
</main>
    <!-- footer -->
    <?php include_once "footer.php";?>

<!-- part of the profile_header.php -->
    <script src="js/shop_js/profile.js"></script>
<!-- -->
</body>
</html>