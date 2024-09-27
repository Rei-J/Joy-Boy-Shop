<?php 
    require_once 'includes/config_session.php'; //session_start();
    require_once 'includes/login_view.php';

    $user_id = $_SESSION['user_id'];

    if(!isset($user_id)){
    header('location:login.php');
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $search = $_POST["search"];

        try {
            require_once "includes/dbh.php";
    
            $query = "SELECT * FROM products WHERE name = :search;";
            
            $stmt = $pdo->prepare($query);
    
            $stmt->bindParam(":search", $search);

            $stmt->execute();

            $products = $stmt->fetchALL(PDO::FETCH_ASSOC);

            $pdo = null;
            $stmt = null;

        } catch (PDOException $e) {
            die("Query failed: " .$e->getMessage());
        }
    }else{
        header("Location: profile.php");
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
    <link rel="stylesheet" href="css/shop_css/profile.css">
    <link rel="stylesheet" href="css/shop_css/main_shop.css">

</head>
<body>

<!-- header -->
<?php include_once "header.php";?>

<!-- main -->
    <main>
        <h1>Search results!</h1>
        <section class="profile_main">
            <?php
                if(empty($products)){
                    echo "<p class='message'>There were no results!</p>";
                }else{
                    foreach($products as $fetch_products){
                        echo '<form action="search.inc.php" method="post" class="products_box">
                        <img src="http://localhost/Project1/upload_img_products/' . htmlspecialchars($fetch_products['image']) . '" alt="movie result image">
                        <div class="products_name">' . htmlspecialchars($fetch_products['name']) . '</div>
                        <div class="products_price">$' . htmlspecialchars($fetch_products['price']) . '/-</div>
                        <input type="hidden" name="products_name" value="' . htmlspecialchars($fetch_products['name']) . '">
                        <input type="hidden" name="products_price" value="' . htmlspecialchars($fetch_products['price']) . '">
                        <input type="hidden" name="products_img" value="' . htmlspecialchars($fetch_products['image']) . '">
                        <div class="products_action">
                            <input type="number" class="products_quantity" name="products_quantity" value="1" min="1">
                            <button type="submit" class="add_to_card_btn" name="add_to_card">add to cart</button>
                        </div>
                        </form>';
                    }  
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