<?php
/* Start the session

session_start(); // Start the session

class AdminController extends UserController {
    public static function checkLoggedIn() {
        parent::checkLoggedIn(); // Call the parent method to check user role

        // Check if the user is an admin
        if ($_SESSION['user_role'] !== 'admin') {
            // Redirect or show an error message for non-admin roles
            header("Location: ../index.php");
            exit();
        }
    }

    public static function getComments() {
        include 'db_connection.php';

        // Use prepared statements to prevent SQL injection
        $stmt = $pdo->prepare("SELECT * FROM comments");
        $stmt->execute();

        // Fetch the results
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Other admin-specific methods can go here...
}
?>
