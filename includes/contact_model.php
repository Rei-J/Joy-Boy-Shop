<?php
declare(strict_types=1);
function sendMessage($pdo, $user_id, $name, $email, $no_phone, $messagebox) {
    // Check if the message already exists
    $select_statement = $pdo->prepare("SELECT * FROM `message` WHERE name = :name AND email = :email AND no_phone = :no_phone AND messagebox = :messagebox");
    $select_statement->execute(array(':name' => $name, ':email' => $email, ':no_phone' => $no_phone, ':messagebox' => $messagebox));

    if ($select_statement->rowCount() > 0) {
        return '<div class="message" id="message"><p>Message sent already!</p></div>';

    } else {
        // Prepare and execute the INSERT query
        $insert_statement = $pdo->prepare("INSERT INTO `message` (user_id, name, email, no_phone, messagebox) VALUES (:user_id, :name, :email, :no_phone, :messagebox)");
        $insert_statement->execute(array(':user_id' => $user_id, ':name' => $name, ':email' => $email, ':no_phone' => $no_phone, ':messagebox' => $messagebox));

        return '<div class="message" id="message"><p>Message sent successfully!</p></div>';
    }
}

function get__Name(object $pdo, string $name){
    $query = "SELECT name FROM users WHERE name = :name;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":name", $name);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
function get__Email(object $pdo, string $email){
    $query = "SELECT name FROM users WHERE  email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}