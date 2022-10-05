<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
    ob_start();
    // get the incoming information
    $user = $_POST["userid"];
    $pass = $_POST["pass"];
    $putstr = $user.":".$pass;
    if ($fh = fopen ("passwd.txt", "a")) // MAKE SURE EDIT PERMS ARE OPEN ON TXT FILE
    {
        fwrite($fh, $putstr."\n");
        fclose ($fh);
    }
    setcookie ("login", "validlogin", time()+120);
    header('Location: ./smyHW14_story0'.'.html');
    ob_end_flush();
?>