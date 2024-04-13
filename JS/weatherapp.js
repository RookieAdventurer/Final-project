//state
let currentCity ="Accra";
let units = "metrics";

//City 
let city = document.querySelector(".city");
let datetime = document.querySelector(".datetime");
let forecast = document.querySelector('.forecast');
let temperature = document.querySelector(".temperature");
let icon = document.querySelector(".icon");
let degree = document.querySelector(".degree")
let clear = document.querySelector('.clear');
let humidity = document.querySelector('.humidity');
let wind = document.querySelector('.wind');
let pressure = document.querySelector('.pressure');

// Function to set the icon based on weather conditions
function setWeatherIcon(weatherMain) {
    let iconSrc;
    switch (weatherMain.toLowerCase()) {
        case "cloud":
            iconSrc = "icons/cloud.png";
            break;
        case "clear":
            iconSrc = "icons/clear.png";
            break;
        case "rain":
            iconSrc = "icons/rain.png";
            break;
        case "snow":
            iconSrc = "icons/snow.png";
            break;
        case "storm":
            iconSrc = "icons/storm.png";
            break;
        case "foggy":
            iconSrc = "icons/foggy.png";
            break;
        case "sunny":
            iconSrc = "icons/sun.png";
            break;
        default:
            iconSrc = "";
            break;
    }
    return iconSrc;
}

// search
document.querySelector(".search-form").addEventListener('submit', e => {
    let search = document.querySelector(".search-input");
    // prevent default action
    e.preventDefault();
    // change current city
    currentCity = search.value;
    // get weather forecast 
    getWeather();
    // clear form
    search.value = ""
})

// units
document.querySelector(".celsius").addEventListener('click', () => {
    if(units !== "metric"){
        // change to metric
        units = "metric"
        // get weather forecast 
        getWeather()
    }
})

document.querySelector(".farenheit").addEventListener('click', () => {
    if(units !== "imperial"){
        // change to imperial
        units = "imperial"
        // get weather forecast 
        getWeather()
    }
})


function convertTimeStamp(timestamp, timezone){
    const convertTimezone = timezone / 3600; // convert seconds to hours 

    const date = new Date(timestamp * 1000);
    
    const options = {
        weekday: "long",
        day: "numeric",
        month: "long",
        year: "numeric",
        hour: "numeric",
        minute: "numeric",
        timeZone: `Etc/GMT${convertTimezone >= 0 ? "-" : "+"}${Math.abs(convertTimezone)}`,
        hour12: true,
    }
    return date.toLocaleString("en-US", options)
   
}

//function that converts country code to name
function convertCountryCode(country){
    let regionNames = new Intl.DisplayNames(["en"], {type: "region"});
    return regionNames.of(country)
}


function getWeather() {
    const API_KEY = '324c26f7daf27b38a4af1dbe8fdb9415';

    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${currentCity}&appid=${API_KEY}&units=${units}`)
        .then(res => {
            if (!res.ok) {
                throw new Error('City not found');
            }
            return res.json();
        })
        .then(data => {
            city.innerText = `${data.name}, ${convertCountryCode(data.sys.country)}`;
            datetime.innerText = convertTimeStamp(data.dt, data.timezone); 
            forecast.innerText = `${data.weather[0].main}`;
            temperature.innerHTML = `${data.main.temp.toFixed()}&#176`;
            icon.innerHTML = `<img src="http://openweathermap.org/img/wn/${data.weather[0].icon}@4x.png" />`;
            degree.innerHTML = `<p>Min: ${data.main.temp_min.toFixed()}&#176</p><p>Max: ${data.main.temp_max.toFixed()}&#176</p>`;
            clear.innerHTML = `${data.main.feels_like.toFixed()}&#176`;
            humidity.innerText = `${data.main.humidity}%`;
            wind.innerText = `${data.wind.speed} ${units === "imperial" ? "mph" : "m/s"}`;
            pressure.innerText = `${data.main.pressure} hPa`;
        })
        .catch(error => {
            console.log("Error:", error);
            city.innerText = "Search results not found";
            // Clear other elements if needed
        });
}



