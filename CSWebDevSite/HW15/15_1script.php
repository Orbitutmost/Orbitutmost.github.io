<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
    ob_start();
    // get the incoming information
    $user = $_POST["userid"];
    $pass = $_POST["pass"];
    $putstr = $user.":".$pass;
    if(strpos(file_get_contents("passwd.txt"), $putstr) !== false){
        header('Location: ./smyHW15taken'.'.html');
    } else {
        if ($fh = fopen ("passwd.txt", "a")) // MAKE SURE EDIT PERMS ARE OPEN ON TXT FILE
        {
            fwrite($fh, $putstr."\n");
            fclose ($fh);
        }
        session_start();
        $_SESSION["user"] = $user;
        $_SESSION["smyhwscore"] = 0;
        setcookie ("smyhwlogin", "validlogin", time()+900);
        header('Location: ./14_2'.'.html');
    }
    ob_end_flush();
?>