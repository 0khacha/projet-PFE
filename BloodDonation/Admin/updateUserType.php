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
    $pdo->beginTransaction(); // Start a transaction

    // Update user type
    $updateStmt->execute();

    // Check if the user type is 'center'
    if ($newUserType === 'center') {
        // Insert default values into the blood_center table
        $insertSql = "INSERT INTO blood_center (center_id,user_id,center_name, address, city, zip_code, phone_number, email, registration_date)
                      VALUES (?,? 'Default Center', 'Default Address', 'Default City', '12345', '123-456-7890', 'default@example.com', CURRENT_TIMESTAMP)";

        $insertStmt = $pdo->prepare($insertSql);
        $insertStmt->bindParam(1, $userId, PDO::PARAM_INT);
        $insertStmt->execute();
    }

    $pdo->commit(); // Commit the transaction

    echo json_encode(['success' => true, 'message' => 'User type updated successfully']);
} catch (PDOException $e) {
    $pdo->rollBack(); // Roll back the transaction on error
    echo json_encode(['success' => false, 'message' => 'Error updating user type: ' . $e->getMessage()]);
}

exit();
?>
