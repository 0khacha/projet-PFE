<?php
session_start();
class UserController {
    public static function isLoggedIn() {
        return isset($_SESSION['user_id']);
        
    }

    public static function redirectTo($page) {
        header("Location: $page");
        exit();
    }

    public static function handleButtonClick() {
        if (isset($_POST['donate'])) {
            self::handleDonate();
        } elseif (isset($_POST['request'])) {
            self::handleRequest();
        } elseif (isset($_POST['headerBtn']) && $_POST['headerBtn'] === 'requestBlood') {
            self::handleRequest();
        } elseif (isset($_POST['headerBtn']) && $_POST['headerBtn'] === 'donateBlood') {
            self::handleDonate();
        } elseif (isset($_GET['action']) && $_GET['action'] === 'donate') {
            self::handleDonate();
        }
    }
    
    public static function checkLoggedIn() {
        if (!self::isLoggedIn()) {
            // Redirect to the login page or any other page as needed
            self::redirectTo("login.php");
            exit();
        }
    }
    private static function handleDonate() {
      if (self::isLoggedIn()) {
          self::redirectTo("donate.php");
      } else {
          $_SESSION['redirect_page'] = "donate.php";
          self::redirectTo("login.php");
      }
  }

    private static function handleRequest() {
        if (self::isLoggedIn()) {
            self::redirectTo("bloodRequests.php");
        } else {
          $_SESSION['redirect_page'] = "bloodRequests.php";
            self::redirectTo("login.php");
        }
    }public static function getUserData() {
        if (self::isLoggedIn()) {
            // Assuming you have a database connection, replace these placeholders with your actual database details
            include "db_connection.php";
    
            // Assuming you have stored the user ID in a session after login
            $userId = $_SESSION['user_id'];
    
            // Replace 'users' with your actual table name
            $sql = "SELECT * FROM users WHERE id = :userId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':userId', $userId);
            $stmt->execute();
    
            $userData = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Close the database connection
            $pdo = null;
    
            return $userData ? $userData : false;
        } else {
            return false; // User not logged in
        }
    }
    
    
    public static function updateUserData($newUsername, $newEmail) {
        if (self::isLoggedIn()) {
            // Assuming you have a database connection, replace these placeholders with your actual database details
            include "db_connection.php";
    
            // Assuming you have stored the user ID in a session after login
            $userId = $_SESSION['user_id'];
    
            // Replace 'users' with your actual table name
            $sql = "UPDATE users SET username = '$newUsername', email = '$newEmail' WHERE id = '$userId'";
            
            if ($pdo->query($sql) === TRUE) {
                // Update successful
                return true;
            } else {
                // Update failed

                return false;
            }
        } else {
            return false; // User not logged in
        }
    }
    
}

?>
