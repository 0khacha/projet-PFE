<!DOCTYPE html>
<html lang="en">

<head>
    <?php
        include 'controllers/UserController.php';
        include 'controllers/BloodDriveController.php';

        UserController::handleButtonClick();  // Handle user button click actions

        $bloodDrives = array();

        // Check if the form has been submitted
        if (isset($_POST['searchBloodDrives'])) {
            $searchLocation = $_POST['location'];
            // Assuming getBloodDrivesByLocation() filters blood drives based on the user input
            $bloodDrives = BloodDriveController::getBloodDrivesByLocation($searchLocation);
        } else {
            // Default behavior, fetch all blood drives
            $bloodDrives = BloodDriveController::getBloodDrives();
        }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/findablooddrive.css" type="text/css" class="light-mode">
    <link rel="icon" href="image/logo.svg">
    <title>Find a Blood Drive - Donate. Just Do It MA</title>
</head>

<body id="body">

    <!-- Header -->
         <!-- Header Buttons and Dropdowns -->
         <div id="header-placeholder"></div>
         <script src="js/header.js"></script>

    <!-- Content Section -->
    <div class="content-containerr">
        <h1>Find a blood donation venue near you</h1>
        <p>Discover upcoming blood drives and join the cause. Your participation can save lives and make a significant impact on the community.</p>

            <!-- Search Form -->
            <form action="" method="post" class="search-form">
                <label for="location">Enter a town, city, or postcode </label>
                <input type="text" id="location" name="location" placeholder="City,  Zip" required>
                
                <button type="submit" class="donate-link" name="searchBloodDrives">Search</button>
            </form>




                    <!-- List of Blood Drives -->
                    <div class="blood-drive-list">
                        <?php
                        foreach ($bloodDrives as $drive) {
                            echo '<div class="blood-drive">';
                            echo '<h2>' . $drive["center_creator"] . '</h2>';
                            echo '<p>Date: ' . $drive["drive_date"] . '</p>';
                            echo '<p>Time: ' . $drive["drive_time"] . '</p>';
                            echo '<p>Location: ' . $drive["location"] . '</p>';
                            echo '<p>Description: ' . $drive["description"] . '</p>';
                            echo '<a href="#">Learn More</a>';
                            echo '</div>';
                        }
                        ?>
                    </div>


    </div>

    <!-- Footer -->
    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>
    <script src="js/dark-mode.js"></script>
    <script src="js/condition-display.js"></script>
</body>

</html>
