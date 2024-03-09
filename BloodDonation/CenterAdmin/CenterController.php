<?php
session_start();

class CenterController {
  public static function isLoggedIn() {
    return isset($_SESSION['user_id']) && isset($_SESSION['user_role']) && $_SESSION['user_role'] === 'center';
}


    public static function redirectTo($page) {
        header("Location: $page");
        exit();
    }

    public static function handleButtonClick() {
        // Add button click handling logic specific to the CenterController
        // For example, handling 'addCenter', 'updateCenter', etc.
        // You can extend this method based on your application needs.
    }

    public static function checkLoggedIn() {
        if (!self::isLoggedIn()) {
            // Redirect to the login page or any other page as needed
            self::redirectTo("../login.php");
            exit();
        }
    }

    private static function handleAddCenter() {
        // Logic to handle adding a new center
    }

    private static function handleUpdateCenter() {
        // Logic to handle updating center information
    }

    public static function getCenterData() {
        if (self::isLoggedIn()) {
            // Assuming you have a database connection, replace these placeholders with your actual database details
            include "../controllers/db_connection.php";
    
            // Assuming you have stored the center ID in a session after login
            $centerId = $_SESSION['user_id'];;
    
            // Replace 'centers' with your actual table name for center data
            $sql = "SELECT * FROM blood_center WHERE user_id	 = :centerId";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':centerId', $centerId);
            $stmt->execute();
    
            $centerData = $stmt->fetch(PDO::FETCH_ASSOC);
    
            // Close the database connection
            $pdo = null;
    
            return $centerData ? $centerData : false;
        } else {
            return false; // Center not logged in
        }
    }

   
}
?>
