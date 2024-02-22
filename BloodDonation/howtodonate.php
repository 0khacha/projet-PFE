<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include 'UserController.php';

  UserController::handleButtonClick();  // Handle user button click actions
  ?>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/howtodonate.css">
  <link rel="icon" href="image/logo2.png">
  <title>How to Donate - Donate. Just Do It MA</title>
</head>

<body id="body">

        <!-- Header Buttons and Dropdowns -->
        <div id="header-placeholder"></div>
        <script src="js/header.js"></script>


  <div class="blood-donation-section">
    <div class="content-container">
      <div class="text-content">
        <h1>How to Donate</h1>
        <p>
          Donating blood is a simple yet powerful way to make a positive impact on the lives of others. Follow these steps to contribute and save lives:
        </p>
        
        <ol>
          <li>Check your eligibility: Ensure that you meet the blood donation criteria, including age, weight, and overall health.</li>
          <li>Find a Donation Center: Locate a nearby blood donation center or mobile blood drive. Use our online tool to find the most convenient option for you.</li>
          <li>Schedule an Appointment: Call or use the online scheduling system to set up an appointment. This helps streamline the donation process and ensures a smooth experience.</li>
          <li>Prepare for Donation: On the day of your appointment, eat a healthy meal, stay hydrated, and bring a valid ID. Wear comfortable clothing with sleeves that can be easily rolled up.</li>
          <li>Complete the Screening: Upon arrival, you'll undergo a brief health screening to ensure it's safe for you to donate blood.</li>
          <li>Donate Blood: The donation process typically takes about 10-15 minutes. Afterward, enjoy a refreshment in the recovery area.</li>
          <li>Spread the Word: Encourage others to donate blood and raise awareness about the importance of this life-saving act.</li>
        </ol>
        
        <div class="cta-container">
          <button  href="findbloodcentre.html" class="donate-link">
            Find a Donation Center
          </button>
        </div>
      </div>
      <div class="image-wrapper">
        <img class="donation-image" src="image/pexels-karolina-grabowska-6629401.jpg" alt="Blood Donation Campaign">
      </div>
    </div>
  </div>

     <!-- Donation Conditions Section -->
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
    
    <!-- Footer -->
    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>
    <script src="js/dark-mode.js"></script>
    <script src="js/condition-dispaly.js"></script>
</body>

</html>