<?php 
declare(strict_types=1);
function input__Empty(string $name, string $email, string $no_phone, string $messagebox){
    if(empty($name) || empty($email) || empty($no_phone) || empty($messagebox)){
        return true;
    }else{
        return false;
    }
}
//name exist or not
function name__Registered(object $pdo, string $name){
    if(get__Name($pdo, $name)){
        return true;
    }else{
        return false;
    }
}
//email exist or not
function email__Registered(object $pdo, string $email){
    if(get__Email($pdo, $email)){
        return true;
    }else{
        return false;
    }
}
//invalid email
function email__Invalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
// Validate name, phone number & message area
function valid__Name($name) {
    // Allow only letters and spaces
    return preg_match('/^[a-zA-Z\s]+$/', $name);
}
function valid__phoneNo($no_phone) {
    // Allow only numbers
    return preg_match('/^[0-9]+$/', $no_phone);
}
function valid__messageArea($messagebox) {
    // Allow only letters, spaces, and numbers; disallow special characters
    return preg_match('/^[a-zA-Z0-9\s]+$/', $messagebox);
}
function validate__Input($name, $no_phone, $messagebox){
    $errors = [];
    if (!valid__Name($name)) {
        $errors[] = "First name should contain only letters!";
    }
    if (!valid__phoneNo($no_phone)) {
        $errors[] = "The user number should contain only numbers!";
    }
    if (!valid__messageArea($messagebox)) {
        $errors[] = "Message area shouldn't contain special characters!";
    }

    return $errors;
}

function placeMessage(object $pdo, string $user_id, string $name, string $email, string $no_phone, string $messagebox){
    sendMessage($pdo, $user_id, $name, $email, $no_phone, $messagebox);
}
