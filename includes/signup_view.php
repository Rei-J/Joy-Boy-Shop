<?php
declare(strict_types=1);
//signup_view handler everything when we have to show something inside the website that the user can actually see inside the page.


//alert the message for any error in signup page
/*
function check_signup_errors() {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];
        echo '<script>';
        foreach ($errors as $error) {
            echo 'alert("' . $error . '");';
        }
        echo '</script>';
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET['signup']) && $_GET['signup'] === "success") {
        echo '<script>alert("Signup success!");</script>';
    }
}*/

//signup input, some of the data to be remember if some error happen(example:name, lastname, email)
function signup_inputs(){
    if((isset($_SESSION["signup_data"]["name"]) && !isset($_SESSION["errors_signup"]["name_taken"])) || (isset($_SESSION["signup_data"]["lastname"]) && !isset($_SESSION["errors_signup"]))){
        echo '<div class="name_last"><input type="text" name="name" class="name" placeholder="first name" value="' . $_SESSION["signup_data"]["name"] . '"><input type="text" name="lastname"  class="lastname" placeholder="last name" value="' . $_SESSION["signup_data"]["lastname"] . '"></div>';
    }else{
        echo '<div class="name_last"><input type="text" name="name" class="name" placeholder="first name"><input type="text" name="lastname"  class="lastname" placeholder="last name"></div>';
    }

    if(isset($_SESSION["signup_data"]["email"]) && !isset($_SESSION["errors_signup"]["email_registered"]) && !isset($_SESSION['errors_signup']['email_invalid'])){
        echo '<input type="email" name="email" class="email" placeholder="email" value="' . $_SESSION["signup_data"]["email"] . '">';
    }else{
        echo '<input type="email" name="email" class="email" placeholder="email">';
    }
}
