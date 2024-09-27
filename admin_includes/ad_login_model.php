<?php
declare(strict_types=1);
//login_model handler all the database connection.

//query the email from database
function get_admin_user(object $pdo, string $email){
    $query = "SELECT * FROM admin_users WHERE email = :ad_email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":ad_email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
