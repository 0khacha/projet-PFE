<?php
include 'db_connection.php';

class AdminController {
    
    public static function checkAdminRole() {
        // Start the session
        session_start();

        // Check if the user is an admin before allowing access to certain pages
        if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] !== 'admin') {
            // Redirect or show an error message
            header("Location: ../index.php");
            exit();
        }
    }
    public static function getComments() {
      global $pdo; // Use the global $pdo variable from db_connection.php

      // Assuming your comments table has columns: id, name, phone, email, comment
      $query = "SELECT id, name, phone, email, comment FROM comments";
      $result = $pdo->query($query);

      if ($result) {
          $comments = $result->fetchAll(PDO::FETCH_ASSOC);
          echo json_encode($comments);
      } else {
          echo json_encode(["error" => "Failed to fetch comments"]);
      }
  }
  
}


// ...
?>
