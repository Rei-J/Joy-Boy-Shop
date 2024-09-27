<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name = htmlspecialchars($_POST["name"], ENT_QUOTES, "UTF-8");
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, "UTF-8");
    $number = htmlspecialchars($_POST["number"], ENT_QUOTES, "UTF-8");
    $method = $_POST['method'];
    $flat = htmlspecialchars($_POST["flat"], ENT_QUOTES, "UTF-8");
    $street = htmlspecialchars($_POST["street"], ENT_QUOTES, "UTF-8");
    $city = htmlspecialchars($_POST["city"], ENT_QUOTES, "UTF-8");
    $country = htmlspecialchars($_POST["country"], ENT_QUOTES, "UTF-8");
    $state = htmlspecialchars($_POST["state"], ENT_QUOTES, "UTF-8");
    $postalCode = htmlspecialchars($_POST["pin_code"], ENT_QUOTES, "UTF-8");
    $address = $flat . '-' . $street . '-' . $city . '-' . $country . '-' . $state . '-' . $postalCode;
    $placed_on = date('d-M-Y');

    try {
        require_once 'dbh.php';
        require_once 'checkout_model.php';
        require_once 'checkout_controller.php';

        $errors = [];
        //validate only letters and numbers
        $errors = array_merge($errors, validateInput($name, $number, $flat, $street, $city, $country, $state, $postalCode));
        //empty inputs
        if(inputEmpty($name, $email, $number, $address)){
            $errors["empty_input"] = "Fill in all fields!";
        }
        //name exist
        if(!nameRegistered($pdo, $name)){
            $errors["name_doesn'tExist"] = "Fill the correct name!";   
        }
        //email exist
        if(!emailRegistered($pdo, $email)){
            $errors["email_doesn'tExist"] = "Fill the correct email!";   
        }
        //invalid email
        if(emailInvalid($email)){
            $errors["invalid_email"] = "Invalid email used!";   
        }

        require_once 'config_session.php';
        if(!$errors){
            $user_id = $_SESSION['user_id'];

            createOrder($pdo, $user_id, $name, $number, $email, $method, $address);
            header("Location: ../order.php?order=success");
            $pdo = null;
            $stmt = null;
            die();
        }else{
            $_SESSION["errors_cart"] = $errors;

            header("Location: ../checkout.php?order=failed");
            die();
        }

    } catch (PDOException $e) {
        die("Query Failed: ". $e->getMessage());
    }
}else {
    header("Location: ../checkout.php");
    die();
}