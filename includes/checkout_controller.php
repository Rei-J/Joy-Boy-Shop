<?php 
declare(strict_types=1);

function inputEmpty(string $name, string $email, string $number, string $address){
    if(empty($name) || empty($email) || empty($number) || empty($address)){
        return true;
    }else{
        return false;
    }
}
//name exist or not
function nameRegistered(object $pdo, string $name){
    if(getName($pdo, $name)){
        return true;
    }else{
        return false;
    }
}
//email exist or not
function emailRegistered(object $pdo, string $email){
    if(getEmail($pdo, $email)){
        return true;
    }else{
        return false;
    }
}
//invalid email
function emailInvalid(string $email){
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}
// Validate name, phone number & address(flat_no., street_name, city, state, country, postla_code)
function validName($name) {
    // Allow only letters and spaces
    return preg_match('/^[a-zA-Z\s]+$/', $name);
}
function validNumber($number) {
    // Allow only numbers
    return preg_match('/^[0-9]+$/', $number);
}
function validFlate($flat) {
    // Allow only numbers
    return preg_match('/^[0-9]+$/', $flat);
}
function validStreet($street) {
    // Allow only letters and spaces
    return preg_match('/^[a-zA-Z\s]+$/', $street);
}
function validCity($city) {
    // Allow only letters and spaces
    return preg_match('/^[a-zA-Z\s]+$/', $city);
}
function validCountry($country) {
    // Allow only letters and spaces
    return preg_match('/^[a-zA-Z\s]+$/', $country);
}
function validState($state) {
    // Allow only letters and spaces
    return preg_match('/^[a-zA-Z\s]+$/', $state);
}
function validPostalCode($postalCode) {
    // Allow only numbers
    return preg_match('/^[0-9]+$/', $postalCode);
}

function validateInput($name, $number, $flat, $street, $city, $country, $state, $postalCode){
    $errors = [];
    if (!validName($name)) {
        $errors[] = "First name should contain only letters!";
    }
    if (!validNumber($number)) {
        $errors[] = "The user number should contain only numbers!";
    }
    if (!validFlate($flat)) {
        $errors[] = "Flat no. should contain only numbers!";
    }
    if (!validStreet($street)) {
        $errors[] = "Street name should contain only letters!";
    }
    if (!validCity($city)) {
        $errors[] = "City should contain only letters!";
    }
    if (!validCountry($country)) {
        $errors[] = "Country should contain only letters!";
    }
    if (!validState($state)) {
        $errors[] = "State  should contain only letters!";
    }
    if (!validPostalCode($postalCode)) {
        $errors[] = "Postal Code should contain only numbers!";
    }

    return $errors;
}

function createOrder(object $pdo, string $user_id, string $name, string $number, string $email, string $method, string $address){
    place_order($pdo, $user_id, $name, $number, $email, $method, $address);
}