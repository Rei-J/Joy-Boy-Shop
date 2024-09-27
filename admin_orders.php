<?php
require_once 'includes/dbh.php';
require_once 'includes/config_session.php'; //session_start();
require_once 'admin_includes/ad_login_view.php';

$admin_user_id = $_SESSION['admin_user_id'];

if(!isset($admin_user_id)){
   header('location:admin_login.php');
   die();
}


if (isset($_POST['update_order'])) {
    $order_update_id = $_POST['order_id'];

    if (isset($_POST['update_payment'])) {
        $update_payment = $_POST['update_payment'];
    } else {
        // If 'update_payment' is not set, you can provide a default value or handle it accordingly
        $update_payment = ''; // Set a default value or leave it empty
    }

    $update_query = $pdo->prepare("UPDATE `orders` SET payment_status = :update_payment WHERE id = :order_update_id");
    $update_query->bindParam(':update_payment', $update_payment, PDO::PARAM_STR);
    $update_query->bindParam(':order_update_id', $order_update_id, PDO::PARAM_INT);

    if ($update_query->execute()) {
        $message[] = "Payment status has been updated!";
    } else {
        die('Query failed');
    }
}


if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $delete_query = $pdo->prepare("DELETE FROM `orders` WHERE id = :delete_id");
    $delete_query->bindParam(':delete_id', $delete_id, PDO::PARAM_INT);

    if ($delete_query->execute()) {
        header('location:admin_orders.php');
    } else {
        die('Query failed');
    }
}


if (isset($_GET['delete_user'])) {
    $delete_id = $_GET['delete_user'];

    $delete_users = $pdo->prepare("DELETE FROM `users` WHERE id = :delete_id");
    $delete_users->bindParam(':delete_id', $delete_id, PDO::PARAM_INT);
    
    if($delete_users->execute()){
        header('location:admin_orders.php');
    }else{
        die('Query failed');
    }
}

if (isset($_GET['delete_messages'])) {
    $delete_id = $_GET['delete_messages'];

    $delete_messages = $pdo->prepare("DELETE FROM `message` WHERE id = :delete_id");
    $delete_messages->bindParam(':delete_id', $delete_id, PDO::PARAM_INT);
    
    if($delete_messages->execute()){
        header('location:admin_orders.php');
    }else{
        die('Query failed');
    }
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
    <link rel="stylesheet" href="css/shop_css/ad_main.css">
    <link rel="stylesheet" href="css/shop_css/ad_orders.css">
</head>

<body>

    <!-- header -->
    <?php include_once "admin_header.php";?>  

   <main>
      <h1>user data</h1>
      <section class="placed-orders">
        <?php
            $select_orders = $pdo->query("SELECT * FROM `orders`");
            if ($select_orders->rowCount() > 0) {
                while ($fetch_orders = $select_orders->fetch(PDO::FETCH_ASSOC)) {
        ?>
         <div class="prod_box">
            <p>user order!</p>
            <p> user id : <span><?php echo $fetch_orders['user_id']; ?></span> </p>
            <p> placed on : <span><?php echo $fetch_orders['placed_on']; ?></span> </p>
            <p> name : <span><?php echo $fetch_orders['name']; ?></span> </p>
            <p> number : <span><?php echo $fetch_orders['number']; ?></span> </p>
            <p> email : <span><?php echo $fetch_orders['email']; ?></span> </p>
            <p> address : <span>flat no.<?php echo $fetch_orders['address']; ?></span> </p>
            <p> total products : <span><?php echo $fetch_orders['total_products']; ?></span> </p>
            <p> total price : <span>$<?php echo $fetch_orders['total_price']; ?>/-</span> </p>
            <p> payment method : <span><?php echo $fetch_orders['method']; ?></span> </p>
            <form action="admin_orders.php" method="post">
                <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                <select name="update_payment" class="update_payment">
                <option value="#" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                <option value="pending">pending</option>
                <option value="completed">completed</option>
                </select>
                <div class="admin_option">
                    <button type="submit" name="update_order" class="upd_option">update</button>
                    <a href="admin_orders.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('delete this order?');" class="delete-btn">delete</a>
                </div>
            </form>
        </div>
         <?php
            }
        } else {
            echo '<p class="empty">no orders placed yet!</p>';
        }
        ?>
      </section>
   </main>
   <section class="placed_accounts">
        <?php
            $select_users = $pdo->query("SELECT * FROM `users`");
            if ($select_users->rowCount() > 0) {
                while ($fetch_users = $select_users->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="account_box">
            <p>active user account!</p>
            <p> user id : <span><?php echo $fetch_users['id']; ?></span> </p>
            <p> username : <span><?php echo $fetch_users['name']; ?></span> </p>
            <p> email : <span><?php echo $fetch_users['email']; ?></span> </p>
            <a href="admin_orders.php?delete_user=<?php echo $fetch_users['id']; ?>" onclick="return confirm('delete this user?');">delete user</a>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">no account placed yet!</p>';
        }
        ?>
   </section>
   <section class="placed_messages">
        <?php
            $select_messages = $pdo->query("SELECT * FROM `message`");

            if ($select_messages->rowCount() > 0) {
                while ($fetch_messages = $select_messages->fetch(PDO::FETCH_ASSOC)) {
        ?>
        <div class="messages_box">
            <p>user message!</p>
            <p> user id : <span><?php echo $fetch_messages['user_id']; ?></span> </p>
            <p> name : <span><?php echo $fetch_messages['name']; ?></span> </p>
            <p> email : <span><?php echo $fetch_messages['email']; ?></span> </p>
            <p> no_phone : <span><?php echo $fetch_messages['no_phone']; ?></span> </p>
            <p> message : <span><?php echo $fetch_messages['messagebox']; ?></span> </p>
            <a href="admin_orders.php?delete_messages=<?php echo $fetch_messages['id']; ?>" onclick="return confirm('delete this message?');">delete message</a>
        </div>
        <?php
                }
            } else {
                echo '<p class="empty">you have no messages!</p>';
            }
        ?>
   </section>


<script src="js/shop_js/admin.js"></script>

</body>
</html>