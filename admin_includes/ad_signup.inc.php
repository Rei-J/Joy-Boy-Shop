<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
    $lastname = htmlspecialchars($_POST["lastname"], ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, "UTF-8");

    try {
        require_once '../includes/dbh.php';
        require_once 'ad_signup_model.php';
        require_once 'ad_signup_controller.php';

        //error handlers
        $errors = [];

        // Allow only letters and spaces
        $errors = array_merge($errors, validate_name_lastname($name, $lastname));
        //empty inputs
        if(are_inputs_empty($name, $lastname, $email, $pwd)){
            $errors["empty_input"] = "Fill in all fields!";
        }
        //invalid email
        if(is_ad_email_invalid($email)){
            $errors["email_invalid"] = "Invalid email used!";
        }
        //name exist
        if(is_ad_name_taken($pdo, $name, $lastname)){
            $errors["name_taken"] = "Name&Lastname already exist!";
        }
        //email exist
        if(is_ad_email_registered($pdo, $email)){
            $errors["email_registered"] = "Email already registered!";
        }
        
        require_once '../includes/config_session.php';//session_start();

        if($errors){
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "name" => $name,
                "lastname" => $lastname,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../admin_signup.php");
            die();
        }

        create_ad_user($pdo, $name, $lastname, $email, $pwd);
        header("Location: ../admin_login.php?signup=success");
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query Failed: ". $e->getMessage());
    }
}else{
    header("Location: ../admin_signup.php");
    die();
}

