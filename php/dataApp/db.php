<?php 
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = 'password';
    $dbname = 'dataApp';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    $conn->query("INSERT INTO users (user_name,passwrod,zip_code) VALUES
    ('seang','password',60007)");


?>