<?php
    
    $server = "spring-2021.cs.utexas.edu";
    $user = "cs329e_bulko_cmensch";
    $pwd = "hive!sheer4Dozen";
    $dbName = "cs329e_bulko_cmensch";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $mysqli = new mysqli($server, $user, $pwd, $dbName);

    $cmnd = "SELECT * FROM MElogin WHERE username = '$username' and password = '$password'";
    $result = $mysqli->query($cmnd);
    if (mysqli_num_rows($result) != 0) {
        setcookie("name", $username, time()+120, "/");
        include("homepage.html");
    }

    else {
    echo "Username or password is incorrect";
    include("login.html");
    }

?>