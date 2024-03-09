<?php
session_start();

include '../controllers/db_connection.php';

function validateInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $center_name = validateInput($_POST['center_name']);
    $address = validateInput($_POST['address']);
    $city = validateInput($_POST['city']);
    $zip_code = validateInput($_POST['zip_code']);
    $phone_number = validateInput($_POST['phone_number']);
    $email = validateInput($_POST['email']);

    // Check for empty fields
    if (empty($center_name) || empty($address) || empty($city) || empty($zip_code) || empty($phone_number) || empty($email)) {
        $_SESSION['error'] = "Please fill in all required fields";
        header("Location: profile.php");
        exit();
    }
   
    $user_id = $_SESSION['user_id']; // Assuming 'id' is the key in the users table
    // Output user_id

    try {
        $pdo->beginTransaction();

        // Check if the user has a corresponding center in the blood_center table
        $check_stmt = $pdo->prepare("SELECT * FROM blood_center WHERE user_id = :user_id");
        $check_stmt->bindParam(':user_id', $user_id);
        $check_stmt->execute();
        $existing_center = $check_stmt->fetch(PDO::FETCH_ASSOC);

        if ($existing_center) {
            // If the user already has a center, update it
            $update_stmt = $pdo->prepare("UPDATE blood_center SET center_name = :center_name, address = :address, city = :city, zip_code = :zip_code, phone_number = :phone_number, email = :email, registration_date = NOW() WHERE user_id = :user_id");
            $update_stmt->bindParam(':center_name', $center_name);
            $update_stmt->bindParam(':address', $address);
            $update_stmt->bindParam(':city', $city);
            $update_stmt->bindParam(':zip_code', $zip_code);
            $update_stmt->bindParam(':phone_number', $phone_number);
            $update_stmt->bindParam(':email', $email);
            $update_stmt->bindParam(':user_id', $user_id);
            $update_stmt->execute();
        } else {
            // If the user doesn't have a center, insert a new record
            $insert_stmt = $pdo->prepare("INSERT INTO blood_center (user_id, center_name, address, city, zip_code, phone_number, email, registration_date) VALUES (:user_id, :center_name, :address, :city, :zip_code, :phone_number, :email, NOW())");
            $insert_stmt->bindParam(':user_id', $user_id);
            $insert_stmt->bindParam(':center_name', $center_name);
            $insert_stmt->bindParam(':address', $address);
            $insert_stmt->bindParam(':city', $city);
            $insert_stmt->bindParam(':zip_code', $zip_code);
            $insert_stmt->bindParam(':phone_number', $phone_number);
            $insert_stmt->bindParam(':email', $email);
            $insert_stmt->execute();
        }

        $pdo->commit();
        $_SESSION['success'] = "Center information inserted and updated successfully";
    } catch (PDOException $e) {
        $pdo->rollBack();
        $_SESSION['error'] = "Error updating/inserting center information: " . $e->getMessage();
    }

    header("Location: profile.php");
    exit();
}
?>
