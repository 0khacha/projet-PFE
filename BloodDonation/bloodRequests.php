<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'controllers/UserController.php';
    UserController::checkLoggedIn();
     // Check if the user is logged in
    UserController::handleButtonClick();  // Handle user button click actions
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bloodRequests.css" type="text/css" class="light-mode">
    <link rel="icon" href="image/logo.svg">
    <title>Request Blood - Donate. Just Do It MA</title>
</head>

<body id="body">
    <!-- Navigation -->
    <div id="header-placeholder"></div>
    <script src="js/header.js"></script>

    <!-- Blood Request Section -->
    <div class="blood-request-section2">
        <div class="content-container2">
            <div class="text-content2">
                <h2>Request Blood - Help Us Save Lives!</h2>
                <p>If you or someone you know is in need of blood, please fill out the form below. We will do our best to connect you with potential donors.</p>
                <?php
                if (isset($_GET['error'])) {
                    echo '<p style="color: red;">' . htmlspecialchars($_GET['error']) . '</p>';
                }
                
                if (isset($_GET['success'])) {
                    echo '<p style="color: green;">' . htmlspecialchars($_GET['success']) . '</p>';
                }
                ?>
                <!-- Blood Request Form -->
                <form id="bloodRequestForm" action="controllers/submit_request.php" method="post">
                    <label for="patientName">Patient's Name: *</label>
                    <input type="text" id="patientName" name="patientName" >

                    <label for="bloodType">Blood Type: *</label>
                    <select id="bloodType" name="bloodType" >
                        <option value="none">unknonw</option>
                        <option value="A+">A+</option>
                        <option value="A-">A-</option>
                        <option value="B+">B+</option>
                        <option value="B-">B-</option>
                        <option value="AB+">AB+</option>
                        <option value="AB-">AB-</option>
                        <option value="O+">O+</option>
                        <option value="O-">O-</option>
                    </select>

                    <label for="urgency">Urgency: *</label>
                    <select id="urgency" name="urgency" >
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>

                    <label for="patientName">City: *</label>
                    <input type="text" id="CityName" name="CitytName" >

                    <label for="hospital">Hospital Name:</label>
                    <input type="text" id="hospital" name="hospital" >

                    <label for="contact">Contact Information: *</label>
                    <input type="text" id="contact" name="contact" placeholder="Email/Phone" >

                    <button class="donate-link" type="submit">Submit Request</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>

    <script src="js/dark-mode.js"></script>
</body>
</html>
