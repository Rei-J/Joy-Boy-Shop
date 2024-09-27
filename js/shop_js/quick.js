document.addEventListener("DOMContentLoaded", function() {
    var mainElement = document.querySelector('main');
    mainElement.classList.add('loaded');
});

function init() {
    var message = document.getElementById('message');
    if (message) {
        message.style.visibility = 'hidden';

        // Trigger the transition after a short delay to avoid flickering
        setTimeout(function () {
            message.style.visibility = 'visible';
        }, 1);
    }
}
document.addEventListener("DOMContentLoaded", init);
