<?php
session_start();

if (isset($_POST['email']) && isset($_POST['password'])) {
    include "../settings/connection.php"; // Include the connection file

    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        echo "Email and password are required. Please fill in all the fields.";
        exit;
    } else {
        $sql = "SELECT * FROM users WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email); // Bind parameters
        $stmt->execute();
        $result = $stmt->get_result(); // Get the result set
        
        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc(); // Fetch the user row as an associative array

            if (password_verify($password, $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['fname'] = $user['fname'];
                $_SESSION['pp'] = $user['pp'];

            
            } else {
                header("Location: ../view/index.php"); // Redirect to index page
                echo "Successfully created Logged in";
                exit;
            }
        } else {
           
            echo "Incorrect email or password. Please try again.";
            exit;
        }
    }
 } 

?>
