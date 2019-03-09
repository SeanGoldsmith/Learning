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
            $_SESSION["isLogedIn"] = true;
            $_SESSION["currentUser"] = $newUserName;
            $_SESSION["currentZip"] = $row["zipcode"];
        }
    } else {
        echo "Username or Password do not match records. Try Again";
    }

    $conn->close();
?>