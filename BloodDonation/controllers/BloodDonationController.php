<?php
session_start();
include 'db_connection.php';

class BloodDonationController
{
    public static function handleAppointmentSubmission()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bloodDonationForm"])) {
            // Validation logic
            $validationResult = self::validateForm($_POST);
            if ($validationResult !== true) {
                $_SESSION['error_message'] = $validationResult;
                header("Location: ../donate.php");
                exit();
            }

            // Data is valid, proceed with insertion
            self::insertDataIntoDatabase($_POST);
        } else {
            echo "Invalid request method.";
        }
    }

    private static function validateForm($postData)
    {
        // Validate Full Name
        if (empty($postData["fullName"])) {
            return "Full name is required.";
        }
        if (strpos($postData["fullName"], ' ') === false) {
            // Handle validation error, for example, redirect back to the form with an error message
            return "Patient name should contain at least two names";

        }

        // Validate Email
        if (empty($postData["email"])) {
            return "Email is required.";
        } elseif (!filter_var($postData["email"], FILTER_VALIDATE_EMAIL)) {
            return "Invalid email format.";
        }

        // Validate Phone Number
        if (empty($postData["phone"])) {
            return "Phone number is required.";
        }

        // Validate Age
        if (empty($postData["age"]) || !is_numeric($postData["age"]) || $postData["age"] < 18) {
            return "Invalid age. Age must be a number and at least 18.";
        }

        // Validate City/Town
        if (empty($postData["cityTown"])) {
            return "City/Town is required.";
        }

        // Validate Health Conditions
        if (empty($postData["healthConditions"])) {
            return "Health conditions are required.";
        }

        // Validate Last Donation Date if previous donations are selected
        if ($postData["previousDonations"] == "yes" && (empty($postData["lastDonationDate"]) || strtotime($postData["lastDonationDate"]) > time())) {
            return "Invalid last donation date.";
        }

        return true; // If all validation checks pass
    }private static function insertDataIntoDatabase($postData)
    {
        include 'db_connection.php';
        session_start();
        $userID = $_SESSION['user_id'];
    
        // Set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
        // Sanitize and validate data
        $validatedData = self::sanitizeAndValidateData($postData);
    
        // Prepare and execute the SQL statement
        $sql = "INSERT INTO BloodDonationAppointment (
            userID, fullName, email, phoneNumber, gender, age,
            bloodType, cityTown, bloodDonationCenter, previousDonations,
            lastDonationDate, healthConditions, preferredContact,
            availability, donationFrequency, additionalComments
        )
        VALUES (
            :userID, :fullName, :email, :phone, :gender, :age,
            :bloodType, :cityTown, :bloodDonationCenter, :previousDonations,
            :lastDonationDate, :healthConditions, :preferredContact,
            :availability, :donationFrequency, :additionalComments
        )";
    
    
        try {
            $stmt = $pdo->prepare($sql);
    
            // Bind parameters using validated data
            $stmt->bindParam(':userID', $userID);
            $stmt->bindParam(':fullName', $validatedData['fullName']);
            $stmt->bindParam(':email', $validatedData['email']);
            $stmt->bindParam(':phone', $validatedData['phone']);
            $stmt->bindParam(':gender', $validatedData['gender']);
            $stmt->bindParam(':age', $validatedData['age']);
            $stmt->bindParam(':bloodType', $validatedData['bloodType']);
            $stmt->bindParam(':cityTown', $validatedData['cityTown']);
            $stmt->bindParam(':bloodDonationCenter', $validatedData['bloodDonationCenter']);
            $stmt->bindParam(':previousDonations', $validatedData['previousDonations']);
            $stmt->bindParam(':lastDonationDate', $validatedData['lastDonationDate']);
            $stmt->bindParam(':healthConditions', $validatedData['healthConditions']);
            $stmt->bindParam(':preferredContact', $validatedData['preferredContact']);
            $stmt->bindParam(':availability', $validatedData['availability']);
            $stmt->bindParam(':donationFrequency', $validatedData['donationFrequency']);
            $stmt->bindParam(':additionalComments', $validatedData['additionalComments']);
    
            $stmt->execute();
    
            $_SESSION['success_message'] = "Your appointment has been taken successfully";
            header("Location: ../donate.php");
            exit();
        } catch (PDOException $e) {
            $_SESSION['error_message'] = "Error: " . $e->getMessage();
            header("Location: ../donate.php");
            exit();
        }
    }

    private static function sanitizeAndValidateData($postData)
    {
        // Sanitize and validate data as needed
        // For simplicity, you can use htmlspecialchars for sanitization
        foreach ($postData as $key => $value) {
            $postData[$key] = htmlspecialchars(trim($value));
        }

        return $postData;
    }
}

BloodDonationController::handleAppointmentSubmission();
?>
