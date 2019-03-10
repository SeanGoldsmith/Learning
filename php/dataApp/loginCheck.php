<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>It's Working</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
<div class="container">
    <?php
        session_start();
        $dbhost = 'localhost:3306';
        $dbuser = 'root';
        $dbpass = 'password';
        $dbname = 'dataApp';
        $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

        $newUserName = $_POST['username'];
        $newPassWord = $_POST['password'];
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 

        $sql = "SELECT * FROM users WHERE user_name='$newUserName' AND password='$newPassWord'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $_SESSION["isLoggedIn"] = true;
                $_SESSION["currentUser"] = $newUserName;
                $_SESSION["currentZip"] = $row["zipcode"];
                $showLink = true;
            }
        } 

        $conn->close();
    ?>

    <?php if ($showLink) {?>
        <h1> Login Succesful! </h1>
        <p>
            <a href="weather.php">See your weather data!</a>
        </p>
        <p>
            <a href="traffic.php">See your traffic data!</a>
        </p>
        <script src=""></script>
    <?php  } else {?>
        <h1>Login Failed. <a href="index.php">Try again </a>.</h1>
    <?php }?>
    </div>
</body>

</html>