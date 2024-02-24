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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/donate.css" type="text/css" class="light-mode">
    <link rel="icon" href="image/logo2.png">
    <title>Donate Blood - Blood Donation Organization</title>
</head>

<body id="body">

    <!-- Header Buttons and Dropdowns -->
    <div id="header-placeholder"></div>
    <script src="js/header.js"></script>

    <div class="map-section">
    <div id="map">
    <div class="container-wrapper">
      <div class="donation-conditions-section">
          <!-- Section header -->
          <div class="section-header">
              <h2>Blood Donation Conditions</h2>
              <p>Before you donate, please ensure you meet the following conditions:</p>
          </div>

          <!-- Condition sets -->
          <!-- Condition Set 1 -->
          <div class="condition-list" id="conditionSet1">
            <div class="condition-box">
              <div class="icon-box">
                <img src="icons/lose-weight.png" alt="Weight Icon">
              </div>
              <div class="condition-info">
                <h3>Minimum Weight</h3>
                <p>The donor must weigh at least 50 kilograms.</p>
              </div>
            </div>
            <div class="condition-box">
              <div class="icon-box">
                <img src="icons/age.png" alt="Age Icon">
              </div>
              <div class="condition-info">
                <h3>Age Requirement</h3>
                <p>The donor's age should be between 18 and 65 years.</p>
              </div>
            </div>
            <div class="condition-box">
              <div class="icon-box">
                <img src="icons/healthcare.png" alt="Health Icon">
              </div>
              <div class="condition-info">
                <h3>Good Health</h3>
                <p>The donor must be in good health at the time of blood donation.</p>
              </div>
            </div>
          
            <div class="condition-box">
              <div class="icon-box">
                <img src="icons/blood-cells.png" alt="Hemoglobin Icon">
              </div>
              <div class="condition-info">
                <h3>Hemoglobin Levels</h3>
                <p>Hemoglobin levels for men should be between 14-17 grams.</p>
              </div>
            </div>
          </div>

          <!-- Additional condition sets -->
          <!-- Condition Set 2 -->
          <div class="condition-list" id="conditionSet2" style="display: none;">
            <div class="condition-box">
              <div class="icon-box">
                <img src="icons/centigrade.png" alt="Temperature Icon">
              </div>
              <div class="condition-info">
                <h3>Body Temperature</h3>
                <p>The body temperature should not exceed 37 degrees Celsius.</p>
              </div>
            </div>
            <div class="condition-box">
              <div class="icon-box">
                <img src="icons/pulse.png" alt="Pulse Icon">
              </div>
              <div class="condition-info">
                <h3>Pulse Rate</h3>
                <p>The pulse rate should be between 50-100 beats per minute.</p>
              </div>
            </div>
            <div class="condition-box">
              <div class="icon-box">
                <img src="icons/blood-pressure.png" alt="Blood Pressure Icon">
              </div>
              <div class="condition-info">
                <h3>Blood Pressure</h3>
                <p>Blood pressure should be less than 120/80 mmHg.</p>
              </div>
            </div>
            <div class="condition-box">
              <div class="icon-box">
                <img src="icons/syringe.png" alt="Medication Icon">
              </div>
              <div class="condition-info">
                <h3>No Recent Medication</h3>
                <p>Avoid recent medication usage; please consult if unsure.</p>
              </div>
            </div>
            <!-- Add more conditions for Set 2 as needed -->
          </div>

          <!-- Additional condition sets can be added here -->

          <!-- Comment and consultation information -->
          <p class="p">
              If you have any questions or concerns about your eligibility to donate blood, please
              <a href="contactus.html">leave a comment</a> or consult with a medical professional.
          </p>
      </div>

      <!-- Condition navigation -->
      <div class="condition-navigation">
          <span class="handle handlePrevious active" onclick="showPreviousConditions()" tabindex="0"
              role="button" aria-label="Previous">
              <img class="indicator-icon icon-leftCaret" src="icons/fleche-gouche.png" alt="Weight Icon">
          </span>
          <span class="handle handleNext active" onclick="showNextConditions()" tabindex="0" role="button"
              aria-label="Next">
              <img class="indicator-icon icon-leftCaret" src="icons/fleche-droite.png" alt="Weight Icon">
          </span>
      </div>
  </div>
    </div>
    <div class="page-containerr">
       
        <div class="Appoinments-section">
            <h2>Schedule Your Blood Donation Appointment</h2>
            <p style="font: italic;">Fill out the form provided to schedule your blood donation appointment. Once completed, we will notify you about the nearest blood center or the date of a blood drive in your city.</p>
            <form class="donate-form">
                 <label for="fullname">Full name: *</label>
                <input type="fullname" id="email" placeholder="Ex : Mohamed Khabas" name="fullnmae" required>

                <label for="email">Email:</label>
                <input type="email" id="email" placeholder="name@domaine.com" name="email" required>

                <label for="phone">Phone Number:</label>
                <input type="tel" id="phone" placeholder="+212-612345678" name="phone" required>

                <label for="gender">Gender:</label>
                <select id="gender" name="gender" required>
                    <option value="male">Male</option>
                    <option value="female">Female</option>
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
 
                 <label for="previousDonations">Previous Donations: *</label>
                 <select id="previousDonations" name="previousDonations" required>
                                <option value="no">No</option>
                                <option value="yes">Yes</option>
                </select>

                 <label for="lastDonationDate">Last Donation Date:</label>
                 <input type="date" id="lastDonationDate" name="lastDonationDate" required>


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

                <button type="submit" class="donate-link">Submit Appointment</button>
            </form>
        </div>
    </div>
    </div>
    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>
    <script src="js/dark-mode.js"></script>
    <script src="js/condition-dispaly.js"></script>

</body>

</html>
