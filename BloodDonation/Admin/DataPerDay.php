<?php
require_once '../controllers/db_connection.php';

if ($_GET['dataType'] === 'users') {
    $queryUsersPerDay = "
        SELECT DATE(registration_date) AS registration_day, COUNT(*) AS userCount
        FROM users
        GROUP BY registration_day
    ";

    $resultUsers = $pdo->query($queryUsersPerDay);
    $data['users'] = $resultUsers->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($data['users']);
} elseif ($_GET['dataType'] === 'appointments') {
    // Similar logic for appointments
    // ...
    $queryUsersPerDay = "
SELECT DATE(submissionDate) AS submit_day, COUNT(*) AS appoinmentCount
    FROM blooddonationappointment
    GROUP BY submit_day
";

$resultUsers = $pdo->query($queryUsersPerDay);
$data['blooddonationappointment'] = $resultUsers->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data['blooddonationappointment']);
} elseif ($_GET['dataType'] === 'requests') {
    // Similar logic for requests
    // ... 
    $queryUsersPerDay = "
    SELECT DATE(submission_time) AS requests_day, COUNT(*) AS requestsCount
    FROM blood_requests
    GROUP BY requests_day
";

$resultUsers = $pdo->query($queryUsersPerDay);
$data['blood_requests'] = $resultUsers->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($data['blood_requests']);
    
} else {
    // Handle invalid dataType parameter
    http_response_code(400); // Bad Request
    echo json_encode(['error' => 'Invalid dataType']);
}
?>
