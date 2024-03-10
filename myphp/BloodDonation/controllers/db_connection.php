<?php
$host = 'localhost';
$db = 'donation';
$user = 'root';
$pass = ''; // Replace with your actual database password

$dsn = "mysql:host=$host;dbname=$db;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // In a production environment, consider logging errors instead of displaying them
    die("Connection failed: " . $e->getMessage());
}
?>
