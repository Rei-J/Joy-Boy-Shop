<?php
declare(strict_types=1);
//login_controller handler all the different inputs from the user

function is_ad_email_wrong(bool|array $result){
    if(!$result){
        return true;
    }else{
        return false;
    }
}

function is_ad_password_wrong(string $pwd, string $hashedPwd){
    if(!password_verify($pwd, $hashedPwd)){
        return true;
    }else{
        return false;
    }
}


function are_inputs_empty(string $email, string $pwd){
    if(empty($email) || empty($pwd)){
        return true;
    }else{
        return false;
    }
}