let userSettingsStatus = false;

let aduserSettings = function(){
    let getuserSettings = document.querySelector(".user_settings");
    let getuserMenu = document.querySelector(".user_menu");

    if(userSettingsStatus === false){
        getuserMenu.style.display = "flex";

        userSettingsStatus = true;
    }else if(userSettingsStatus === true){
        getuserMenu.style.display = "none";

        userSettingsStatus = false;
    }
}


/* --------------------------------------------------------- */

// Function to open the change_username element
function openChangeUsername() {
    let changeUsernameElement = document.getElementById('change_username');
    if (changeUsernameElement) {
        changeUsernameElement.style.display = 'flex';
    }
}
// Function to close the change_username element
function closeChangeUsername() {
    let changeUsernameElement = document.getElementById('change_username');
    if (changeUsernameElement) {
        changeUsernameElement.style.display = 'none';
    }
}
// Event listener to open change_username when ".second" is clicked
document.querySelector('.third').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    openChangeUsername();
});

// Event listener to close change_username when ".close_change_username" is clicked
document.querySelector('.close_change_username').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    closeChangeUsername();
});

/*-----------------------------------------------------------------------------------------------*/

// Function to open the delete_user element
function openDeleteUser() {
    let deleteuser = document.getElementById('delete_user');
    if (deleteuser) {
        deleteuser.style.display = 'flex';
    }
}

// Function to close the delete_user element
function closeDeleteUser() {
    let deleteuser = document.getElementById('delete_user');
    if (deleteuser) {
        deleteuser.style.display = 'none';
    }
}
// Event listener to open delete_user when ".third" is clicked
document.querySelector('.forth').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    openDeleteUser();
});
// Event listener to close delete_user when ".close_delete_user" is clicked
document.querySelector('.close_delete_user').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    closeDeleteUser();
});

/* ------------------------------------------------------- */



//cancel the update of the product
document.addEventListener('DOMContentLoaded', () => {
    const closeButton = document.querySelector('#close-update');

    if (closeButton) {
        closeButton.onclick = () => {
            document.querySelector('.edit-product-form').style.display = 'none';
            window.location.href = 'admin_products.php';
        };
    } else {
        console.log('Element with ID "close-update" not found.');
    }
});
