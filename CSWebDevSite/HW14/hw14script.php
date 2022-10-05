<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
    ob_start();
    // get the incoming information
    $user = $_POST["userid"];
    $pass = $_POST["pass"];
    $wherego = $_POST["wherego"];
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
    ob_end_flush();
/////
?>