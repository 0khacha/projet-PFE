<?php

class BloodDonationController
{
    public static function handleAppointmentSubmission()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            self::validateAndInsertData();
        }
    }

    private static function validateAndInsertData()
    {
        $fullName = self::validateInput($_POST["fullname"]);
        $email = self::validateInput($_POST["email"]);
        $phone = self::validateInput($_POST["phone"]);
        $gender = self::validateInput($_POST["gender"]);
        $age = (int)self::validateInput($_POST["age"]);
        $bloodType = self::validateInput($_POST["bloodType"]);
        $cityTown = self::validateInput($_POST["cityTown"]);
        $bloodDonationCenter = self::validateInput($_POST["bloodDonationCenter"]);
        $previousDonations = self::validateInput($_POST["previousDonations"]);
        $lastDonationDate = self::validateInput($_POST["lastDonationDate"]);
        $healthConditions = self::validateInput($_POST["healthConditions"]);
        $preferredContact = self::validateInput($_POST["preferredContact"]);
        $availability = self::validateInput($_POST["availability"]);
        $donationFrequency = self::validateInput($_POST["donationFrequency"]);
        $additionalComments = self::validateInput($_POST["additionalComments"]);

        // Insert data into the database
        self::insertDataIntoDatabase(
            $fullName, $email, $phone, $gender, $age,
            $bloodType, $cityTown, $bloodDonationCenter, $previousDonations,
            $lastDonationDate, $healthConditions, $preferredContact,
            $availability, $donationFrequency, $additionalComments
        );
    }

    private static function validateInput($input)
    {
        // Perform any necessary validation or sanitization
        // For simplicity, you can enhance this based on your requirements
        return htmlspecialchars(trim($input));
    }

    private static function insertDataIntoDatabase(
        $fullName, $email, $phone, $gender, $age,
        $bloodType, $cityTown, $bloodDonationCenter, $previousDonations,
        $lastDonationDate, $healthConditions, $preferredContact,
        $availability, $donationFrequency, $additionalComments
    ) {
        // Include the database connection file
        include 'db_connection.php';
    
        session_start();
        $userID = $_SESSION['user_id'];
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Insert data into the BloodDonationAppointment table
        $sql = "INSERT INTO BloodDonationAppointment (
            userID, fullName, email, phoneNumber, gender, age,
            bloodType, cityTown, bloodDonationCenter, previousDonations,
            lastDonationDate, healthConditions, preferredContact,
            availability, donationFrequency, additionalComments
        )
        VALUES (
            $userID, '$fullName', '$email', '$phone', '$gender', $age,
            '$bloodType', '$cityTown', '$bloodDonationCenter', '$previousDonations',
            '$lastDonationDate', '$healthConditions', '$preferredContact',
            '$availability', '$donationFrequency', '$additionalComments'
        )";
    
        try {
            // Use prepared statement to prevent SQL injection
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            echo "New record created successfully";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}

BloodDonationController::handleAppointmentSubmission();

?>
