<!doctype html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>PhpDataApp</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <link rel="stylesheet" type="text/css" href="./css/style.css">
</head>

<body>
    <div class="container">
        <h1>Let's Login!</h1>
        <form action="loginCheck.php" method="POST">
            <p>
                Username
            </p>
            <input type="text" name="username">
            <br/>
            <p>
                Password<input type="text" name="password">
            </p>
            <br/>
            <input class="form-button" type="Submit" value="Submit">
        </form>
        <h3>Don't have an account? Register <a href="register.php"> here </a></h3>
        <script src=""></script>
    </div>
</body>

</html>
