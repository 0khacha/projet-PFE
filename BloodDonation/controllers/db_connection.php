<?php
$host = 'localhost';
$db = 'donation';
$user = 'root';
$pass = ''; // Replace with your actual database password

$pdo = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($pdo, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Log or handle the error appropriately (don't display errors to users in production)
    die("Connection failed: " . $e->getMessage());
}
?>
