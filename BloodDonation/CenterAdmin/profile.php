<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'CenterController.php';
    $CenterData = CenterController::getCenterData();
    CenterController::checkLoggedIn();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modify Center Information</title>
</head>
<body>



    <h1>Modify Center Information</h1>

    <?php
    // Start the session

    // Check if there is a session error message
    if (isset($_SESSION['error'])) {
        echo '<div style="color: red;">' . $_SESSION['error'] . '</div>';
        unset($_SESSION['error']); // Clear the session error message
    }

    // Check if there is a session success message
    if (isset($_SESSION['success'])) {
        echo '<div style="color: green;">' . $_SESSION['success'] . '</div>';
        unset($_SESSION['success']); // Clear the session success message
    }
    ?>
    <form action="update_center.php" method="POST">
        <label for="center_name">Center Name:</label>
        <input type="text" id="center_name" name="center_name"value="<?php echo $CenterData['center_name']; ?>"><br><br>
        <?php
        if (isset($_SESSION['error_center_name'])) {
            echo '<div style="color: red;">' . $_SESSION['error_center_name'] . '</div>';
            unset($_SESSION['error_center_name']); // Clear the session error message
        }
        ?>
        
        <label for="address">Address:</label>
        <input type="text" id="address" name="address" value="<?php echo $CenterData['address']; ?>"><br><br>
        <?php
        if (isset($_SESSION['error_address'])) {
            echo '<div style="color: red;">' . $_SESSION['error_address'] . '</div>';
            unset($_SESSION['error_address']); // Clear the session error message
        }
        ?>
        
        <label for="city">City:</label>
        <input type="text" id="city" name="city"value="<?php echo $CenterData['city']; ?>"><br><br>
        <?php
        if (isset($_SESSION['error_city'])) {
            echo '<div style="color: red;">' . $_SESSION['error_city'] . '</div>';
            unset($_SESSION['error_city']); // Clear the session error message
        }
        ?>
        
        <label for="zip_code">Zip Code:</label>
        <input type="text" id="zip_code" name="zip_code" value="<?php echo $CenterData['zip_code']; ?>"><br><br>
        <?php
        if (isset($_SESSION['error_zip_code'])) {
            echo '<div style="color: red;">' . $_SESSION['error_zip_code'] . '</div>';
            unset($_SESSION['error_zip_code']); // Clear the session error message
        }
        ?>
        
        <label for="phone_number">Phone Number:</label>
        <input type="text" id="phone_number" name="phone_number"value="<?php echo $CenterData['phone_number']; ?>"><br><br>

        <?php
        if (isset($_SESSION['error_phone_number'])) {
            echo '<div style="color: red;">' . $_SESSION['error_phone_number'] . '</div>';
            unset($_SESSION['error_phone_number']); // Clear the session error message
        }
        ?>
        
        <label for="email">Email:</label>
        <input type="email" id="email" name="email"value="<?php echo $CenterData['email']; ?>"><br><br>
        <?php
        if (isset($_SESSION['error_email'])) {
            echo '<div style="color: red;">' . $_SESSION['error_email'] . '</div>';
            unset($_SESSION['error_email']); // Clear the session error message
        }
        ?>
        <input type="submit" value="Update Center Information">
    </form>
</body>
</html>
