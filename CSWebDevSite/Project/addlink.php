<?php
    $class = $_POST["class"];
    $prof = $_POST["prof"];
    $link = $_POST["chatlink"];
    print $prof;

    $file_str = "MEFiles/chats" . strval($class) . ".txt";
    print $file_str;
    $file = fopen($file_str, "a");
    $string = $prof . ":" . $link . "\n";
    fwrite($file, $string);
    fclose($file);
     
//add code to prevent duplicates 

//    header("Location: ME.php");

?>