let asideMenuStatus = false;

let asideMenu = function(){
    let getAsideMenu = document.querySelector(".aside-menu");
    let getAsideMenuUl = document.querySelector(".aside-menu ul");
    let getAsideMenuIcon = document.querySelector(".userlogin");

    if(asideMenuStatus === false){
        getAsideMenu.style.width = "13rem";
        getAsideMenuUl.style.visibility = "visible";
        getAsideMenuIcon.style.visibility = "visible";
        
        asideMenuStatus = true;
    }else if(asideMenuStatus === true){
        getAsideMenu.style.width = "0";
        getAsideMenuUl.style.visibility = "hidden";
        getAsideMenuIcon.style.visibility = "hidden";

        asideMenuStatus = false;
    }
}


let userSettingsStatus = false;

let userSettings = function(){
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
document.querySelector('.second').addEventListener('click', function(event) {
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
document.querySelector('.third').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    openDeleteUser();
});
// Event listener to close delete_user when ".close_delete_user" is clicked
document.querySelector('.close_delete_user').addEventListener('click', function(event) {
    event.preventDefault(); // Prevent the default link behavior
    closeDeleteUser();
});

/* ------------------------------------------------------- */
