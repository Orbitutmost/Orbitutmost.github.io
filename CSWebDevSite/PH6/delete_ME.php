<?php
    $class = $_GET["class"];
    $prof = $_GET["prof"];

    $file_str = "MEFiles/chats" . strval($class) . ".txt";
    $file = fopen($file_str, "r");
    $line = fgets($file);
        while ($line != "") {
            $arr[] = $line;
            $line = fgets($file);
        }
    foreach ($arr as $value) {
        $mid_idx = strpos($value, ":");
        $profs[] = substr($value, 0, $mid_idx);
    }
    fclose($file);

    $line_idx = array_search($prof, $profs);
    if ($line_idx === false) {
        include("fill_ME.php");
        echo "The class you are trying to remove does not exist";
    }

    else {
        unset($arr[$line_idx]);
        $file = fopen($file_str, "w");
        foreach ($arr as $line) {
            fwrite($file, $line);
        }
        fclose($file);
        include("fill_ME.php");
    }

?>