<?php

require_once '../includes/config_session.php';

if(!isset($_SESSION["admin_user_id"])){
    header('location:admin_login.php');
    die();
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, "UTF-8");
    $admin_user_id = $_SESSION['admin_user_id'];

    try {
        require_once '../includes/dbh.php';

        if (!empty($name) && $name != $_SESSION["admin_user_id"]) {
            $query = "UPDATE admin_users SET name = :name WHERE id = :admin_user_id;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":admin_user_id", $admin_user_id);
            $stmt->execute();
            $_SESSION["admin_user_id"] = $name; // Update the session with the new ad_username
        }

        if (!empty($pwd)) {
            $options = [
                'cost' => 12
            ];
            $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
            $query = "UPDATE admin_users SET pwd = :pwd WHERE id = :admin_user_id;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":pwd", $hashedPwd);
            $stmt->bindParam(":admin_user_id", $admin_user_id);
            $stmt->execute();
        }

        header("Location: ../admin_index.php?update=success");
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../admin_index.php");
    die();
}