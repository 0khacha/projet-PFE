<?php
include 'UserController.php';
UserController::checkLoggedIn();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $patientName = $_POST["patientName"];
    $bloodType = $_POST["bloodType"];
    $urgency = $_POST["urgency"];
    $city = $_POST["CitytName"]; // Note: Corrected the typo in the input name
    $hospital = $_POST["hospital"];
    $contact = $_POST["contact"];

    // Validate form data (you may add more validation as needed)
    if (empty($patientName) || empty($bloodType) || empty($urgency) || empty($city) || empty($contact)) {
        // Handle validation error, for example, redirect back to the form with an error message
        header("Location: ../bloodRequests.php?error=Please fill out all required fields");
        exit();
    }

    if (strpos($patientName, ' ') === false) {
      // Handle validation error, for example, redirect back to the form with an error message
      header("Location: ../bloodRequests.php?error=Patient name should contain at least two names");
      exit();
  }

    // Insert data into the database
    try {
        // Adjust these database connection details according to your setup
        include 'db_connection.php';
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare and execute the SQL query
        $stmt = $pdo->prepare("INSERT INTO blood_requests (patient_name, blood_type, urgency, city, hospital, contact) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$patientName, $bloodType, $urgency, $city, $hospital, $contact]);

        // Redirect to a success page or do other post-submission actions
        header("Location: ../bloodRequests.php?success=thank you your request has taken successfuly,we notify you with the details");
        exit();
    } catch (PDOException $e) {
        // Handle database error, for example, redirect back to the form with an error message
        header("Location: ../bloodRequests.php?error=Database error occurred");
        exit();
    }
} else {
    // If the form is not submitted through POST method, redirect to the form page
    header("Location: ../bloodRequests.php");
    exit();
}
?>
