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
    <link rel="stylesheet" href="css/learn.css" type="text/css" class="light-mode">
    <link rel="icon" href="image/logo.svg">
    <title>Learn. Just Do It MA</title>
</head>

<body id="body">
  <!-- Header -->
    <div id="header-placeholder"></div>
    <script src="js/header.js"></script>

    <section id="why-donate">
        <h2>Why Donate Blood?</h2>
        <br>
        <p>Donating blood is a selfless act that can make a significant impact on someone's life. Blood transfusions are crucial for various medical conditions, including surgeries, cancer treatments, trauma cases, and more. By donating blood, you become a lifesaver and contribute to community well-being.</p>
        <ul>
            <li>Helps save lives during emergencies and accidents.</li>
            <li>Supports patients undergoing surgeries and medical treatments.</li>
            <li>Provides blood for individuals with blood disorders and chronic diseases.</li>
        </ul>
    </section>

    <section id="who-can-donate">
        <h2>Who Can Donate?</h2>
        <br>
        <p>Most healthy adults are eligible to donate blood. Criteria may vary, so it's essential to check with your local blood donation center. Common eligibility requirements include:</p>
        <ul>
            <li>Age: Typically, donors must be at least 17 years old (or 16 with parental consent).</li>
            <li>Weight: Donors should weigh at least 110 pounds.</li>
            <li>Health: Donors must be in good general health with no recent illnesses or infections.</li>
        </ul>
       
    </section>

    <section id="how-to-donate">
        <h2>How to Donate</h2>
        <br>
        <p>Donating blood is a simple and safe process. Here's a step-by-step guide:</p>
        <ol>
            <li>Find a local blood donation center or mobile blood drive near you. Check their website or contact them for upcoming events.</li>
            <li>Schedule an appointment online or call to inquire about walk-in availability.</li>
            <li>Upon arrival, complete a brief health questionnaire to ensure eligibility.</li>
            <li>Undergo a quick physical examination, including a blood pressure check and hemoglobin test.</li>
            <li>The donation process typically takes 10-15 minutes. A trained phlebotomist will collect a unit of blood.</li>
            <li>After donation, rest for a short period and enjoy refreshments provided by the center.</li>
            <p>Remember to bring a valid ID and any required documentation. Wear comfortable clothing with sleeves that can be easily rolled up for the donation.</p>
        </ol>
     
    </section>

    <section id="benefits">
        <h2>Benefits of Donating Blood</h2>
        <br>
        <p>Aside from the satisfaction of helping others, donating blood offers potential health benefits to the donor:</p>
        <ul>
            <li><strong>Reduced risk of certain diseases:</strong> Regular blood donation may reduce the risk of cardiovascular diseases and certain cancers.</li>
            <li><strong>Enhanced well-being:</strong> The act of giving can boost your mood and contribute to an overall sense of well-being.</li>
            <li><strong>Health check:</strong> Before each donation, you'll receive a brief health check, including blood pressure and hemoglobin level assessments.</li>
        </ul>
    </section>

    <section id="donation-process">
        <h2>The Blood Donation Process</h2>
        <br>
        <p>The blood donation process is simple and typically follows these steps:</p>
        <ol>
            <li>Registration: Provide identification and complete a short questionnaire about your health and recent activities.</li>
            <li>Mini Health Check: A staff member will check your temperature, blood pressure, and hemoglobin levels to ensure you're eligible to donate.</li>
            <li>Donation: You'll be comfortably seated, and a phlebotomist will collect a unit of blood using a sterile needle. The process usually takes around 10-15 minutes.</li>
            <li>Refreshments: After donating, enjoy some snacks and beverages to help replenish your energy.</li>
            <li>Recovery: Spend a few minutes in the recovery area to ensure you're feeling well before leaving.</li>
        </ol>
    </section>

    <section id="myths-and-facts">
        <h2>Common Myths and Facts</h2>
        <br>
        <p>Let's dispel some common myths about blood donation:</p>
        <ul>
            <li><strong>Myth:</strong> Donating blood is painful.</li>
            <li><strong>Fact:</strong> The discomfort is minimal, similar to a brief pinch. Most donors experience no pain during the process.</li>

            <li><strong>Myth:</strong> I can contract diseases by donating blood.</li>
            <li><strong>Fact:</strong> Blood donation is a safe and sterile process. All equipment is single-use and disposed of after each donation.</li>

            <li><strong>Myth:</strong> I can't donate blood if I have tattoos or piercings.</li>
            <li><strong>Fact:</strong> Having tattoos or piercings does not disqualify you from donating blood, as long as the equipment used was sterile and the procedure was done in a licensed facility.</li>
            <p>Don't let myths deter you from making a life-saving contribution!</p>
        </ul>

    </section>

    <section id="blood-types">
        <h2>Understanding Blood Types</h2>
        <br>
        <p>There are four main blood types: A, B, AB, and O. Additionally, each blood type can be either Rh-positive or Rh-negative. Understanding your blood type is important for matching donations with recipients:</p>
        <ul>
            <li><strong>Type A:</strong> Can donate to A and AB; Can receive from A and O.</li>
            <li><strong>Type B:</strong> Can donate to B and AB; Can receive from B and O.</li>
            <li><strong>Type AB:</strong> Can donate to AB only; Can receive from A, B, AB, and O (universal recipient).</li>
            <li><strong>Type O:</strong> Can donate to A, B, AB, and O (universal donor); Can receive from O.</li>
            <p>Knowing your blood type helps blood banks ensure that donated blood is compatible with the needs of patients.</p>
        </ul>

    </section>

    <div id="footer-placeholder"></div>
    <script src="js/footer.js"></script>
    <script src="js/dark-mode.js"></script>
    <script src="js/displayBoxes.js"></script>
    

</body>

</html>
