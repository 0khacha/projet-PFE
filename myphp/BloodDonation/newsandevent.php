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
    <!-- Stylesheets and Scripts -->
    <link rel="stylesheet" href="css/newsandevent.css" type="text/css" class="light-mode">
    <link rel="icon" href="image/logo2.png">
    <title>Donate. Just Do It MA - News & Events</title>
</head>

<body id="body">

    <!-- Header -->
    <!-- Header Buttons and Dropdowns -->
    <div id="header-placeholder"></div>
    <script src="js/header.js"></script>

        <!-- News and Events Section -->
    <div class="news-events-section">
        <div class="content-container">
            <div class="text-content">
                <h1>Join Our Life-Saving Mission</h1>
                <p>
                    At Donate. Just Do It MA, we believe in the power of giving. Our community is fueled by the
                    selfless act of blood donation, transforming lives one drop at a time. We invite you to be a part of
                    our life-saving mission, where each contribution echoes hope and healing.
                </p>
                <p>
                    Discover the heartwarming stories of resilience, the milestones we've achieved together, and the
                    upcoming events that will shape our collective impact. Your support is not just a donation; it's a
                    lifeline for those in need.
                </p>

                <!-- Call to action button -->
                <div class="cta-container">
                    <a href="#upcoming-events" class="explore-link">Explore Upcoming Events</a>
                </div>
            </div>

            <!-- Image for the news and events section -->
            <div class="image-wrapper">
                <img class="donation-image" src="image/pexels-karolina-grabowska-5706029.jpg" alt="News and Events Image">
            </div>
        </div>
    </div>

    <!-- Upcoming Events Section -->
    <div class="news-section" id="upcoming-events">
        <h2>Upcoming Events</h2>
        <p>Your participation makes a difference. Join us in these upcoming events to make a bigger impact together.</p>
        <div class="content-container">

            

            <!-- Event Cards -->
            <div class="event-cards">
                <!-- Event 1 -->
                <div class="event-card">
                    <img src="image/download.png" alt="Event 1">
                    <h3>Community Blood Drive</h3>
                    <p>Date: [13/02/2024]<br> Time: [9:30 pm]<br> Location: [Ecole superieur de technologie]</p>
                </div>

                <!-- Event 2 -->
                <div class="event-card">
                    <img src="image/download.png" alt="Event 2">
                    <h3>Donor Appreciation Day</h3>
                    <p>Date: [17/04/2020]<br> Time: [8:00 AM]<br> Location: [Rabat]</p>
                </div>
                <div class="event-card">
                    <img src="image/download.png" alt="Event 2">
                    <h3>Donor Appreciation Day</h3>
                    <p>Date: [17/04/2020]<br> Time: [8:00 AM]<br> Location: [Rabat]</p>
                </div>
                
                
                <!-- Add more event cards as needed -->
            </div>
        </div>
    </div>

    <!-- News Section -->
    <div class="news-section">

            <h2>Latest News</h2>
            <p>Dive into the latest stories and updates from our blood donation community.</p>

            <!-- News Cards -->
            <div class="news-cards">
                <!-- News 1 -->
                <div class="news-card">
                    <img src="image/Moroccan-King-Mohammed-VI (1).jpg" alt="News 1">
                    <h3>King of Morocco visits earthquake patients at Marrakech, donates blood</h3>
                    <p>A video showed the king at the bedside of patients, ready to donate blood...</p>
                    <h5>Le Monde with AP<br> Published on September 12, 2023, at 11:00 pm (Paris), updated on September 13, 2023, at 8:26 am</h5>
                    <a href="https://www.lemonde.fr/en/le-monde-africa/article/2023/09/12/king-of-morocco-visits-earthquake-patients-at-marrakech-donating-blood_6133757_124.html" target="_blank" class="read-more-link">Read More</a>
                </div>

                <!-- News 2 -->
                <div class="news-card">
                    <img src="image/players.jpg" alt="News 2">
                    <h3>Moroccan football players donate blood in wake of deadly earthquake</h3>
                    <p>Morocco’s national football team donated blood to help earthquake victims...</p>
                    <h5>Anadolu staff, 09.09.2023 - Update: 09.09.2023</h5>
                    <a href="https://www.lemonde.fr/en/le-monde-africa/article/2023/09/12/king-of-morocco-visits-earthquake-patients-at-marrakech-donating-blood_6133757_124.html" target="_blank" class="read-more-link">Read More</a>
                </div>

                <!-- News 3 -->
                <div class="news-card">
                    <img src="image/people.jpeg" alt="News 1">
                    <h3>6,000 Bags of Blood Donated in One Day for Morocco Earthquake Victims</h3>
                    <p>Regional blood donation centers and civil society associations collected thousands of bags of blood...</p>
                    <h5>Ahmed Ntungwabona, Sep. 10, 2023 3:09 p.m.</h5>
                    <a href="https://www.moroccoworldnews.com/2023/09/357594/6-000-bags-of-blood-donated-in-one-day-for-morocco-earthquake-victims" class="read-more-link" target="_blank">Read More</a>
                </div>

                <!-- Add more news cards as needed -->

            
        </div>

        <!-- Stay in Touch Section -->
        <div class="stay-in-touch">
            <h2>Stay in Touch</h2>
            <p>Receive Text Messages from the Red Cross. Complete the form below to opt-in to receive text messages from the American Red Cross. We'll send you:</p>
            <ul>
                <li>Blood donation appointment reminders</li>
                <li>Updates on the blood supply</li>
                <li>Information on local promotions</li>
                <li>Important updates from the Red Cross</li>
            </ul>

            <!-- Subscribe Form -->
            <form action="#" method="post" class="subscribe-form">
                <button type="submit">SIGN UP NOW</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>
    <script src="js/dark-mode.js"></script>
</body>

</html>
