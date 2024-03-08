<?php
/*
session_start();
class UserController {
    public static function isLoggedIn() {
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'user') {
            // Redirect or show an error message for non-user roles
            header("Location: ../login.php");
            exit();
        }else
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
    }
    
    public static function getComments() {
        include 'db_connection.php';
        
        $stmt = $pdo->query("SELECT * FROM comments");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>
