<?php
require_once 'config_session.php';
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
header('location:../login.php');
}else{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
        $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
        $no_phone = htmlspecialchars($_POST["no_phone"], ENT_QUOTES, "UTF-8");
        $messagebox = htmlspecialchars($_POST["messagebox"], ENT_QUOTES, "UTF-8");


        try {
            require_once 'dbh.php';
            require_once 'contact_model.php';
            require_once 'contact_controller.php';
    
            $errors = [];
            //validate only letters, space and numbers
            $errors = array_merge($errors, validate__Input($name, $no_phone, $messagebox));
            //empty inputs
            if(input__Empty($name, $email, $no_phone, $messagebox)){
                $errors["empty_input"] = "Fill in all fields!";
            }
            //name exist
            if(!name__Registered($pdo, $name)){
                $errors["name_doesn'tExist"] = "Fill the correct name!";   
            }
            //email exist
            if(!email__Registered($pdo, $email)){
                $errors["email_doesn'tExist"] = "Fill the correct email!";   
            }
            //invalid email
            if(email__Invalid($email)){
                $errors["invalid_email"] = "Invalid email used!";   
            }
    
    
            if (!$errors) {

                $user_id = $_SESSION['user_id'];

                placeMessage($pdo, $user_id, $name, $email, $no_phone, $messagebox);
                header("Location: " . $_SERVER['HTTP_REFERER'] . "?message=success");
                $pdo = null;
                $stmt = null;
                die();
            } else {
                $_SESSION["errors_message"] = $errors;
                header("Location: " . $_SERVER['HTTP_REFERER'] . "?message=failed");
                die();
            }
    
    
        } catch (PDOException $e) {
            die("Query Failed: ". $e->getMessage());
        }
    }
}