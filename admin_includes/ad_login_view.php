<?php
declare(strict_types=1);
//login_view handler everything when we have to show something inside the website that the user can actually see inside the page.

//user profile or the popup that show that the user is logged in, and there he can logout(by clicking log out)
function output_ad_email(){
    if(isset($_SESSION["admin_user_id"])){
        echo $_SESSION["admin_user_email"];
    }else{
        echo 'You are not logged in!';
    }
}

function output_ad_name(){
    if(isset($_SESSION["admin_user_id"])){
        echo $_SESSION["admin_user_name"];
    }else{
        echo 'No user!';
    }
}
