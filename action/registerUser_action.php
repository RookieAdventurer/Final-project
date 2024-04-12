
<?php
session_start();

// Function to validate the password based on the defined policy
function validatePassword($password) {
    // Password length should be exactly 8 characters
    if (strlen($password) != 8) {
        return false;
    }

    // At least one uppercase letter
    if (!preg_match('/[A-Z]/', $password)) {
        return false;
    }

    // At least one lowercase letter
    if (!preg_match('/[a-z]/', $password)) {
        return false;
    }

    // At least one digit
    if (!preg_match('/\d/', $password)) {
        return false;
    }

    // At least one special character
    if (!preg_match('/[^A-Za-z0-9]/', $password)) {
        return false;
    }

    // All criteria met
    return true;
}

if (isset($_POST['submitform'])) {
    include '../settings/connection.php';

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $gender = $_POST['gender'];
    $pp = $_FILES['pp'];

    // Validate password
    if (!validatePassword($pass)) {
        echo "Password must be exactly 8 characters long and contain at least one uppercase letter, one lowercase letter, one number, and one special character.";
        exit; // Add exit statement here
    }
    
    // Hash the password
    $pass = password_hash($pass, PASSWORD_DEFAULT);

    // Handle profile picture upload
    $pp_name = $pp['name'];
    $pp_tmp_name = $pp['tmp_name'];
    $pp_error = $pp['error'];
    

    if ($pp_error === UPLOAD_ERR_OK) {
        // Move the uploaded file to the desired location
        $img_ex = pathinfo($pp_name, PATHINFO_EXTENSION);
        $img_ex_to_lc = strtolower($img_ex);

        $allowed_exs = array('jpg', 'jpeg', 'png');
        if (in_array($img_ex_to_lc, $allowed_exs)) {
            $new_img_name = uniqid($fname, true) . '.' . $img_ex_to_lc;
            $img_upload_path = '../images/upload/' . $new_img_name;

            if (move_uploaded_file($pp_tmp_name, $img_upload_path)) {
                // File uploaded successfully, proceed with database insertion
                $sql = "INSERT INTO users (fname, lname, email, password, gender, pp) 
                    VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                if ($stmt->execute([$fname, $lname, $email, $pass, $gender, $new_img_name])) {
                    $_SESSION['pp'] = $new_img_name; // Store file path in session
                    // Registration successful, trigger message and redirect
                    echo "Registration Successful. Your account has been created successfully!";
                    header("Location: ../view/Login.php");
                    exit;
                } else {
                    // Failed to execute query
                    echo "Failed to register user.";
                    exit;
                }
            } else {
                // Failed to move uploaded file
                echo "Failed to upload file.";
                exit;
            }
        } else {
            // Invalid file type
            echo "You can't upload files of this type.";
            exit;
        }
    } else {
        // Error occurred during file upload
        echo "Error occurred while uploading the file.";
        exit;
    }
} else {
    // Form submission not detected
    echo "Form submission not detected.";
    exit;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>