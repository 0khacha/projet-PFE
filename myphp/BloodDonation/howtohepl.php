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
  <link rel="stylesheet" href="css/howtohelp.css">
  <link rel="icon" href="image/logo2.png">
  <title>How to Help - Donate. Just Do It MA</title>
</head>

<body id="body">

          <!-- Header Buttons and Dropdowns -->
          <div id="header-placeholder"></div>
          <script src="js/header.js"></script>

  <div class="how-to-help-content">
    <h1>How to Help</h1>
    <p>
      Thank you for your interest in supporting our cause. Your willingness to help is greatly appreciated.
      There are various ways you can contribute to make a positive impact on our community through blood donation.
    </p>

    <div class="help-options">
      <h2>1. Donate Blood</h2>
      <p>
        The most direct way to help is by donating blood. Every donation can save lives and make a significant difference.
        Learn more about the donation process and find a donation center near you.
      </p>
      <a href="howtodonate.html" class="cta-link">How to donate </a>

      <h2>2. Volunteer at Events</h2>
      <p>
        Another valuable way to contribute is by volunteering at blood donation events. Your time and effort can play a crucial role in organizing successful campaigns.
      </p>
      <a href="#" class="cta-link">Explore Volunteer Opportunities</a>

      <h2>3. Spread Awareness</h2>
      <p>
        Help us reach more people by spreading awareness about the importance of blood donation. Share our mission on social media, organize awareness campaigns, or educate your community.
      </p>

      <h2>4. Organize Fundraisers</h2>
      <p>
        Organize fundraising events to support our cause. The funds raised can contribute to organizing more blood donation drives, awareness campaigns, and community outreach programs.
      </p>

      <!-- Add more help options as needed -->
    </div>
  </div>
  <div id="footer-placeholder"></div>
  <script src="js/footer.js"></script>
  <script src="js/dark-mode.js"></script>
</body>

</html>
