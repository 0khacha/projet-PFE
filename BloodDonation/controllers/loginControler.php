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

        $_SESSION['user_id'] = $user['id'];  // Set a session variable to indicate logged-in status
        $_SESSION['user_role'] = $user['usertype']; // Set the user's role in the session
        $redirectPage = isset($_SESSION['redirect_page']) ? $_SESSION['redirect_page'] : 'index.php';

        // Unset the redirect_page session variable
        unset($_SESSION['redirect_page']);

        header("Location: ../$redirectPage");
        exit();
    }
}

// Check if the user is an admin before allowing access to certain pages
?>
