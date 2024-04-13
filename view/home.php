<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather App</title>
    <link rel="stylesheet" href="../css/Weather.css">
</head>

<body>
    <div class="container">
        <div class="search-bar">
            <div class="top-bar">
                <div class="top-bar-links">
                    <a href="./FunFactpage.php">Funfact</a>
                    <a href="./contact.php">Contact</a>
                    <a href="./user_profile.php">Profile</a>
                </div>
                <div class="sign-out">
                    <a href="./signout.php">Sign Out</a>
                </div>
            </div>
            <!-- Add id attribute to the form for easier selection -->
            <form class="search-form">
                <div class="search-weather">
                    <span class="fa-solid fa-search"></span>
                    <!-- Add id attribute to the input for easier selection -->
                    <input id="search-input" class="search-input" type="search" placeholder="Search for a City...">
                </div>
            </form>
            <div class="weather-unit">
                <span class="celsius">&#176C</span>
                <span class="farenheit">&#176F</span>
            </div>
        </div>
        <div class="body">
            <h1 class="city"></h1>
            <div class="datetime">
            </div>
            <div class="forecast"></div>
            <div class="icon">
            </div>
            <p class="temperature">
            </p>
            <div class="degree">
                <p>Min: 12&#176</p>
                <p>Max: 16&#176</p>
            </div>
        </div>

        <div class="weather-details">
            <div class="weather-card">
                <i class="fa-solid fa-temperature-full"></i>
                <div>
                    <p>Real Feel</p>
                    <p class="clear">18&#176</p>
                </div>
            </div>
            <div class="weather-card">
                <i class="fa-solid fa-droplet"></i>
                <div>
                    <p>Humidity</p>
                    <p class="humidity">18&#176</p>
                </div>
            </div>
            <div class="weather-card">
                <i class="fa-solid fa-wind"></i>
                <div>
                    <p>Wind</p>
                    <p class="wind">18&#176</p>
                </div>
            </div>
            <div class="weather-card">
                <i class="fa-solid fa-gauge-high"></i>
                <div>
                    <p>Pressure</p>
                    <p class="pressure">18&#176</p>
                </div>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a692e1c39f.js" crossorigin="anonymous"></script>
    <!-- Update the JavaScript file path -->
    <script src="../JS/weatherapp.js"></script>
</body>

</html>
