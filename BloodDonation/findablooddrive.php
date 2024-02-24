<!DOCTYPE html>
<html lang="en">

<head>
<?php
    include 'controllers/UserController.php';

    UserController::handleButtonClick();  // Handle user button click actions
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" class="light-mode">
    <link rel="icon" href="image/logo2.png">
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
        <form action="#" method="post" class="search-form">
            <label for="location">Enter a town, city or postcode </label>
            <input type="text" id="location" name="location" placeholder="City, State" required>

            <button type="submit">Search</button>
        </form>

        <!-- List of Blood Drives -->
        <div class="blood-drive-list">
            <div class="blood-drive">
                <h2>Blood Drive Title 1</h2>
                <p>Date: September 15, 2024</p>
                <p>Location: [City], [State]</p>
                <p>Time: 10:00 AM - 4:00 PM</p>
                <a href="#">Learn More</a>
            </div>
            <div class="blood-drive">
              <h2>Blood Drive Title 3</h2>
              <p>Date: September 15, 2024</p>
              <p>Location: [City], [State]</p>
              <p>Time: 10:00 AM - 4:00 PM</p>
              <a href="#">Learn More</a>
          </div>

            <div class="blood-drive">
                <h2>Blood Drive Title 3</h2>
                <p>Date: October 5, 2024</p>
                <p>Location: [City], [State]</p>
                <p>Time: 9:00 AM - 3:00 PM</p>
                <a href="#">Learn More</a>
            </div>

            <!-- Add more blood drives as needed -->
        </div>
    </div>

    <!-- Footer -->
    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>
    <script src="js/dark-mode.js"></script>
    <script src="js/condition-display.js"></script>
</body>

</html>
