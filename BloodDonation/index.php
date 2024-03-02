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
    <link rel="icon" href="image/logo.svg">
    <title>Donate. Just Do It MA</title>
</head>

<body id="body">
  <!-- Header -->
    <div id="header-placeholder"></div>
    <script src="js/header.js"></script>

    <!-- Blood Donation Section -->
    <div class="blood-donation-section">
        <div class="content-container">
            
            <div class="text-content"> 
            <?php
                    $userData = UserController::getUserData();

                    if ($userData) {
                        $welcomeMessage =  $userData['username'] .",". "<br>Welcome to Gafus!";
                    } else {
                        $welcomeMessage = "Welcome to Gafus !";
                    }
             ?>

                    <h1><?php echo $welcomeMessage; ?></h1>
                <p>
                    Welcome to Gafus, our blood donation hub! Consider this your personal invitation to make a life-changing impact. Today, we encourage you to donate blood and be the lifeline someone desperately needs. Your generous contribution can mean the difference between life and death for those in medical emergencies, undergoing surgeries, or battling chronic illnesses.
                    <br> Remember, a single pint of your blood has the power to save up to three lives. It's a simple yet profound act that costs nothing but time and leaves an everlasting impact on others. Every drop counts, turning every donor into a hero. Your kindness, compassion, and selflessness create a ripple effect of hope and healing in our community.
                    <br> Together, let's make a difference, one donation at a time.
                </p>
                <!-- Call to action button -->
                <div class="cta-container">
                    <form method="post">
                        <button type="submit" name="donate" class="donate-link">Be a Lifesaver, Donate Now!</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Blood Request Section -->
    <div class="blood-request-section">
        <div class="request-content-container">

            <div class="request-text-content">
                <h1>A Call for Compassion: Urgent Blood Donation Appeal.</h1>
                <p>
                    If you or a loved one is urgently in need of blood, we empathize with the critical nature of your situation. Your appeal for blood is not merely a plea for assistance; it represents a call for compassion and community support. Each drop of donated blood holds the potential to be a lifeline for someone facing a critical condition, undergoing surgery, or bravely confronting a serious illness. We encourage you to reach out to local blood banks, hospitals, and community organizations to connect with generous individuals who are willing to donate. Together, we can make a substantial impact on the lives of those in need. Your request for blood serves as a poignant reminder that, in times of vulnerability, there is strength in unity, and the selfless act of donating blood can truly make a profound difference in someone's journey toward healing and recovery
                </p>
                <!-- Call to action button -->
            </div>
            <div class="request-image">
                <img src="image/reqex.svg" alt="">
                <div class="cta-container">
                    <form method="post">
                        <button type="submit" name="request" class="donate-link">Seek Lifesaving Blood Now!</button>
                    </form>
                </div>
            </div>
            
        </div>
    </div>

    <!-- Why Donate Blood Section -->
    <div class="why-donate-section">
        <img id="whyimage" src="icons/whydonateblood.svg" alt="why-donate-blood-image">
        <div class="why-content-container">
            <div class="reason-box">
                <div class="icon-box2">
                    <img src="icons/give-hope.svg" alt="Heart Icon">
                </div>
                <div class="reason-info">
                    <p>Save lives by donating blood.</p>
                </div>
            </div>
            <div class="reason-box">
                <div class="icon-box2">
                    <img src="icons/community-group-leader-2-svgrepo-com.svg" alt="Community Icon">
                </div>
                <div class="reason-info">
                    <p>Support your community.</p>
                </div>
            </div>
            <div class="reason-box">
                <div class="icon-box2">
                    <img src="icons/Red Minimalist Simple Love Logo.svg" alt="Health Icon">
                </div>
                <div class="reason-info">
                    <p>Receive personal health benefits.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Image and Statistics Section -->
    <div class="image-and-statistics-section">
        <div class="image-container">
            <img src="image/lastpart.svg" alt="Image Description">
        </div>
        <div class="statistics-section">
            <h2 class="statistics-title">A SMALL ACT, A BIG IMPACT</h2>
            <div class="statistics-container">
                <div class="statistic-box">
                    <div class="icon-box3">
                        <img src="icons/wave.svg" alt="Statistic 1 Icon">
                    </div>
                    <p class="statistic-number">25,000</p>
                    <p class="statistic-description">Lives Saved</p>
                </div>
                <div class="statistic-box">
                    <div class="icon-box3">
                        <img src="icons/bloodcentres.svg" alt="Statistic 2 Icon">
                    </div>
                    <p class="statistic-number">50+</p>
                    <p class="statistic-description">Donation Centers</p>
                </div>
                <div class="statistic-box">
                    <div class="icon-box3">
                        <img src="icons/community2-.svg" alt="Statistic 3 Icon">
                    </div>
                    <p class="statistic-number">10,000+</p>
                    <p class="statistic-description">Community Supporters</p>
                </div>
                <div class="statistic-box">
                    <div class="icon-box3">
                        <img src="icons/blood-united.svg" alt="Statistic 4 Icon">
                    </div>
                    <p class="statistic-number">15,000+</p>
                    <p class="statistic-description">Units Donated</p>
                </div>
            </div>
        </div>
    </div>
    <script src="js/request-text-content.js"></script>
    <!-- Footer -->
    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>
    <script src="js/dark-mode.js"></script>

</body>

</html>
