<?php
session_start();

if (isset($_POST['updateProfile'])) {
    $newUsername = $_POST['newUsername'];
    $newPassword = $_POST['newPassword'];
    $confirmPassword = $_POST['confirmPassword'];
    $previousPassword = $_POST['previousPassword'];
    $email = $_POST['email'];

    if (empty($newUsername) || empty($previousPassword) || empty($email)) {
        $_SESSION['errorMessage'] = "All fields are required!";
    } elseif ($newPassword !== $confirmPassword) {
        $_SESSION['errorMessage'] = "New Password and Confirm Password do not match!";
    } else {
        $result = updateProfile($newUsername, $newPassword, $previousPassword, $email);

        if ($result === "Profile updated successfully!") {
            $_SESSION['successMessage'] = $result;
        } else {
            $_SESSION['errorMessage'] = "Error updating profile: " . $result;
        }
    }
}

function isUsernameTaken($username) {
    include "db_connection.php";

    $sql = "SELECT username FROM users WHERE username = :username";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $result !== false;
}

function updateProfile($newUsername, $newPassword, $previousPassword, $email) {
    include "db_connection.php";

    try {
        $userId = $_SESSION['user_id'];
        $user = getUserById($userId);

        if ($user) {
            // Verify the provided previous password if a new password is set
            if (!empty($newPassword) && !password_verify($previousPassword, $user['password_hash'])) {
                return "Previous password is incorrect. Profile not updated.";
            }

            // Construct the update query based on whether a password or email update is needed
            $updateSql = "UPDATE users SET ";
            $updateParams = [];

            if (!empty($newPassword)) {
                $hashedNewPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                $updateSql .= "password_hash = :newPassword, ";
                $updateParams[':newPassword'] = $hashedNewPassword;
            }

            if (!empty($email)) {
                $updateSql .= "email = :email, ";
                $updateParams[':email'] = $email;
            }

            if (!empty($newUsername)) {
                $updateSql .= "username = :newUsername, ";
                $updateParams[':newUsername'] = $newUsername;
            }

            // Remove trailing comma from the query
            $updateSql = rtrim($updateSql, ", ");

            // Update the record where user ID matches the session user ID
            $updateSql .= " WHERE id = :userId";
            $updateParams[':userId'] = $userId;

            // Perform the update
            $updateStmt = $pdo->prepare($updateSql);
            $updateStmt->execute($updateParams);

            return "Profile updated successfully!";
        } else {
            return "User not found. Profile not updated.";
        }
    } catch (PDOException $e) {
        return "Error updating profile: " . $e->getMessage();
    }
}
function getUserById($userId) {
    include "db_connection.php";

    $sql = "SELECT id, username, password_hash FROM users WHERE id = :userId";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':userId', $userId, PDO::PARAM_INT);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $stmt->closeCursor();

    return $user;
}

// ... (Other functions like getUserById and db_connection.php)

// Redirect to the appropriate page based on the outcome
header('Location: ../profile.php');
exit();
?>
