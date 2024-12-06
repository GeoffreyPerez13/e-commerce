document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.getElementById("hamburger-menu");
    const navbarMobile = document.querySelector("#navbar-mobile ul");
    const menuItems = navbarMobile.querySelectorAll("li");

    hamburger.addEventListener("click", () => {
        if (navbarMobile.style.display === "block") {
            // Masquer le menu
            menuItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.remove("visible");
                }, index * 100);
            });
            setTimeout(() => {
                navbarMobile.style.display = "none";
            }, menuItems.length * 100);
        } else {
            // Afficher le menu
            navbarMobile.style.display = "block";
            menuItems.forEach((item, index) => {
                setTimeout(() => {
                    item.classList.add("visible");
                }, index * 100);
            });
        }
    });
});