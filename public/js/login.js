const button = document.getElementById("button_reveal");

button.addEventListener("click", (e) => {
    e.preventDefault();
    const form = document.getElementById("password");
    const icon = document.getElementById("eye");

    if (form.getAttribute("type") === "password") {
        form.setAttribute("type", "text");
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
    } else {
        form.setAttribute("type", "password");
        icon.classList.remove("fa-eye-slash");
        icon.classList.add("fa-eye");
    }
});
