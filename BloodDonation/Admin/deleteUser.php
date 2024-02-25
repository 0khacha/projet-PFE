<?php
if (!isset($pdo)) {
    include('../controllers/db_connection.php');
}

// Validate and sanitize user input
$userId = filter_input(INPUT_POST, 'userId', FILTER_VALIDATE_INT);

if ($userId === false || $userId === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid user ID']);
    exit();
}

$deleteSql = "DELETE FROM users WHERE id = ?";
$deleteStmt = $pdo->prepare($deleteSql);
$deleteStmt->bindParam(1, $userId, PDO::PARAM_INT);

try {
    $deleteStmt->execute();
    echo json_encode(['success' => true, 'message' => 'User deleted successfully']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error deleting user: ' . $e->getMessage()]);
}

exit();
?>
