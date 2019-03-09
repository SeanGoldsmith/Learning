<?php 
    session_start();
    echo $_SESSION['isLogedIn'];
    echo $_SESSION['currentUser'];
    echo $_SESSION['currentZip'];