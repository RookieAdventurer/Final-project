<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['fname'])) {
    include "../settings/connection.php";

    if (isset($_POST['id'], $_POST['fname'], $_POST['old_pp'])) {
        // Sanitize input data
        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $old_pp = mysqli_real_escape_string($conn, $_POST['old_pp']);
        $id = $_SESSION['id'];

        if (empty($fname)) {
            $em = "First name is required";
            $_POST['error'] = $em;
            header("Location: ../view/editProfile.php");
            exit;
        } elseif (empty($lname)) {
            $em = "Last name is required";
            $_POST['error'] = $em;
            header("Location: ../view/editProfile.php");
            exit;
        } else {
            // Check if a new profile picture is uploaded
            if (!empty($_FILES['pp']['name']) && $_FILES['pp']['error'] === UPLOAD_ERR_OK) {
                $img_name = $_FILES['pp']['name'];
                $tmp_name = $_FILES['pp']['tmp_name'];

                $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
                $img_ex_to_lc = strtolower($img_ex);
                $allowed_exs = array('jpg', 'jpeg', 'png');

                if (in_array($img_ex_to_lc, $allowed_exs)) {
                    $new_img_name = uniqid($fname, true) . '.' . $img_ex_to_lc;
                    $img_upload_path = '../images/upload/' . $new_img_name;

                    // Delete old profile pic
                    $old_pp_des = "../images/upload/$old_pp";
                    if (file_exists($old_pp_des) && unlink($old_pp_des)) {
                        move_uploaded_file($tmp_name, $img_upload_path);
                    } else {
                        move_uploaded_file($tmp_name, $img_upload_path);
                    }

                    // Update the Database
                    $sql = "UPDATE users SET fname=?, lname=?, pp=? WHERE id=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->execute([$fname, $lname, $new_img_name, $id]);
                    $_SESSION['fname'] = $fname;
                    // After successfully updating the profile picture, update the session variable
                    $_SESSION['pp'] = $new_img_name;

                    $_POST['success'] = "Your account has been updated successfully";
                    header("Location: ../view/user_profile.php");
                    exit;
                } else {
                    $em = "You can't upload files of this type";
                    $_POST['error'] = $em;
                    header("Location: ../view/editProfile.php");
                    exit;
                }
            } else {
                // Update the Database without changing the profile picture
                $sql = "UPDATE users SET fname=?, lname=? WHERE id=?";
                $stmt = $conn->prepare($sql);
                $stmt->execute([$fname, $lname, $id]);
                $_SESSION['fname'] = $fname;
                $_POST['success'] = "Your account has been updated successfully";
                header("Location: ../view/editProfile.php");
                exit;
            }
        }
    } else {
        $_POST['error'] = "Error occurred!";
        header("Location: ../view/editProfile.php");
        exit;
    }
} else {
    header("Location: ../view/Login.php");
    exit;
}
?>
