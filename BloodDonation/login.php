<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/login.css">
  <!-- Add Font Awesome CDN for icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="icon" href="image/logo.svg">
  <title>Login/Register - Just Do It MA</title>
</head>

<body id="body">

    <div class="login-page">

        <div class="login-container">
            <a id="home-icon" href="index.php" title="Home"class="animated-button">
            <img src="icons/home.gif" alt="Home Icon">
            </a>
            <div class="login-image"><img src="image/login-image.svg" alt="login-image"></div>
            <div class="login-form">
            <h2>Welcome!</h2>
            <p id="form-switch-message">Login to your account</p>
            <div id="loginForm">
                <form method="POST" action="controllers/loginControler.php">
                    <div class="form__group">
                        <input type="text" id="username" name="username" placeholder=" "  class="form__field">
                        <label for="username" class="form__label"><i class="fas fa-user"></i> Username:</label>
                    </div>

                    <div class="form__group">
                            <input type="password" id="password" name="password" placeholder=" "  class="form__field">
                            <i class="fas fa-eye" id="togglePassword"></i>
                            <label for="password" class="form__label"><i class="fas fa-lock"></i> Password:</label>
                    </div>

                    <div class="form__group">
                <input type="checkbox" id="rememberMe" name="rememberMe" class="form__checkbox">
                <label for="rememberMe" class="form__label-checkbox">
                    <i class="fas fa-check"></i> Remember Me
                </label>
            </div>


                    <button type="submit" name="loginForm">Log in</button>
                </form>

                <p id="forgotPassword"><a href="#">Forgot Password?</a></p>
                
                <p id="switch-form-text">Don't have an account? <a href="#" onclick="switchForm()">Register here</a></p>
            </div>
            <div id="message-container">
            <?php
            session_start();
            if (isset($_SESSION['error_message'])) {
                echo '<span style="color: red;">' . $_SESSION['error_message'] . '</span>';
                unset($_SESSION['error_message']); // Clear the error message after displaying it
            } 
            ?>
            </div>
            <div id="registerForm" style="display: none;">
                <form method="POST" action="controllers/RegisterController.php">
                    <div class="form__group">
                        <input type="text" id="newUsername" name="newUsername"  class="form__field">
                        <label for="newUsername" class="form__label"><i class="fas fa-user"></i> New Username:</label>
                    </div>

                    <div class="form__group">
                        <input type="email" id="newEmail" name="newEmail"  class="form__field">
                        <label for="newEmail" class="form__label"><i class="fas fa-envelope"></i> Email/Phone:</label>
                    </div>

                    <div class="form__group">
                        <input type="password" id="newPassword" name="newPassword"  class="form__field">
                        <label for="newPassword" class="form__label"><i class="fas fa-lock"></i> New Password:</label>
                    </div>

                    <div class="form__group">
                        <input type="password" id="confirmPassword" name="confirmPassword"  class="form__field">
                        <label for="confirmPassword" class="form__label"><i class="fas fa-lock"></i> Confirm Password:</label>
                    </div>

                    <button type="submit" name="registerForm">Register</button>
                </form>

                <p id="switch-form-text">Already have an account? <a href="#" onclick="switchForm()">Login here</a></p>
            </div>
        </div>
    </div>
  <script src="js/togglePassword.js"></script>
  <script src="js/login.js"></script>

</body>

</html>
