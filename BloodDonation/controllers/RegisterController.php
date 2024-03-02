<?php
session_start();
require_once 'db_connection.php';


if (isset($_POST["registerForm"])) {
    // Validate required fields and email format
    $newUsername = $_POST["newUsername"];
    $newEmail = $_POST["newEmail"];
    $newPassword = $_POST["newPassword"];
    $confirmPassword = $_POST["confirmPassword"];

    if (empty($newUsername) || empty($newEmail) || empty($newPassword) || empty($confirmPassword)) {
        $_SESSION['error_message'] = "All fields are required. Please fill out the complete form.";
        header("Location: ../login.php");
        exit();
    }

    if (!filter_var($newEmail, FILTER_VALIDATE_EMAIL)) {
        $_SESSION['error_message'] = "Invalid email format. Please enter a valid email address.";
        header("Location: ../login.php");
        exit();
    }

    // Enforce password strength
    if (strlen($newPassword) < 8 || !preg_match('/[A-Za-z]/', $newPassword) || !preg_match('/\d/', $newPassword)) {
        $_SESSION['error_message'] = "Password must be at least 8 characters long and contain both letters and numbers.";
        header("Location: ../login.php");
        exit();
    }

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
    } elseif (!$newPassword = $confirmPassword) {
        $_SESSION['error_message'] = "Passwords do not match. Please try again.";
        header("Location: ../login.php");
        exit();
    } else {
        // Assign a default role for new users
        $defaultRole = 'user';

        // Check if this is the first registered user to designate as admin
        $stmt = $pdo->prepare("SELECT COUNT(*) as userCount FROM users");
        $stmt->execute();
        $userCount = $stmt->fetch(PDO::FETCH_ASSOC)['userCount'];

        $role = ($userCount == 0) ? 'admin' : $defaultRole;

        // Insert new user into the database with the assigned role
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $pdo->prepare("INSERT INTO users (username, email, password_hash, usertype) VALUES (:username, :email, :password_hash, :usertype)");
        $stmt->bindParam(':username', $newUsername, PDO::PARAM_STR);
        $stmt->bindParam(':email', $newEmail, PDO::PARAM_STR);
        $stmt->bindParam(':password_hash', $hashedPassword, PDO::PARAM_STR);
        $stmt->bindParam(':usertype', $role, PDO::PARAM_STR);
        $stmt->execute();

        // Fetch the newly inserted user's information
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $newUsername, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_role'] = $user['usertype'];
        $redirectPage = isset($_SESSION['redirect_page']) ? $_SESSION['redirect_page'] : 'index.php';

        unset($_SESSION['redirect_page']);

        header("Location: ../$redirectPage");
        exit();
    }
}
?>
