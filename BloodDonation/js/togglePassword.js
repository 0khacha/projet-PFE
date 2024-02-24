// Add this to your togglePassword.js file

document.addEventListener("DOMContentLoaded", function () {
    const passwordField = document.getElementById("password");
    const togglePassword = document.getElementById("togglePassword");

    togglePassword.addEventListener("click", function () {
        const type = passwordField.getAttribute("type") === "password" ? "text" : "password";
        passwordField.setAttribute("type", type);
        togglePassword.classList.toggle("fa-eye-slash");
    });
});
