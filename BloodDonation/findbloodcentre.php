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
  <link rel="stylesheet" href="css/find_blood.css">
  <link rel="icon" href="image/logo2.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <title>Find a Blood Center - Donate. Just Do It MA</title>
  <script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC1ej_S6l7pkeldI9xg09bjifi3_IqDbCQ&libraries=places,geometry" async></script>
</head>
<body id="body">

         
    <!-- Header -->
    <div id="header-placeholder"></div>
    <script src="js/header.js"></script>
          <div class="map-section">
            <div class="map-container">
              <div id="map"></div>
            </div>
            <div class="search-container">
              <div class="search-box">
                <h2>Find a blood Center</h2>
                <div class="search-bar" method="post" id="searchForm">
                  <label for="cityInput"></label>
                  <input type="text" placeholder="Enter your city or zip code.." name="search" id="cityInput">
                  <button  id="searchButton" onclick="searchCity()"><i class="fa fa-search"></i></button>
                  <button  id="locationButton" onclick="getUserLocation()"><i class="fa fa-location"></i></button>
                </div>
                <div class="Centres">
                <ul id="centerList"></ul>
                </div>
             </div>
            </div>
          </div>
          
  <div id="footer-placeholder"></div>
  <script src="js/footer.js"></script>
  <script src="js/dark-mode.js"></script>
  <script defer src="js/find_blood.js"></script>
</body>
</html>
