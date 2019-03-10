<?php session_start() ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>PhPDataApp</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<?php if ($_SESSION['isLoggedIn'] == true) { ?>
<body>
    <?php 
        $queryString = "http://api.openweathermap.org/data/2.5/weather?zip=" . $_SESSION['currentZip'] . ",us&appid=" . "f8bdb2e9d84e8f303c5bdd245ea9105d&units=imperial";
        $response = file_get_contents($queryString);
        $parsed = json_decode($response, true);
        $currentTemp = $parsed['main']['temp'];
        $currentStatus = $parsed['weather'][0]['description'];
        $currentHigh = $parsed['main']['temp_max'];
        $location = $parsed['name'];
    ?>
    <div class="container">
        <p><a href="traffic.php">Traffic Data</a></p>
        <h1>Hi <?php echo $_SESSION['currentUser']?>! Here is the weather for <?php echo $location?>.  </h1>
        <p>Current temp: <?php echo $currentTemp ?> </p><br/>
        <p>Current Weather Description: <?php echo $currentStatus ?> </p><br/>
        <p>High Temp for today: <?php echo $currentHigh ?> </p><br/>
    </div>
    <script src=""></script>
</body>
<?php } else { ?>
<body>
Looks like you're not logged in!
</body>
<?php } ?>



</html>