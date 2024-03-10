function switchForm() {
  var loginForm = document.getElementById("loginForm");
  var registerForm = document.getElementById("registerForm");

  if (loginForm.style.display === "none") {
      loginForm.style.display = "block";
      registerForm.style.display = "none";
      document.getElementById("form-switch-message").textContent = "Login to your account";
  } else {
      loginForm.style.display = "none";
      registerForm.style.display = "block";
      document.getElementById("form-switch-message").textContent = "Create a new account";
  }
}
