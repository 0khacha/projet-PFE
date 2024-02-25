<?php
if (!isset($pdo)) {
    include('../controllers/db_connection.php');
}

// Validate and sanitize user input
$userId = filter_input(INPUT_POST, 'userId', FILTER_VALIDATE_INT);
$newUserType = filter_input(INPUT_POST, 'newUserType', FILTER_SANITIZE_STRING);

if ($userId === false || $userId === null || $newUserType === null) {
    echo json_encode(['success' => false, 'message' => 'Invalid input']);
    exit();
}

$updateSql = "UPDATE users SET usertype = ? WHERE id = ?";
$updateStmt = $pdo->prepare($updateSql);
$updateStmt->bindParam(1, $newUserType, PDO::PARAM_STR);
$updateStmt->bindParam(2, $userId, PDO::PARAM_INT);

try {
    $updateStmt->execute();
    echo json_encode(['success' => true, 'message' => 'User type updated successfully']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error updating user type: ' . $e->getMessage()]);
}

exit();
?>
