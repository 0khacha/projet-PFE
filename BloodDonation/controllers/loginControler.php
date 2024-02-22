<?php
session_start(); // Start the session

require_once 'db_connection.php';

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

    // Check if a specific page was requested before login
    $redirectPage = isset($_SESSION['redirect_page']) ? $_SESSION['redirect_page'] : 'index.php';

    // Unset the redirect_page session variable
    unset($_SESSION['redirect_page']);

    header("Location: ../$redirectPage");
    exit();
}
 else {
        $_SESSION['error_message'] = "Invalid username or password. Please try again.";
        header("Location: ../login.php");
        exit();
    }
} elseif (isset($_POST["registerForm"])) {
    // Handle registration form submission
    $newUsername = $_POST["newUsername"];
    $newEmail = $_POST["newEmail"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    // Additional validation: Username should not contain spaces
    if (strpos($newUsername, ' ') !== false) {
        $_SESSION['error_message'] = "Username should not contain spaces. Please choose another.";
        header("Location: ../login.php");
        exit();
    }

    // Check if the username or email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
    $stmt->bindParam(':username', $newUsername, PDO::PARAM_STR);
    $stmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
    $stmt->execute();
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        if ($existingUser['username'] == $newUsername) {
            $_SESSION['error_message'] = "Username already exists. Please choose another.";
        } else {
            $_SESSION['error_message'] = "Email already exists. Please choose another.";
        }
        header("Location: ../login.php");
        exit();
    } elseif ($newPassword !== $confirmPassword) {
        $_SESSION['error_message'] = "Passwords do not match. Please try again.";
        header("Location: ../login.php");
        exit();
    } else {
        // Insert new user into the database
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash) VALUES (:username, :email, :password_hash)");
        $stmt->bindParam(':username', $newUsername, PDO::PARAM_STR);
        $stmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
        $stmt->bindParam(':password_hash', $hashedPassword, PDO::PARAM_STR);
        $stmt->execute();
        header("Location: ../index.php");
        exit();
    }
}
?>
