<!DOCTYPE html>

<html lang="en">

<head>
	<title>William Smylie HW12</title>
    <link rel="stylesheet" media="screen" href="hw12.css">
	<meta charset="UTF-8">
	<meta name="description" content="william smylie HW12">
	<meta name="author" content="William Smylie">
</head> 
<!-- this is the HW12 for BULKO's CS 329E Web Dev Class -->
<body>
<div id="contain">
    <div id="header">
        <h1 class="fancy">Online Signup Sheet</h1>
    </div>
    <div id="centercol">
        <div class="catagory">
            <form action="./hw12script.php" method="post">
                <table align = "center" width = "30%" border = "1">
                    <?php
                        $formBlanks = [];
                        if ($fh = fopen ("signup.txt", "r"))
                        {
                            for ($x = 0; $x < 10; $x++) {
                                $signupLine = fgets($fh);
                                $signupLine = rtrim($signupLine, "\r\n");
                                if($signupLine == "") {$formBlanks[$x] = '<input type="text" name="'.$x.'" />'; }
                                else {$formBlanks[$x] = $signupLine; }
                            }
                            fclose ($fh);
                        }    
                        
                        print <<<HTMLOUT
                        <tr><th  style="width:130px"> Time </th><th> Name </th></tr>
                        <tr><td> 8:00 am </td><td> $formBlanks[0] </td></tr>
                        <tr><td> 9:00 am </td><td> $formBlanks[1] </td></tr>
                        <tr><td> 10:00 am </td><td> $formBlanks[2] </td></tr>
                        <tr><td> 11:00 am </td><td> $formBlanks[3] </td></tr>
                        <tr><td> 12:00 pm </td><td> $formBlanks[4] </td></tr>
                        <tr><td> 1:00 pm </td><td> $formBlanks[5] </td></tr>
                        <tr><td> 2:00 pm </td><td> $formBlanks[6] </td></tr>
                        <tr><td> 3:00 pm </td><td> $formBlanks[7] </td></tr>
                        <tr><td> 4:00 pm </td><td> $formBlanks[8] </td></tr>
                        <tr><td> 5:00 pm </td><td> $formBlanks[9] </td></tr>
HTMLOUT;
                    ?>
                </table>
            <br>
            <input class="fc" type="submit" value="Submit" />
            </form>
        </div>
    </div>
    <!--<span style="position: absolute; top: 200px; left: 450px;" onmousedown="grabber(event);"> meow </span>-->
    <div id="footer">
        Copyright Will Smylie, Author<br />
        Page last updated: 4/5/2021<br />
        Author: <a href="mailto:williamsmylie@utexas.edu"> Will Smylie</a>
    </div>
</div>
</body>
</html>