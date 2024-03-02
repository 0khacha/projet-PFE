<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'controllers/UserController.php';
    UserController::checkLoggedIn();
    UserController::handleButtonClick();


    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/profile.css" type="text/css" class="light-mode">
    <link rel="icon" href="image/logo2.png">
    <title>My Account - Blood Donation</title>
</head>

<body id="body">
    <div id="header-placeholder"></div>
    <script src="js/header.js"></script>

    <div class="container">
        <?php
        // Assuming you have a function to retrieve user information from the database
        $userData = UserController::getUserData();

        if ($userData) {
            ?>
            <h1>Welcome, <?php echo $userData['username']; ?>!</h1>
            <form method="post" action="controllers/profileController.php" name="updateProfile">
            <?php
                    if (isset($_SESSION['successMessage'])) {
                        echo '<span style="color: green;">' . $_SESSION['successMessage'] . '</span>';
                        unset($_SESSION['successMessage']); // Clear the success message after displaying it
                    }

                    if (isset($_SESSION['errorMessage'])) {
                        echo '<span style="color: red;">' . $_SESSION['errorMessage'] . '</span>';
                        unset($_SESSION['errorMessage']); // Clear the error message after displaying it
                    }
              ?>
                <label for="newUsername">Username:</label>
                <input type="text" id="newUsername" name="newUsername" value="<?php echo $userData['username']; ?>" >
           
                <label for="newPassword">New Password:</label>
                <input type="password" id="newPassword" name="newPassword"  >

                <label for="confirmPassword">Conferme password:</label>
                <input type="password" id="confirmPassword" name="confirmPassword"  >

                <label for="previousPassword">Prevouis password:</label>
                <input type="password" id="previousPassword" name="previousPassword"  >


                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $userData['email']; ?>" >

                <input type="submit" name="updateProfile" class="donate-link" value="Update Profile">
            </form>
            <?php
        } else {
            echo "<p>Error retrieving user data.</p>";
        }
        ?>
    </div>
    <script src="js/dark-mode.js"></script>
    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>
</body>

</html>
