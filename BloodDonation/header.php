<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    include 'controllers/UserController.php';
    ?>
<!-- Navigation for logged-in users -->

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/header-style.css">
</head>
<body>
  <?php if (UserController::isLoggedIn()): ?>
    <nav class="top-nav">
        <!-- ... (your existing logged-out navigation items) ... -->
        <a class="animated-button" href="index.php" title="Home">
           <img src="icons/home.gif" alt="Home Icon">
        </a>|
        <a class="animated-button" href="index.php" title="My Appointment">
           <img src="icons/calendar.gif" alt="calendar Icon">
        </a>|
        <a class="animated-button" href="#" title="My Notification">
           <img src="icons/notification.gif" alt="notification Icon">
        </a>|
        <a class="animated-button" href="howtohelp.php" litle="How to help">
            <img src="icons/help-center.gif" alt="help in Icon">
        </a>|
        <a class="animated-button" href="contactus.php" litle="Contact Us">
            <img src="icons/contact.gif" alt="contact in Icon">
         </a>|
        <nav class="language-btn" litle="Language">
            <img src="icons/language.svg" alt="language Icon">
        <!-- Language Dropdown -->
        <nav class="language-dropdown">
            <a href="?lang=en">English</a>
            <a href="?lang=ar">عربي</a>
            <a href="?lang=fr">Français</a>
        </nav>
        </nav>|
        <nav class="account-btn"  title=" My Account">
            <img src="icons/account.gif" alt="Account  Icon">
          <!-- account Dropdown -->
          <nav class="account-dropdown">
            <a href="profile.php">Setting</a>
            <a href="logout.php">Log out</a>
          </nav>
        </nav>
    </nav>
  <?php else: ?>
    <nav class="top-nav">
        <a class="animated-button" href="index.php" title="Home">
           <img src="icons/home.gif" alt="Home Icon">
        </a>|
        <a class="animated-button" litle="How to Help">
            <img src="icons/help-center.gif" href="howtohelp.php" alt="help in Icon">
        </a>|
        <a class="animated-button" href="contactus.php"litle="Contact Us">
            <img src="icons/contact.gif" alt="contact in Icon">
        </a>|
        <nav class="language-btn" litle="Language">
            <img src="icons/language.svg" alt="language Icon">
        <!-- Language Dropdown -->
        <nav class="language-dropdown">
            <a href="?lang=en">English</a>
            <a href="?lang=ar">عربي</a>
            <a href="?lang=fr">Français</a>
        </nav>
        </nav>|
        <a class="animated-button" href="login.php" litle="Sign In">
            <img src="icons/signin.svg" alt="sing in Icon">
        </a>
        
    </nav>

<?php endif; ?>
<form method="post">
  <div class="header-container">
    <a href="index.php">
      <nav class="logo-container">
          <img class="logo" src="image/logo.svg" alt="Blood Donation Logo">
      </nav>
    </a>
    <div class="buttons-container">
      <div class="header-dropdown" >
       <button type="submit" name="headerBtn" value="donateBlood" class="header-btn">Donate Blood</button>
        <div class="dropdown-content">
          <a href="learn.php#how-to-donate">How to donate </a>
          <a href="donate.php?action=donate" name="headerBtn" value="donateBlood">Donate</a>
        </div>
      </div>
      <div class="header-dropdown">
        <button type="submit" name="headerBtn" value="requestBlood" class="header-btn">Request Blood</button>
        <div class="dropdown-content">
            <a href="howtodonate.php">How to Request</a>
            <a href="bloodRequests.php?action=request" >Request</a>
        </div>
       
      </div>
    
  
      <div class="header-dropdown">
        <button class="header-btn"> Donation Center</button>
        <div class="dropdown-content">
          <a href="findbloodcentre.php">Find a Blood Center</a>
          <a href="findablooddrive.php">Find a Blood Drive</a>
          <a href="contactus.php">Our Center</a>
        </div>
      </div>
      <div class="header-dropdown">
        <button class="header-btn">Learn</button>
        <div class="dropdown-content">
          <a href="learn.php#why-donate">Why Donate</a>
          <a href="learn.php#who-can-donate">Who Can Donate</a>
          <a href="learn.php#how-to-donate">How to donate</a>
          <a href="learn.php#benefits">Benefits</a>
          <a href="learn.php#donation-process">Donation process</a>
          <a href="learn.php#myths-and-facts">myths & facts</a>
          <a href="learn.php#blood-types">Blood types</a>


        </div>
      </div>
      <div class="header-dropdown">
        <button class="header-btn">About Us</button>
        <div class="dropdown-content">
          <a href="#">Our Mission</a>
          <a href="#">Team</a>
          <a href="#">Impact</a>
        </div>
      </div>
      <div class="header-dropdown">
        <button class="header-btn">Get Involved</button>
        <div class="dropdown-content">
          <a href="#">Volunteer</a>
          <a href="#">Organize an Event</a>
        </div>
      </div>
    </div>
    <div class="dark-modee" onclick="toggleDarkMode();">
      <img class="darkmodeimage" src="icons/darkmode.png" alt="Dark Mode">
    </div>
  </div>
  </form>
</body>
</html>
  