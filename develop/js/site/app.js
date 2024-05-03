let App;

App = {

    hamburgerToggle: function() {
        const hamburger = document.getElementById('hamburger');
        const curtainMenu = document.getElementById('curtain-menu');
        const curtainMenuContent = document.querySelector('.curtain-menu-content');
        if (hamburger && curtainMenu && curtainMenuContent) {
            hamburger.addEventListener('click', function() {
                this.classList.toggle('toggle');
                curtainMenu.classList.toggle('invisible');
                curtainMenu.classList.toggle('opacity-0');
                curtainMenuContent.classList.toggle('!translate-x-0');
                document.body.classList.toggle('overflow-hidden');
            });
        }
    }, 


    init: function() {
        this.hamburgerToggle();
    }
};

document.addEventListener("DOMContentLoaded", () => App.init());