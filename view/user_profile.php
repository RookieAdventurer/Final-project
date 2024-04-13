<?php
session_start();

// Check if session data is set
if (isset($_SESSION['id']) && isset($_SESSION['fname']) && isset($_SESSION['pp'])) {
    // Build the correct path for the profile image
    $profileImage = "../images/upload/" . $_SESSION['pp'];
    $firstName = $_SESSION['fname'];

    // Check if message is set in session
    if (isset($_SESSION['message'])) {
        // Display the message
        echo "<script>alert('" . $_SESSION['message'] . "');</script>";
        // Unset the session variable to clear the message
        unset($_SESSION['message']);
    }
} else {
    // Redirect to login page if session data is not set
    header("Location: ./Login.php");
    exit;
}
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="../css/userProfile.css">
</head>
<body>
<header>
    <img src="../icons/blacklogo.png" alt="" style="height: 50px;">
    <label for="toggler" class="fas f=-bars"></label>
    <a href="" class="logo">Profile<span>.</span></a>
    <nav class="navbar">
        <a href="./home.php">home</a>
        <a href="./FunFactpage.php">Fun Facts</a>
        <a href="./contact.php">Contact</a>
        <a href="./signout.php">Signout</a>
    </nav>
</header>
<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="shadow w-350 p-3 text-center">
        <!-- Display profile picture -->
        <img src="<?php echo $profileImage; ?>" class="rounded-circle"  style="width: 200px; height: 200px;">
        <h3 class="display-4"> Hello, <?php echo $firstName; ?></h3>
        <a href="./editProfile.php" class="btn btn-primary">Edit Profile</a>
        <a href="./signout.php" class="btn btn-warning">Logout</a>
        <a href="./home.php" class="btn btn-success">Back</a>
    </div>
</div>
</body>
</html>
