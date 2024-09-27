<?php

require_once 'config_session.php';

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    header("Location: ../login.php");
    die();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, "UTF-8");
    $userId = $_SESSION["user_id"];

    try {
        require_once 'dbh.php';

        // Check if the provided username and password match the current user's credentials
        $query = "SELECT * FROM users WHERE id = :userId;";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($pwd, $user["pwd"]) && $email == $user["email"]) {
            // Delete the user account
            $deleteQuery = "DELETE FROM users WHERE id = :userId;";
            $deleteStmt = $pdo->prepare($deleteQuery);
            $deleteStmt->bindParam(":userId", $userId);
            $deleteStmt->execute();

            // Log the user out
            session_unset();
            session_destroy();

            header("Location: ../login.php?delete=success");
            die();
        } else {
            // Invalid credentials
            header("Location: ../profile.php?delete=failed");
            die();
        }
    } catch (PDOException $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    header("Location: ../profile.php");
    die();
}

