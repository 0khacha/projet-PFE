<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["bloodDonationForm"])) {
    include 'db_connection.php';

    // Assuming you have a unique identifier for the PDF, adjust the query accordingly
    $userID = $_SESSION['user_id'];

    $selectSql = "SELECT pdfContent FROM BloodDonationAppointment WHERE userID = :userID";
    $selectStmt = $pdo->prepare($selectSql);
    $selectStmt->bindParam(':userID', $userID);
    $selectStmt->execute();
    $result = $selectStmt->fetch(PDO::FETCH_ASSOC);

    if ($result && $result['pdfContent']) {
        $pdfContent = base64_encode($result['pdfContent']);

        $response = [
            'success' => true,
            'pdfContent' => $pdfContent,
        ];

        echo json_encode($response);
        exit();
    } else {
        $response = [
            'success' => false,
            'message' => 'PDF not found.',
        ];

        echo json_encode($response);
        exit();
    }
} else {
    $response = [
        'success' => false,
        'message' => 'Invalid request.',
    ];

    echo json_encode($response);
    exit();
}
?>
