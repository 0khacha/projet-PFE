<?php
// GetCommentsController.php

// Assuming you have a database connection
$servername = "hostname";
$username = "root";
$password = "";
$dbname = "donation";

$pdo = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($pdo->connect_error) {
    die("Connection failed: " . $pdo->connect_error);
}

// Retrieve comments from the database
$sql = "SELECT * FROM comments";
$result = $pdo->query($sql);

// Generate HTML for displaying comments
$html = "";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $html .= "<tr>
                    <td>" . $row['id'] . "</td>
                    <td>" . $row['name'] . "</td>
                    <td>" . $row['phone'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['comment'] . "</td>
                </tr>";
    }
} else {
    $html .= "<tr><td colspan='5'>No comments yet.</td></tr>";
}

// Send the HTML response
echo $html;

$pdo->close();
?>
