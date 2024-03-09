<?php
// getAppointments.php
include '../controllers/db_connection.php';

// Retrieve appointments from the database
$sql = "SELECT * FROM blooddonationappointment";
$stmt = $pdo->query($sql);

// Generate HTML for displaying appointments
$html = "";
if ($stmt->rowCount() > 0) {
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $html .= "<tr>
                    <td>" . $row['appointmentID'] . "</td>
                    <td>" . $row['userID'] . "</td>
                    <td>" . $row['fullName'] . "</td>
                    <td>" . $row['email'] . "</td>
                    <td>" . $row['phoneNumber'] . "</td>
                    <td>" . $row['gender'] . "</td>
                    <td>" . $row['age'] . "</td>
                    <td>" . $row['bloodType'] . "</td>
                    <td>" . $row['cityTown'] . "</td>
                </tr>";
    }
} else {
    $html .= "<tr><td colspan='9'>No appointments yet.</td></tr>";
}

// Send the HTML response
echo $html;
?>
