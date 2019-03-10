<?php session_start() ?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>PhpDataApp</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>
<?php if ($_SESSION['isLoggedIn'] == true) { ?>
<body>
    <div class="container">
        <?php 
            $geoQueryString = "http://www.mapquestapi.com/geocoding/v1/address?key=8ZXpEEfWkyhV9MsRYqpgtgJwMHGDBZ3p&location=" . $_SESSION['currentZip'];
            $geoResponse = file_get_contents($geoQueryString);
            $geoParsed = json_decode($geoResponse, true);
            $lat = $geoParsed['results'][0]['locations'][0]['latLng']['lat'];
            $lng = $geoParsed['results'][0]['locations'][0]['latLng']['lng'];
            $flowQueryString = 'https://www.mapquestapi.com/staticmap/v5/map?key=8ZXpEEfWkyhV9MsRYqpgtgJwMHGDBZ3p&center=' . $lat . "," . $lng . "&zoom=11&traffic=flow&size=500,300@2x";
            $boundingBox = array($lat - .15,$lng - .15, $lat + .15, $lng + .15);
            $incQueryString = "http://www.mapquestapi.com/traffic/v2/incidents?key=8ZXpEEfWkyhV9MsRYqpgtgJwMHGDBZ3p&boundingBox=" . $boundingBox[0] . "," . $boundingBox[1] . "," . $boundingBox[2] . "," . $boundingBox[3] . "&filters=construction,incidents";
            $incResponse = file_get_contents($incQueryString);
            $incParsed = json_decode($incResponse,true);
        ?>
        <p><a href="weather.php">Weather Data</a></p>
        <h1>Hi <?php echo $_SESSION['currentUser']?>! Here is the traffic for <?php echo $_SESSION['currentZip']?>.  </h1> </br>
        <p> Here is an image of traffic flow in your area. </p>
        <img class="traffic-img" src="<?php echo $flowQueryString ?>">
        <br/>

        <?php 
            for ($x = 0; $x <= 5; $x++) {
                echo '<p>' . $incParsed['incidents'][$x]['fullDesc'] . "</p>" . "</br>";
            }
        ?>
    </div>
    <script src=""></script>
</body>
<?php } else { ?>

<body>
Looks like you're not logged in!
</body>
<?php } ?>
</html>