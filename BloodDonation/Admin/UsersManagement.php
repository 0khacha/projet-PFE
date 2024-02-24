<?php
// Your database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a delete request is made
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'deleteUser') {
    // Get user ID from POST data
    $userId = $_POST['userId'];

    // Delete the user from the database
    $deleteSql = "DELETE FROM users WHERE id = ?";
    $deleteStmt = $conn->prepare($deleteSql);
    $deleteStmt->bind_param("i", $userId);

    if ($deleteStmt->execute()) {
        echo "User deleted successfully";
    } else {
        echo "Error deleting user: " . $conn->error;
    }

    // Close the database connection and exit
    $conn->close();
    exit();
}

// Fetch users from the database
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Close the database connection
$conn->close();

// Return user data as JSON
echo json_encode($result->fetch_all(MYSQLI_ASSOC));
?>
