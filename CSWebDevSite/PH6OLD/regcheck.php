<?php
    
    $server = "spring-2021.cs.utexas.edu";
    $user = "cs329e_bulko_cmensch";
    $pwd = "hive!sheer4Dozen";
    $dbName = "cs329e_bulko_cmensch";

    $username = $_POST["username"];
    $password = $_POST["password"];
    $code = $_POST["code"];

    $mysqli = new mysqli($server, $user, $pwd, $dbName);

    $cmnd = "SELECT * FROM MElogin WHERE username = '$username'";
    $result = $mysqli->query($cmnd);

    if ($code != "asdf1234") {
        include("signup.html");
        echo "<br>Verification code is not correct";
    }

    else if (mysqli_num_rows($result) != 0) {
        include("signup.html");
        echo "<br>Username is taken";
    }

    else {
        $cmnd = "INSERT INTO MElogin VALUES ('$username', '$password')";
        $mysqli->query($cmnd);
        setcookie("name", $username, time()+120, "/");
        include("homepage.html");
    }

?>