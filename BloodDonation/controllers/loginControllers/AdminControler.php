<?php

require_once '../db_connection.php';

// Check if the user is an admin before allowing access to certain pages
if ($_SESSION['user_role'] !== 'admin') {
    // Redirect or show an error message
    header("Location: ../../login.php");
    exit();
}

// Additional admin-specific logic can go here
// ...
