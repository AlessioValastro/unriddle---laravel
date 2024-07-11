document.addEventListener("DOMContentLoaded", () => {
    const formStatus = {
        username: false,
        email: false,
        password: false,
    };

    function jsonCheckUsername(json) {
        formStatus.username = !json.exists;
        const usernameElement = document.querySelector(".username");
        if (formStatus.username) {
            usernameElement.classList.remove("errorj");
            usernameElement.querySelector("span").textContent = "";
        } else {
            usernameElement.querySelector("span").textContent =
                "Nome utente già utilizzato";
            usernameElement.classList.add("errorj");
        }
    }

    function fetchResponse(response) {
        return response.json();
    }

    function checkUsername(event) {
        const input = event.currentTarget;
        if (!/^[a-zA-Z0-9_]{1,15}$/.test(input.value)) {
            input.parentNode.querySelector("span").textContent =
                "Sono ammesse lettere, numeri e underscore. Max. 15";
            input.parentNode.classList.add("errorj");
            formStatus.username = false;
        } else {
            fetch("signup/checkUsername/" + encodeURIComponent(input.value))
                .then(fetchResponse)
                .then(jsonCheckUsername);
        }
    }

    function jsonCheckEmail(json) {
        formStatus.email = !json.exists;
        console.log(formStatus);
        const emailElement = document.querySelector(".email");
        if (formStatus.email) {
            emailElement.classList.remove("errorj");
            emailElement.querySelector("span").textContent = "";
        } else {
            emailElement.querySelector("span").textContent =
                "Email già utilizzata";
            emailElement.classList.add("errorj");
        }
    }

    function checkEmail(event) {
        const emailInput = event.currentTarget;
        if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailInput.value)) {
            document.querySelector(".email span").textContent =
                "Email non valida";
            document.querySelector(".email").classList.add("errorj");
            formStatus.email = false;
        } else {
            fetch("/signup/checkEmail/" + encodeURIComponent(emailInput.value))
                .then(fetchResponse)
                .then(jsonCheckEmail);
        }
    }

    function checkPassword(event) {
        const passwordInput = event.currentTarget;
        formStatus.password = passwordInput.value.length >= 8;
        if (formStatus.password) {
            document.querySelector(".password").classList.remove("errorj");
            document.querySelector(".password span").textContent = "";
        } else {
            document.querySelector(".password").classList.add("errorj");
            document
                .querySelector(".password span")
                .classList.add("hidden-span");
        }
    }

    function checkSignup(event) {
        if (Object.values(formStatus).includes(false)) event.preventDefault();
    }

    document
        .querySelector(".username input")
        .addEventListener("blur", checkUsername);
    document.querySelector(".email input").addEventListener("blur", checkEmail);
    document
        .querySelector(".password input")
        .addEventListener("blur", checkPassword);
    document
        .querySelector(".get-started__left--login")
        .addEventListener("submit", checkSignup);
});
