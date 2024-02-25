<?php
if (!isset($pdo)) {
    include('../controllers/db_connection.php');
}

// Validate and sanitize user input
$userId = filter_input(INPUT_GET, 'userId', FILTER_VALIDATE_INT);

if ($userId === false || $userId === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid user ID']);
    exit();
}

$selectSql = "SELECT * FROM users WHERE id = ?";
$selectStmt = $pdo->prepare($selectSql);
$selectStmt->bindParam(1, $userId, PDO::PARAM_INT);

try {
    $selectStmt->execute();
    $user = $selectStmt->fetch(PDO::FETCH_ASSOC);
    echo json_encode($user);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error fetching user: ' . $e->getMessage()]);
}

exit();
?>
