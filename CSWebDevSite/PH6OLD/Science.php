<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>ME Group Chats</title>
    <script src="GroupChats.js" defer></script>
    <link href="main.css" rel="stylesheet" />
</head>
<body>
    <script language="javascript" type="text/javascript">
        function ajaxFunction() {
            var ajaxRequest;
            ajaxRequest = new XMLHttpRequest();

            ajaxRequest.onreadystatechange = function () {
                if (ajaxRequest.readyState == 4) {
                    ajaxDisplay = document.getElementById("ajaxDiv");
                    ajaxDisplay.innerHTML = ajaxRequest.resposeText;
                }
            }

            var classname = document.getElementById("class").value;
            var prof = document.getElementById("prof").value;
            var link = document.getElementById("chatlink").value;
            var string = "?class=" + classname;

            string += "&prof=" + prof + "&link=" + link;

            ajaxRequest.open("GET", "add_Science.php" + string, true);
            ajaxRequest.send(null);
        }
    </script>

    <div class = "bgcolorcontainer">
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
        <table class="contacttable">
            <tr> 
                <td colspan="2"> <h1>Science Groupmes</h1> </td>
            </tr>
            <div id="ajaxDiv"><?php include("fill_Science.php") ?></div>
            <tr>
                <td colspan="2" class='contactinfobox'>

        <?php

            if (isset($_COOKIE['name'])) {
                print <<<INHTML
                <form id="GCform" method="POST">
                    <h2><u>Add a class group chat</u></h2>
                    <p>
                <label> Which class are you adding:
	            <select id="class" required>
			<option selected="selected" value="1"> Principles of Chemistry I </option>
                        <option value="2"> Engineering Physics I </option>
                        <option value="3"> Engineering Physics II </option>
                        <option value="4"> Statics </option>
                        <option value="5"> Mechanics of Solids </option>
		    </select>
                </label>
            </p>
            <p>
                <label> Professor: <input id="prof" type="text" size="30" required/></label>
            </p>
            <p>
                <label> Please copy the chat link in the text box below <br>
		    <textarea id = "chatlink" name = "chatlink" rows = "4" cols = "36" req></textarea>
		</label>
            </p>
            <p>
		                <button type = "button" onclick="ajaxFunction()">Enter</button>
		                <input type = "reset" value = "Clear" />
	                </p>
                </form>
INHTML;
            }
            else {
                print <<<INHTML
                Want to add your class group chat? <a href="signup.html">Click here</a> to register!<br>
                Already have an account? <a href="login.html">Login here!</a>
INHTML;
            } 
        ?>
    </div>
    </div>
</body>
</html>