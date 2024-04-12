<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="../css/contact.css">
</head>
<body style="background-color: #171717;">
    <header>
        <img src="../icons/blacklogo.png" alt="" style="height: 50px;">
        <label for="toggler" class="fas fa-bars"></label>
        <a href="" class="logo">Contact Us<span>.</span></a>
        <nav class="navbar">
            <a href="./index.php">Home</a>
            <a href="./FunFactpage.php">Fun fact</a>
            <a href="./user_profile.php">Profile</a>
            <a href="./signout.php">Signout</a>
            <div class="icons">
                <a href="" class="fas fa-cloud"></a>
                <a href="" class="fas fa-tshirt"></a>
                <a href="" class="fas fa-phone"></a>
                <a href="" class="fas fa-user"></a>
            </div>
        </nav>
    </header>
    <div class="contact-container">
        <form action="https://api.web3forms.com/submit" method="POST" class="contact-left">
            <input type="hidden" name="access_key" value="e1f18c0e-4c94-4a98-8c40-e2aa3ac90a73">
            <input type="text" name="name" placeholder="Your name" class="contact-inputs" required>
            <input type="email" name="email" placeholder="Your email" class="contact-inputs" required>
            <textarea name="message" placeholder="Your message" class="contact-inputs" required></textarea>
            <button type="submit">Submit <img src="../icons/send.png" alt=""></button>
        </form>
        <div class="contact-right">
            <img src="../icons/contact-us.png" alt="">
        </div>
    </div>
</body>
</html>
