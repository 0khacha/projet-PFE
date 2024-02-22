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
}

?>
