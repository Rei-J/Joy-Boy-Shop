<?php

require_once '../includes/config_session.php';

// Check if the user is logged in
if(!isset($_SESSION["admin_user_id"])){
    header('location:admin_login.php');
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, "UTF-8");
    $admin_user_id = $_SESSION['admin_user_id'];

    try {
        require_once '../includes/dbh.php';

        // Check if the provided username and password match the current user's credentials
        $query = "SELECT * FROM admin_users WHERE id = :admin_user_id;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":admin_user_id", $admin_user_id);
        $stmt->execute();
        $admin_user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin_user && password_verify($pwd, $admin_user["pwd"]) && $email == $admin_user["email"]) {
            // Delete the user account
            $deleteQuery = "DELETE FROM admin_users WHERE id = :admin_user_id;";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $deleteStmt->bindParam(":admin_user_id", $admin_user_id);
            $deleteStmt->execute();

            // Log the user out
            session_unset();
            session_destroy();

            header("Location: ../admin_login.php?delete=success");
            die();
        } else {
            // Invalid credentials
            header("Location: ../admin_index.php?delete=failed");
            die();
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../admin_index.php");
    die();
}

