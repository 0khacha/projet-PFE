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
  <link rel="stylesheet" href="css/contactus.css">
  <link rel="icon" href="image/logo.svg">
  <title>Contact Us - Donate. Just Do It MA</title>
</head>

<body id="body">

  <div id="header-placeholder"></div>
  <script src="js/header.js"></script>

  <div class="blood-donation-section">
    <div class="content-container">
      <div class="text-content">
        <h1>Contact Us</h1>
        <p>
          If you have any questions, comments, or concerns, feel free to reach out to us using the information below.
        </p>
        
        <div class="contact-info">
          <p>Email: <a href="mailto:info@donatejustdoitma.com">info@donatejustdoitma.com</a></p>
          <p>Phone: +123 456 789</p>
          <p>Address: 123 Donation Street, Cityville, Country</p>
        </div>
        
        <div class="cta-comment">
          <a href="#comment-section" class="leave-comment">
            Leave a Comment
          </a>
        </div>
      </div>
      <div class="image-wrapper">
        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13761.027291067932!2d-9.5826708!3d30.4288207!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xdb3b6674285cab5%3A0xb135f19851cd5ea0!2z2KfZhNmF2LHZg9iyINin2YTYrNmH2YjZiiDZhNiq2K3Yp9mC2YYg2KfZhNiv2YU!5e0!3m2!1sen!2sma!4v1705545531286!5m2!1sen!2sma" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>

     <!-- Comment Section -->
     <div class="container-wrapper">
      <div class="donation-conditions-section" id="comment-section">
          <!-- Section header -->
          <div class="section-header">
              <h2>Leave a Comment</h2>
              <p>Share your thoughts with us!</p>
          </div>
<!-- Display success message -->
          <?php if (isset($_SESSION['success_message'])): ?>
                  <div style="color: green;"><?php echo $_SESSION['success_message']; ?></div>
                  <?php unset($_SESSION['success_message']); // Clear the session variable ?>
          <?php endif; ?>

              <!-- Display error message -->
          <?php if (isset($_SESSION['error_message'])): ?>
                  <div style="color: red;"><?php echo $_SESSION['error_message']; ?></div>
                  <?php unset($_SESSION['error_message']); // Clear the session variable ?>
          <?php endif; ?>

          <!-- Comment form -->
          <form action="controllers/conatactController.php" method="post" class="comment-form">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" >

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" >

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" >

            <label for="comment">Comment:</label>
            <textarea id="comment" name="comment" ></textarea>

            <button type="submit" >Submit Comment</button>
          </form>
          
      </div>
      
  </div>
    <!-- Footer -->
    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>
    <script src="js/dark-mode.js"></script>
    <script src="js/request-text-content.js"></script>
</body>

</html>
