<?php
declare(strict_types=1);
/* check the errors
function check____Errors() {
    if (isset($_SESSION['errors_message'])) {
        $errors = $_SESSION['errors_message'];
        echo '<script>';
        foreach ($errors as $error) {
            echo 'alert("' . $error . '");';
        }
        echo '</script>';
        unset($_SESSION['errors_message']);
    } else if (isset($_GET['sendMessage']) && $_GET['sendMessage'] === "success") {
        echo '<script>alert("message success!");</script>';
    }
}
*/