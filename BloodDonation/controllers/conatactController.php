<?php

session_start();

// Assuming you have a database connection established
include 'db_connection.php';
// Function to sanitize and validate user input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = test_input($_POST["name"]);
    $phone = test_input($_POST["phone"]);
    $email = test_input($_POST["email"]);
    $comment = test_input($_POST["comment"]);

    // Validate data (add more validation as needed)
    if (empty($name) || empty($phone) || empty($email) || empty($comment)) {
        $_SESSION['error_message'] = "All fields are required. Please fill out the complete form.";
        header("Location: ../contactus.php");
        exit();
    } else {
        // Insert data into the database
        $sql = "INSERT INTO comments (name, phone, email, comment) VALUES ('$name', '$phone', '$email', '$comment')";
        $result = $pdo->exec($sql);
        if ($result !== FALSE) {
            $_SESSION['success_message'] = "Comment submitted successfully!";
            header("Location: ../contactus.php");
            exit();
        } else {
            $_SESSION['error_message'] = "Error: " . $sql . "<br>" ;
            header("Location: ../contactus.php");
            exit();
        }
    }
}

// Close the database connection


?>
