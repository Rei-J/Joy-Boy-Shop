<?php
declare(strict_types=1);

//signup_model handler all the database connection.

//create the user indside the database and submitted the data inside
function set_ad_user(object $pdo, string $name, string $lastname, string $email, string $pwd){
    $query = "INSERT INTO admin_users (name, lastname, email, pwd) VALUES (:ad_name, :ad_lastname, :ad_email, :ad_pwd);";
    $stmt = $pdo->prepare($query);
    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":ad_name", $name);
    $stmt->bindParam(":ad_lastname", $lastname);
    $stmt->bindParam(":ad_email", $email);
    $stmt->bindParam(":ad_pwd", $hashedPwd);
    $stmt->execute();
}


//get the name for the function to check if name exist or not
function get_ad_name(object $pdo, string $name){
    $query = "SELECT name FROM admin_users WHERE name = :ad_name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":ad_name", $name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_ad_lastname(object $pdo, string $lastname){
    $query = "SELECT name FROM admin_users WHERE lastname = :ad_lastname;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":ad_lastname", $lastname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
//get the name for the function to check if email exist or not
function get_ad_email(object $pdo, string $email){
    $query = "SELECT name FROM admin_users WHERE  email = :ad_email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":ad_email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}