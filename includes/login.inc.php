<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, "UTF-8");
    try {
        require_once 'dbh.php';
        require_once 'login_model.php';
        require_once 'login_controller.php';

        //error handlers
        $errors = [];
        if(is_input_empty($email, $pwd)){
            $errors["empty_input"] = "Fill in all fields!";
        }

        $result = get_user($pdo, $email);

        if(is_email_wrong($result)){
            $errors["login_incorrect"] = "Incorrect email!";
        }
        if(!is_email_wrong($result) && is_password_wrong($pwd, $result["pwd"])){
            $errors["login_incorrect"] = "Incorrect password!";
        }


        require_once 'config_session.php';

        if($errors){
            $_SESSION["errors_login"] = $errors;

            header("Location: ../login.php");
            die();
        }
        
        $newSessionId = session_create_id();
        $sessionId = $newSessionId . "_" . $result["id"];
        session_id($sessionId);

        $_SESSION["user_id"] = $result["id"];
        $_SESSION["user_name"] = htmlspecialchars($result["name"]);
        $_SESSION["user_email"] = htmlspecialchars($result["email"]);
        $_SESSION["last_regeneration"] = time();

        header("Location: ../profile.php?login=success");

        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query Failed: ". $e->getMessage());
    }
}else{
    header("Location: ../login.php");
    die();
}