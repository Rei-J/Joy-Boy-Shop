<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
    $lastname = htmlspecialchars($_POST["lastname"], ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $pwd = htmlspecialchars($_POST["pwd"], ENT_QUOTES, "UTF-8");
    $gender = isset($_POST["genderoption"]) ? $_POST["genderoption"] : '';
    $year = $_POST["year"];
    $month = $_POST["month"];
    $day = $_POST["day"];
    $birthday = $year . '-' . $month . '-' . $day;
    try {
        require_once 'dbh.php';
        require_once 'signup_model.php';
        require_once 'signup_controller.php';

        //error handlers
        $errors = [];

        // Allow only letters and spaces
        $errors = array_merge($errors, validate_name_lastname($name, $lastname));
        //empty inputs
        if(is_input_empty($name, $lastname, $email, $pwd, $day, $month, $year, $gender)){
            $errors["empty_input"] = "Fill in all fields!";
        }
        //invalid email
        if(is_email_invalid($email)){
            $errors["email_invalid"] = "Invalid email used!";
        }
        //name exist
        if(is_name_taken($pdo, $name, $lastname)){
            $errors["name_taken"] = "Name&Lastname already exist!";
        }
        //email exist
        if(is_email_registered($pdo, $email)){
            $errors["email_registered"] = "Email already registered!";
        }
        
        require_once 'config_session.php';//session_start();

        if($errors){
            $_SESSION["errors_signup"] = $errors;

            $signupData = [
                "name" => $name,
                "lastname" => $lastname,
                "email" => $email
            ];
            $_SESSION["signup_data"] = $signupData;

            header("Location: ../signup.php");
            die();
        }

        create_user($pdo, $name, $lastname, $email, $pwd, $birthday, $gender);
        header("Location: ../login.php?signup=success");
        $pdo = null;
        $stmt = null;
        die();

    } catch (PDOException $e) {
        die("Query Failed: ". $e->getMessage());
    }
}else{
    header("Location: ../signup.php");
    die();
}

