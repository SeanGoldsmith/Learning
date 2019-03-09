<?php
    session_start();
    echo $_POST["zipCode"];
    $_SESSION["zipCode"] = $_POST["zipCode"];
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>It's Working</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="stylesheet" href=""/>
</head>

<body>
    <h1>Great! Let's test this sucker.</h1>
    <a href="test.php"><p>click here</p></a>
    <script src=""></script>
</body>

</html>