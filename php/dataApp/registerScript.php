<?php 
    include 'db.php';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    $name = $_POST['username'];
    $password = $_POST['password'];
    $zipCode =  $_POST['zipCode'];
    $zipInt = (int)$zipCode;

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO users (user_name, password, zipcode) VALUES ('$name','$password','$zipInt')";

    if ($conn->query($sql) === TRUE) {
        echo "New Account Registered!";
    ?>
    <a href="index.php">Back to login </a>

    <?php } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    


?>