<?php
    $class = $_GET["class"];
    $prof = $_GET["prof"];
    $link = $_GET["link"];

    $file_str = "MathFiles/chats" . strval($class) . ".txt";
    $file = fopen($file_str, "a");
    $string = $prof . ":" . $link . "\n";
    fwrite($file, $string);
    fclose($file);

    include("fill_Math.php")
     
//add code to prevent duplicates 

//    header("Location: ME.php");

?>