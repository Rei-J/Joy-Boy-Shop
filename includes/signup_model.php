<?php
declare(strict_types=1);

//signup_model handler all the database connection.

//create the user indside the database and submitted the data inside
function set_user(object $pdo, string $name, string $lastname, string $email, string $pwd,  string $birthday, string $gender){
    $query = "INSERT INTO users (name, lastname, email, pwd, birthday, gender) VALUES (:name, :lastname, :email, :pwd, :birthday, :gender);";
    $stmt = $pdo->prepare($query);
    $options = [
        'cost' => 12
    ];

    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":name", $name);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":pwd", $hashedPwd);
    $stmt->bindParam(":birthday", $birthday);
    $stmt->bindParam(":gender", $gender);
    $stmt->execute();
}


//get the name for the function to check if name exist or not
function get_name(object $pdo, string $name){
    $query = "SELECT name FROM users WHERE name = :name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get_lastname(object $pdo, string $lastname){
    $query = "SELECT name FROM users WHERE lastname = :lastname;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":lastname", $lastname);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
//get the name for the function to check if email exist or not
function get_email(object $pdo, string $email){
    $query = "SELECT name FROM users WHERE  email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}