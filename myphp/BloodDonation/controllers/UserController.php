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
        }
    }

    private static function handleDonate() {
        if (self::isLoggedIn()) {
            self::redirectTo("donate.html");
        } else {
            self::redirectTo("login.php");
        }
    }

    private static function handleRequest() {
        if (self::isLoggedIn()) {
            self::redirectTo("bloodRequests.php");
        } else {
            self::redirectTo("login.php");
        }
    }
}
?>
