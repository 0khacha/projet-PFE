<?php
session_start();

// Unset all session variables
$_SESSION = array();

// Destroy the session
session_destroy();

// Redirect to a log-out success page or another location
header("Location: index.php"); // Replace with the desired page after log-out
exit();
?>
