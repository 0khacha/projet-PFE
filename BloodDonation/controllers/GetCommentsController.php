<?php
// GetCommentsController.php

include 'db_connection.php';

// Retrieve comments from the database
$sql = "SELECT * FROM comments";
$stmt = $pdo->query($sql);

// Generate HTML for displaying comments
$html = "";
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
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
?>
