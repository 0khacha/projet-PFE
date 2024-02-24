<?php
header('Content-Type: application/json');
header('X-Content-Type-Options: nosniff');
header('X-Frame-Options: DENY');
header('Content-Security-Policy: default-src "none"');

include('../controllers/db_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] === 'deleteUser') {
            deleteUser($pdo);
        } elseif ($_POST['action'] === 'updateUserType') {
            updateUserType($pdo);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['action'])) {
        if ($_GET['action'] === 'getUserById') {
            getUserById($pdo);
        }
    }
}

$sql = "SELECT * FROM users";
$result = $pdo->query($sql);
// Fetch data as an associative array
$data = $result->fetchAll(PDO::FETCH_ASSOC);

// Output the data as JSON
echo json_encode($data);

// No need to explicitly close the PDO connection, as it will be closed automatically
// when the script finishes execution

function deleteUser($pdo) {
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
}

function updateUserType($pdo) {
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
}

function getUserById($pdo) {
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
}
?>
