<?php
    $url = 'https://api.openweathermap.org/data/2.5/weather?q=Ilford&appid=27f3352033410ed9a692fe8ea4d60d0d&units=metric';
    // Get data from openweathermap and store in JSON object
    $data = file_get_contents($url);
    $json = json_decode($data, true);
    // Fetch required fields


    $fetched = date("Y-m-d H:i:s"); // now 
    $country = $json['sys']['country'];
    $city = $json['name'];
    $feels_like = $json['main']['feels_like'];
    $tem = $json['main']['temp'];
    $min_tem = $json['main']['temp_min'];
    $max_tem =$json['main']['temp_max'];
    $clouds = $json['clouds']['all'];
    $wind_speed = $json['wind']['speed'];
    $wind_deg = $json['wind']['deg'];
    $humidity = $json['main']['humidity'];
    $pressure = $json['main']['pressure'];
    $description = $json['weather'][0]['description'];
    $icon = $json['weather'][0]['icon'];
    $weather = $json['weather'][0]['main'];
     
    // Build INSERT SQL statement
    $insert = "INSERT INTO tbl_weather (w_fetched, w_country, w_city, w_feels_like, w_tem, w_min_tem, w_max_tem, w_clouds, w_wind_speed, w_wind_deg, w_humidity, w_pressure, w_weather, w_description, w_icon)
    VALUES('{$fetched}', '{$country}', '{$city}', '{$feels_like}', '{$tem}', '{$min_tem}', '{$max_tem}', '{$clouds}', '{$wind_speed}', '{$wind_deg}', '{$humidity}', '{$pressure}', '{$weather}', '{$description}','{$icon}')";

    // Run SQL statement and report errors
    global $mysqli;

    if (!$mysqli -> query($insert)) {
        echo("<h4>SQL error description: " . $mysqli -> error . "</h4>");
    }
?>