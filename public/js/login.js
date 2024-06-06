const iconn = document.getElementById("icon_reveal");

iconn.addEventListener("click", (e) => {
    e.preventDefault();
    const form = document.getElementById("password");
    const icon = document.getElementById("eye");

    if (form.getAttribute("type") === "password") {
        form.setAttribute("type", "text");
        icon.src = "/asset/icon/Eye-slash.svg";
    } else {
        form.setAttribute("type", "password");
        icon.src = "/asset/icon/Eye.svg";
    }
});

const inputUsername = document.getElementById("username");
const inputPassword = document.getElementById("password");
const button  = document.getElementById("button_login");

inputUsername.addEventListener("input", buttonColor);
inputPassword.addEventListener("input", buttonColor);

function buttonColor(){
    const username = inputUsername.value.trim();
    const password = inputPassword.value.trim();


    if(username !== "" && password !== ""){
        button.classList.remove("bg-neutral-05");
        button.classList.add("bg-blue-main");
    }else{
        button.classList.remove("bg-blue-main");
        button.classList.add("bg-neutral-05");
    }
}
