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

if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    // Fetch image name before deletion
    $stmt = $pdo->prepare("SELECT image FROM products WHERE id = :id");
    $stmt->bindParam(':id', $delete_id);
    $stmt->execute();
    $fetch_delete_image = $stmt->fetch(PDO::FETCH_ASSOC);

    // Delete the product
    $stmt = $pdo->prepare("DELETE FROM products WHERE id = :id");
    $stmt->bindParam(':id', $delete_id);
    $stmt->execute();

    // Delete the image file
    unlink('upload_img_products/' . $fetch_delete_image['image']);
    header('location:admin_products.php');
    exit();
}

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
    <link rel="stylesheet" href="css/shop_css/ad_main.css">
    <link rel="stylesheet" href="css/shop_css/ad_products.css">
</head>
<body>
        <!-- header -->
        <?php include_once "admin_header.php";?>  

    <main>
        <section class="add-products">
            <form action="admin_includes/addProducts.inc.php" method="post" enctype="multipart/form-data">
                <h3>add product</h3>
                <input type="text" name="name" placeholder="enter product name">
                <input type="number" min="0" name="price" placeholder="enter product price">
                <input type="file" name="image" accept="image/jpg, image/jpeg, image/png">
                <button type="submit" value="add product" name="add_product" class="addProduct-btn">add product</button>
            </form>
        </section>

        <section class="show-products">
            <?php
            $select_products = $pdo->query("SELECT * FROM `products`");
            $products = $select_products->fetchAll(PDO::FETCH_ASSOC);
            if(count($products) > 0){
                foreach($products as $fetch_products){
            ?>
            <div class="product_containar">
                <img src="upload_img_products/<?php echo $fetch_products['image']; ?>" alt="product_image">
                <div class="name"><?php echo $fetch_products['name']; ?></div>
                <div class="price">$<?php echo $fetch_products['price']; ?>/-</div>
                <div class="productOption">
                    <a href="admin_products.php?update=<?php echo $fetch_products['id']; ?>">update</a>
                    <a href="admin_products.php?delete=<?php echo $fetch_products['id']; ?>" onclick="return confirm('delete this product?');">delete</a>
                </div>
            </div>
            <?php
                    }
                } else {
                    echo '<p class="empty">no products added yet! <br> please upload the product!</p>';
                }
            ?>
        </section>

        <section class="edit-product-form">
            <?php
            if (isset($_GET['update'])) {
                $update_id = $_GET['update'];
                $update_query = $pdo->prepare("SELECT * FROM `products` WHERE id = :update_id");
                $update_query->bindParam(':update_id', $update_id, PDO::PARAM_INT);
                $update_query->execute();

                if ($update_query->rowCount() > 0) {
                    while ($fetch_update = $update_query->fetch(PDO::FETCH_ASSOC)) {
                        ?>
                        <form action="admin_includes/updateProducts.inc.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="update_p_id" value="<?php echo $fetch_update['id']; ?>">
                            <input type="hidden" name="update_old_image" value="<?php echo $fetch_update['image']; ?>">
                            <img src="upload_img_products/<?php echo $fetch_update['image']; ?>" alt="product_image">
                            <input type="text" name="update_name" value="<?php echo $fetch_update['name']; ?>" placeholder="enter product name">
                            <input type="number" name="update_price" value="<?php echo $fetch_update['price']; ?>" min="0" placeholder="enter product price">
                            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png">
                            <div class="option">
                                <button type="submit" name="update_product" class="update_btn">update</button>
                                <button type="reset" id="close-update" class="cancel_btn">cancel</button>
                            </div>
                        </form>
                        <?php
                    }
                }
            } else {
                echo '<script>document.querySelector(".edit-product-form").style.display = "none";</script>';
            }
            ?>
        </section>

    </main>

    <script src="js/shop_js/admin.js"></script>
</body>
</html>
