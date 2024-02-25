<?php
header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Content-Security-Policy: default-src "none"');

include('../controllers/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'deleteUser') {
            include('deleteUser.php');
        } elseif ($_POST['action'] === 'updateUserType') {
            include('updateUserType.php');
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'getUserById') {
            include('getUserById.php');
        }
    }
}

$sql = "SELECT * FROM users";
$result = $pdo->query($sql);

$data = $result->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);
?>
