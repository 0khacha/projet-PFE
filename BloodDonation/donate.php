<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include 'UserController.php';

    UserController::handleButtonClick();  // Handle user button click actions
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/donate.css" type="text/css" class="light-mode">
    <link rel="icon" href="image/logo2.png">
    <title>Donate Blood - Blood Donation Organization</title>
</head>

<body id="body">

    <!-- Header -->
    <!-- Header Buttons and Dropdowns -->
    <div id="header-placeholder"></div>
    <script src="js/header.js"></script>

    <div class="page-containerr">
        <div class="donate-section">
            <h2>Donate Blood</h2>
            <p style="font: italic;">Complete the form below to donate blood, and we'll notify you of the nearest blood center or the date of a blood drive in your city .</p>
            <form class="donate-form">
                <div class="form-row">
                    <div class="half-width">
                        <label for="firstName">First Name:</label>
                        <input type="text" id="firstName" name="firstName" required>
                    </div>
                    <div class="half-width">
                        <label for="lastName">Last Name:</label>
                        <input type="text" id="lastName" name="lastName" required>
                    </div>
                </div>

                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="name@domaine.com" name="email" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" placeholder="+212-612345678" name="phone" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
                    <option value="other">Other</option>
                </select>

                <label for="age">Age:</label>
                <input type="number" id="age" name="age" required>

                <label for="bloodType">Blood Type:</label>
                <select id="bloodType" name="bloodType" required>
                    <option value="A+">A+</option>
                    <option value="B+">B+</option>
                    <option value="O+">O+</option>
                    <option value="AB+">AB+</option>
                    <option value="A-">A-</option>
                    <option value="B-">B-</option>
                    <option value="O-">O-</option>
                    <option value="AB-">AB-</option>
                </select>

                <label for="cityTown">City/Town:</label>
                <input type="text" id="cityTown" name="cityTown" required>

                <div class="form-row">
                    <div class="half-width">
                        <label>Previous Donations:</label>
                        <br>
                        <label><input type="radio" name="previousDonations" value="yes" required> Yes</label>
                        <label><input type="radio" name="previousDonations" value="no" required> No</label>
                    </div>
                    <div class="half-width">
                        <label for="lastDonationDate">Last Donation Date:</label>
                        <input type="date" id="lastDonationDate" name="lastDonationDate" required>
                    </div>
                </div>

                <label for="healthConditions">Any Health Conditions or Medications:</label>
                <textarea id="healthConditions" name="healthConditions" placeholder="Enter details"></textarea>

                <label for="preferredContact">Preferred Contact Method:</label>
                <select id="preferredContact" name="preferredContact" required>
                    <option value="email">Email</option>
                    <option value="phone">Phone</option>
                </select>

                <label for="availability">Preferred Donation Time:</label>
                <input type="text" id="availability" name="availability" placeholder="E.g., Weekends, Evenings">

                <label for="donationFrequency">Preferred Donation Frequency:</label>
                <select id="donationFrequency" name="donationFrequency" required>
                    <option value="once">Once</option>
                    <option value="monthly">Monthly</option>
                    <option value="quarterly">Quarterly</option>
                    <option value="annually">Annually</option>
                </select>

                <label for="additionalComments">Additional Comments:</label>
                <textarea id="additionalComments" name="additionalComments" placeholder="Enter any additional comments"></textarea>

                <button type="submit">Donate Now</button>
            </form>
        </div>
    </div>
    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>
    <script src="js/dark-mode.js"></script>

</body>

</html>
