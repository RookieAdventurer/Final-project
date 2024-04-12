<?php
session_start();

if (isset($_SESSION['id'])) {
    include "../settings/connection.php";

    $id = $_SESSION['id'];

    // Delete user's profile from the database
    $sql = "DELETE FROM users WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id]);

    // Check the number of affected rows
    $rowsAffected = $stmt->affected_rows;

    // Destroy session
    session_destroy();

    if($rowsAffected > 0) {
        // If deletion was successful, set success message
        $_SESSION['message'] = "User deleted successfully";
    } else {
        // If deletion failed, set error message
        $_SESSION['message'] = "Error deleting user";
    }

    // Redirect to user profile page
    header("Location: ../view/user_profile.php");
    exit;
} else {
    // If user is not logged in, redirect to login page
    header("Location: ../view/Login.php");
    exit;
}
?>

