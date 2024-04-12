<?php
/*
$firstName = $_POST['fname'];
$lastName = $_POST['lname'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password
$profile = $_POST['pp'];
*/

$conn = new mysqli('localhost', 'root', '', 'weather');

// Database connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

    
    
    
    /*$stmt = $conn->prepare("INSERT INTO users (fname, lname, gender, email, password, pp) 
                            VALUES (?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssss", $firstName, $lastName, $gender, $email, $password, $profile);

    if ($stmt->execute()) {
        echo "Registration successful";
    } else {
        echo "Error: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}*/
?>
