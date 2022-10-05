<?php
    // get the incoming information
    $lines = [];
    for ($x = 0; $x < 10; $x++) {
        if(array_key_exists("$x", $_POST)) {
            $signupLine = $_POST["$x"];
            //echo $_POST["$x"]; // this echo sequence was to test _POST
            //echo " $x <br />";
            $signupLine = rtrim($signupLine, "\r\n");
            $lines[$x] = $signupLine; 
        } else {
            $lines[$x] = null;
        }
    }
    // rip file into array to dupe
    $inFile = [];
    // below is error testing echo, needed .txt file to be perms 0777
    //echo "filechecks<br />file exists:".file_exists("signup.txt")."<br />file readable:".is_readable("signup.txt")."<br />file writable:".is_writable("signup.txt")."<br />";
    if ($fh = fopen ("signup.txt", "r")) {
        for ($x = 0; $x < 10; $x++) {
            $signupLine = fgets($fh);
            $signupLine = rtrim($signupLine, "\r\n");
            $inFile[$x] = $signupLine;
        }
        fclose ($fh);
    }   
    else {echo "bad openread"; } 
    // combo time
    if ($fh = fopen ("signup.txt", "w")) // MAKE SURE EDIT PERMS ARE OPEN ON TXT FILE
    {
        for ($x = 0; $x < 10; $x++) {
            if($lines[$x]==null) {
                fwrite($fh, $inFile[$x]."\n");
            } else {
                fwrite($fh, $lines[$x]."\n");
            }
        }
        fclose ($fh);
    }
    else {echo "bad openwrite"; }
    /* testing inputs to see what we were filewriting without change $fh
    for ($x = 0; $x < 10; $x++) {
        if($lines[$x]==null) {
            echo $inFile[$x]." <br />";
        } else {
            echo $lines[$x]." <br />";
        }
    }
    echo "end";
    */
    // redirect back to form
    //header("Location: https://spring-2021.cs.utexas.edu/cs329e-bulko/willsmy/HW12/smyHW12.php/",TRUE,303); 
    // for some reason I can't bounce back to the php without breaking it
    // my assumption is that im doing something goofy with permissions
    // instead, we do this:
    print <<<HTMLOUT
    <!DOCTYPE html>

    <html lang="en">
    
    <head>
        <title>William Smylie HW12</title>
        <link rel="stylesheet" media="screen" href="hw12.css">
        <meta charset="UTF-8">
        <meta name="description" content="william smylie HW12 lander">
        <meta name="author" content="William Smylie">
    </head> 
    <!-- this is the HW12 for BULKO's CS 329E Web Dev Class -->
    <body>
    <div id="contain">
        <h2> Thanks for signing up! </h2>
        <p> Please click <a href="./smyHW12.php"> here </a> to return to form. </p>
        <div id="footer">
            Copyright Will Smylie, Author<br />
            Page last updated: 4/5/2021<br />
            Author: <a href="mailto:williamsmylie@utexas.edu"> Will Smylie</a>
        </div>
    </div>
    </body>
    </html>
HTMLOUT;

    // just keeping this example code in here for reference of basics
    /*
    $name = $_POST["username"];
    $email = $_POST["email"];

    // open file 'info.txt' and append the name and e-mail address
    if ($fh = fopen ("info.txt", "a"))
    {
        fwrite ($fh, "$name  $email \n");
        fclose ($fh);
    }
    */
?>