<?php
session_start(); // Start the session

include 'db_connection.php';


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["loginForm"])) {
    // Handle login form submission
    $username = $_POST["username"];
    $password = $_POST["password"];

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Inside the login section after a successful login
    if ($user && password_verify($password, $user['password_hash'])) {
        $_SESSION['user_id'] = $user['id'];  // Set a session variable to indicate logged-in status
        $_SESSION['user_role'] = $user['usertype']; // Set the user's role in the session

        // Check if the user is an admin and redirect to the appropriate page
        if ($_SESSION['user_role'] === 'admin') {
            header("Location: ../Admin/adminDashboard.php");
            exit();
        } else {
            // Check if a specific page was requested before login
            $redirectPage = isset($_SESSION['redirect_page']) ? $_SESSION['redirect_page'] : 'index.php';

            // Unset the redirect_page session variable
            unset($_SESSION['redirect_page']);

            header("Location: ../$redirectPage");
            exit();
        }
    } else {
        $_SESSION['error_message'] = "Invalid username or password. Please try again.";
        header("Location: ../login.php");
        exit();
    }
} 


// Check if the user is an admin before allowing access to certain pages
?>