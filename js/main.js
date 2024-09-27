//burger-menu btn open/close
let burgerBtn = document.querySelector(".burger-menu-btn");
let burgerMenu = document.querySelector(".burger-menu");

let isBurgerOpen = false;

burgerBtn.onclick = function(){
    if(!isBurgerOpen){
        burgerMenu.style.display = "block";
        burgerBtn.style.backgroundPosition = "center left 5rem, center";
        isBurgerOpen = true;
    }else if(isBurgerOpen){
        burgerMenu.style.display = "none";
        burgerBtn.style.backgroundPosition = "center, center left 5rem";
        isBurgerOpen = false;
    }
}

//close burger-menu when a link is clicked

document.querySelectorAll(".burger-menu a").forEach(function(link){
    link.addEventListener("click", function(){
        burgerMenu.style.display = "none";
        burgerBtn.style.backgroundPosition = "center, center left 5rem";
        isBurgerOpen = false;
    });
});

