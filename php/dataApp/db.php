<?php 
    $dbhost = 'localhost:3306';
    $dbuser = 'root';
    $dbpass = 'password';
    $dbname = 'dataApp';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $sql = "INSERT INTO users (user_name, password, zipcode) VALUES ('Mary','whatever',60007)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    


?>