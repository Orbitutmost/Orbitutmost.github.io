<?php
    error_reporting(E_ALL);
    ini_set("display_errors", "on");
    ob_start();
    if (isset($_COOKIE["login"])) {
        header('Location: ./smyHW14_story'.$_GET["story"].'.html');
        exit(); 
    }
    ob_end_flush();
?>
<!DOCTYPE html>

<html lang="en">

<head>
	<title>William Smylie HW12</title>
    <link rel="stylesheet" media="screen" href="hw14.css">
	<meta charset="UTF-8">
	<meta name="description" content="william smylie HW12">
	<meta name="author" content="William Smylie">
</head> 
<!-- this is the HW14 for BULKO's CS 329E Web Dev Class -->
<body>
<div id="contain">
    <div id="header">
        <h1 class="fancy">Newspaper Login</h1>
    </div>
    <div id="centercol">
        <div class="catagory">
            <form action="./hw14script.php" method="post">
                <table>
                    <tr>
                        <td colspan="2"> Bad-Login, please try again. <br /> Otherwise, please <a href="smyHW14_regis.php">register</a> </td>
                    </tr>
                    <tr>
                        <td style="width: 30%;">Userid:</td><td><input type="text" name="userid" /></td>
                    </tr>
                    <tr>
                        <td style="width: 30%;">Password:</td><td><input type="text" name="pass" /></td>
                    </tr>
                </table> 
            <br>
            <?php
                print '<input style="display:none;" type="text" name="wherego" value="'.$_GET["story"].'">';
            ?>
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