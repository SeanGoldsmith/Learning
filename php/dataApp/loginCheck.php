<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>It's Working</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="stylesheet" href=""/>
</head>

<body>

<?php
    ini_set('display_errors', 'On');
    error_reporting(E_ALL);
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
            echo "Login Successful!";
            $_SESSION["isLoggedIn"] = true;
            $_SESSION["currentUser"] = $newUserName;
            $_SESSION["currentZip"] = $row["zipcode"];
            $showLink = true;
        }
    } else {
        echo "Username or Password do not match records. Try Again";
    }

    $conn->close();
?>

<?php if ($showLink) {?>

    <a href="weather.php">See your weather data!</a>
    <a href="traffic.php">See your traffic data!</a>
    <script src=""></script>
<?php  } else {?>
    <h1>Login Failed. Go back to try again </h1>
<?php }?>

</body>

</html>