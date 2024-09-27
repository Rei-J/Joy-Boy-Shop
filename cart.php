<?php 
    require_once 'includes/dbh.php';
    require_once 'includes/config_session.php'; //session_start();
    require_once 'includes/login_view.php';

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
    header('location:login.php');
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {      
        $cart_id = $_POST['cart_id'];
        $cart_quantity = $_POST['cart_quantity'];
    
        $update_statement = $pdo->prepare("UPDATE `cart` SET quantity = :cart_quantity WHERE id = :cart_id");
        $update_statement->bindParam(':cart_quantity', $cart_quantity);
        $update_statement->bindParam(':cart_id', $cart_id);
        $update_statement->execute();
    
        echo '<div class="message" id="message"><p>cart quantity updated!</p></div>';

    }

    if (isset($_GET['delete'])) {
        $delete_id = $_GET['delete'];
    
        $delete_statement = $pdo->prepare("DELETE FROM `cart` WHERE id = :delete_id");
        $delete_statement->bindParam(':delete_id', $delete_id);
        $delete_statement->execute();
    
        header('location:cart.php');
    }
    
    if (isset($_GET['delete_all'])) {
        $delete_all_statement = $pdo->prepare("DELETE FROM `cart` WHERE user_id = :user_id");
        $delete_all_statement->bindParam(':user_id', $user_id);
        $delete_all_statement->execute();
    
        header('location:cart.php');
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
    <link rel="stylesheet" href="css/shop_css/cart.css"><!-- main -->
    <link rel="stylesheet" href="css/shop_css/main_shop.css"><!-- footer -->

    <script src="js/shop_js/quick.js"></script>

</head>
<body>
   
<!-- header -->
<?php include_once "header.php";?>

<!-- main -->
   <main>
      <h1>All the movies selected!</h1>
      <section class="profile_main">
         <?php
         $grand_total = 0;
         $select_products = $pdo->prepare("SELECT * FROM `cart` WHERE user_id = :user_id");
         $select_products->bindParam(':user_id', $user_id);
         $select_products->execute();
     
         if ($select_products->rowCount() > 0) {
             while ($fetch_products = $select_products->fetch(PDO::FETCH_ASSOC)) {
                 ?>
                 <div class="product_containar">
                    <form action="cart.php" method="post" class="products_box">
                        <img src="upload_img_products/<?php echo $fetch_products['image']; ?>" alt="product_image">
                        <div class="products_name"><?php echo $fetch_products['name']; ?></div>
                        <div class="products_price">$<?php echo $fetch_products['price']; ?>/-</div>
                        <input type="hidden" name="cart_id" value="<?php echo $fetch_products['id']; ?>">
                        <input type="number" min="1" class="products_quantity" name="cart_quantity" value="<?php echo $fetch_products['quantity']; ?>">
                        <div class="productOption">
                            <button type="submit" name="update_cart" value="update" class="update-btn">update</button>
                            <a href="cart.php?delete=<?php echo $fetch_products['id']; ?>" class="delete-btn" onclick="return confirm('delete this from cart?');">delete</a>
                        </div>
                        <div class="sub-total"> sub total : <span>$<?php echo $sub_total = ($fetch_products['quantity'] * $fetch_products['price']); ?>/-</span></div>
                    </form>
                </div>
                 <?php
                 $grand_total += $sub_total;
             }
         } else {
             echo '<p class="empty">your cart is empty</p>';
         }
         ?>
     </section>
        <section class="continue">
            <div class="delete_btn">
                <a href="cart.php?delete_all" class="delete_btn1 <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>" onclick="return confirm('delete all from cart?');">delete all</a>
            </div>
            <div class="cart-total">
                <p>grand total : <span>$<?php echo $grand_total; ?>/-</span></p>
            </div>
            <div class="userOption-btn">
                <a href="profile.php">continue shopping</a>
                <a href="checkout.php" class="btn <?php echo ($grand_total > 1) ? '' : 'disabled'; ?>">proceed to checkout</a>
            </div>
        </section>
   </main>

<!-- footer -->
<?php include_once "footer.php";?>

<!-- part of the profile_header.php -->
    <script src="js/shop_js/profile.js"></script>
<!-- -->
</body>
</html>