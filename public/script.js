const button = document.getElementById("mobile-button");

button.addEventListener("click", () => {
    const menu = document.getElementById("mobile-menu");

    if (menu.getAttribute("data-open") === "false") {
        menu.className = "lg:hidden";
        menu.setAttribute("data-open", "true");
    } else {
        menu.className = "hidden";
        menu.setAttribute("data-open", "false");
    }
});
