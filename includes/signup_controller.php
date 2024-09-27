<?php
declare(strict_types=1);
//signup_controller handler all the different inputs from the user


//the functions for error handler

//empty inputs
function is_birthday_empty(string $day, string $month, string $year) {
    return ($day === 'none' || $month === 'none' || $year === 'none');
}
function is_input_empty(string $name, string $lastname, string $email, string $pwd, string $day, string $month, string $year, string $gender){
    if(empty($name) || empty($lastname) || empty($email) || empty($pwd) || is_birthday_empty($day, $month, $year) || empty($gender)){
        return true;
    }else{
        return false;
    }
}
//invalid email
function is_email_invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
//the same name&lastname not allowed / the same name & different lastname allowed
function is_name_taken(object $pdo, string $name, string $lastname){
    if(get_name($pdo, $name) && get_lastname($pdo, $lastname)){
        return true;
    }else  if(get_name($pdo, $name) && !get_lastname($pdo, $lastname)){
        return false;
    }
}
//email exist or not
function is_email_registered(object $pdo, string $email){
    if(get_email($pdo, $email)){
        return true;
    }else{
        return false;
    }
}
// Validate name and lastname
function is_valid_name($name) {
    // Allow only letters and spaces
    return preg_match('/^[a-zA-Z\s]+$/', $name);
}
function is_valid_lastname($lastname) {
    // Allow only letters and spaces
    return preg_match('/^[a-zA-Z\s]+$/', $lastname);
}
function validate_name_lastname($name, $lastname) {
    $errors = [];

    if (!is_valid_name($name)) {
        $errors[] = "First name should contain only letters!";
    }

    if (!is_valid_lastname($lastname)) {
        $errors[] = "Last name should contain only letters!";
    }

    return $errors;
}

//create the user
function create_user(object $pdo, string $name, string $lastname, string $email, string $pwd,  string $birthday, string $gender){
    set_user($pdo, $name, $lastname, $email, $pwd,  $birthday, $gender);
}

