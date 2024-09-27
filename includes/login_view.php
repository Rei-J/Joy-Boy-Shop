<?php
declare(strict_types=1);
//login_view handler everything when we have to show something inside the website that the user can actually see inside the page.

//user profile or the popup that show that the user is logged in, and there he can logout(by clicking log out)
function output_email(){
    if(isset($_SESSION["user_id"])){
        echo $_SESSION["user_email"];
    }else{
        echo 'You are not logged in!';
    }
}

function output_name(){
    if(isset($_SESSION["user_id"])){
        echo '@' . $_SESSION["user_name"];
    }else{
        echo 'No user!';
    }
}

function profile_name(){
    if(isset($_SESSION["user_id"])){
        echo $_SESSION["user_name"];
    }else{
        echo 'No user!';
    }
}

//alert the errors/if you want to see the error messages, release it from comment
/*
function check_login_errors() {
    if (isset($_SESSION['errors_login'])) {
        $errors = $_SESSION['errors_login'];
        echo '<script>';
        foreach ($errors as $error) {
            echo 'alert("' . $error . '");';
        }
        echo '</script>';
        unset($_SESSION['errors_login']);
    } else if (isset($_GET['login']) && $_GET['login'] === "success") {
        echo '<script>alert("Login success!");</script>';
    }
}*/

