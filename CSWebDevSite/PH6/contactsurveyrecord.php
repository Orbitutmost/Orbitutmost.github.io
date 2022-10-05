<?php
    $name = $_GET["visitorName"];
    $email = $_GET["visitorEmail"];
    $cata = $_GET["commenttype"];
    $comments = $_GET["comments"];
    if ($fh = fopen ("comments.txt", "a")) // MAKE SURE EDIT PERMS ARE OPEN ON TXT FILE
    {
        $outstring = "[NAME:$name,EMAIL:$email,CATA:$cata,COMM:$comments]\n";
        fwrite($fh, $outstring);
        fclose ($fh);
    }
    else {echo "bad openwrite"; }
    echo "Thank you for submitting a comment!";
    // instead, we do this:
    /*
    print <<<HTMLOUT
    <!DOCTYPE html>

    <html lang="en" xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta charset="utf-8" />
        <title>Contact Us Info</title>
        <link href="main.css" rel="stylesheet" />
    </head>
    <body>
        <div id="top">
            <div id="logo">
                <a href="homepage.html"><img src="MELogo.png" alt="Group Logo" width="75" /></a>
            </div>
            <h1>Mechanical Engineering Group Chats</h1>
        </div>
        <div id="labels">
            <div class="dropdown">
                <button class="dropbtn">Group Chats</button>
                <div class="dropdown-content">
                    <a href="ME.php">M.E.</a>
                    <a href="Math.php">Mathematics</a>
                    <a href="Science.php">Sciences</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Reference Docs</button>
                <div class="dropdown-content">
                    <a href="https://www.me.utexas.edu/images/pdfs/ME-general-curriculum_spring-2021.pdf">Degree Plan</a>
                    <a href="https://registrar.utexas.edu/schedules">Course Schedule</a>
                    <a href="https://www.me.utexas.edu/">Dept Website</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Class Resources</button>
                <div class="dropdown-content">
                    <a href="MEResources.html">M.E.</a>
                    <a href="MathResources.html">Mathematics</a>
                    <a href="ScienceResources.html">Sciences</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Tutoring</button>
                <div class="dropdown-content">
                    <a href="meche_tutor.html">M.E.</a>
                    <a href="math_tutor.html">Mathematics</a>
                    <a href="science_tutor.html">Sciences</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Contact Us</button>
                <div class="dropdown-content">
                    <a href="contactuspage.html">Contact Info</a>
                    <a href="contactussurvey.html">Survey</a>
                </div>
            </div>
        </div>       
        <div id="main">
            Thank you for submitting a comment!
        </div>
    </body>
    </html>
HTMLOUT; */
?>