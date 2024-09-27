<?php

require_once 'config_session.php';

if(!isset($_SESSION["user_id"])){
    header("Location: ../login.php");
    die();
}

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, "UTF-8");
    $userId = $_SESSION["user_id"];

    try {
        require_once 'dbh.php';

        if (!empty($name) && $name != $_SESSION["user_name"]) {
            $query = "UPDATE users SET name = :name WHERE id = :userId;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":name", $name);
            $stmt->bindParam(":userId", $userId);
            $stmt->execute();
            $_SESSION["user_name"] = $name; // Update the session with the new username
        }

        if (!empty($pwd)) {
            $options = [
                'cost' => 12
            ];
            $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
            $query = "UPDATE users SET pwd = :pwd WHERE id = :userId;";
            $stmt = $pdo->prepare($query);
            $stmt->bindParam(":pwd", $hashedPwd);
            $stmt->bindParam(":userId", $userId);
            $stmt->execute();
        }

        header("Location: ../profile.php?update=success");
        die();

    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
}else{
    header("Location: ../profile.php");
    die();
}