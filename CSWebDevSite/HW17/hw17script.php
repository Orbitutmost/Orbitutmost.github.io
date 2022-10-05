<?php
    
    //error_reporting(E_ALL);
    //ini_set("display_errors", "on");
    //ob_start();
    // get the incoming information 
    
    $user = $_GET["user"];
    $pass = $_GET["pass"];
    // Escape User Input to help prevent SQL Injection
    // >> this is killing my PHP, not sure why
    //$user = $mysqli->real_escape_string($user);
    //$pass = $mysqli->real_escape_string($pass);
    
    /*
    my SQL:
    user = cs329e_bulko_willsmy
    database = cs329e_bulko_willsmy
    password = Dumb7tiger+Pious
    */
    // Check Logins from SQL
    
    $server = "spring-2021.cs.utexas.edu";
    $sqluser = "cs329e_bulko_willsmy";
    $pwd = "Dumb7tiger+Pious";
    $dbName = "cs329e_bulko_willsmy";
    $mysqli = new mysqli ($server,$sqluser,$pwd,$dbName);
    if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
    }
    // Create the query as a string
    $command = "SELECT * FROM passwords"; // WHERE lastName = \"Eilish\"";
    // Issue the query
    $result = $mysqli->query($command);
    // Verify the result
    if (!$result) {
        die("Query failed: ($mysqli->error <br> SQL command=$command");
    }
    // I should probably have this all seperated out into functions...
    // oh well.
    $wasfound = FALSE;
    $row = $result->fetch_row();
    //echo "$row[0] $row[1]";
    while (!($row==FALSE)) {
        $currrow = $row;
        $row = $result->fetch_row(); // this way we can force a loop break
        //echo "$row[0] $row[1]";
        if($currrow[0] == $user) {
            $wasfound = TRUE;
            $row = FALSE; // get out of loop, dont waste time
            if($currrow[1] == $pass) {
                // AJAX "User and password confirmed"
                echo "User and password confirmed";
            } else {
                $command = "UPDATE passwords SET pass='$pass' WHERE user='$user'";
                if ($mysqli->query($command) === TRUE) {
                    echo "Password changed";
                } else {
                    echo "Error: " . $command . "<br>" . $mysqli->error;
                }
                //$result = $mysqli->query($command);
                // AJAX "Password changed"
            }
        } 
    }
    if(!$wasfound) {
        $command = "INSERT INTO passwords (user, pass) VALUES ('$user', '$pass')";
        if ($mysqli->query($command) === TRUE) {
            echo "New user registered";
        } else {
            echo "Error: " . $command . "<br>" . $mysqli->error;
        }
        // AJAX "New user registered"
    }
    

    //-----------------------------------------------------------------
    /*
    // get list of logins
    $logins = array();
    if ($fh = fopen ("passwd.txt", "r")) {
        while(!feof($fh)) {
            $line = fgets($fh);
            $line = rtrim($line, "\r\n");
            $firstpart = substr($line,0,strpos($line, ':'));
            $secondpart = substr($line,strpos($line, ':')+1);
            $logins[$firstpart] = $secondpart;
        }
        fclose ($fh);
    }  
    if($logins[$user] == $pass) {
        setcookie ("login", "validlogin", time()+120);
        header('Location: ./smyHW14_story'.$wherego.'.html');
    } else {
        header('Location: ./smyHW14_badlog.php?story='.$wherego);
    } 
    */
    //ob_end_flush();
    /* TESTING mySQLi run ----------------------------------------------
    // Optionally store the parameters in variables
    $server = "spring-2021.cs.utexas.edu";
    $user = "cs329e_bulko_willsmy";
    $pwd = "Dumb7tiger+Pious";
    $dbName = "cs329e_bulko_willsmy";
    $mysqli = new mysqli ($server,$user,$pwd,$dbName);
    // If it returns a non-zero error number, print a
    // message and stop execution immediately
    if ($mysqli->connect_errno) {
        die('Connect Error: ' . $mysqli->connect_errno . ": " . $mysqli->connect_error);
    }
    print "i lived";
    */
/////
?>