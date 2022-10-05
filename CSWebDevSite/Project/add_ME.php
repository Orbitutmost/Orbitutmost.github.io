<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <title>ME Group Chats</title>
    <script src="GroupChats.js" defer></script>
    <link href="main.css" rel="stylesheet" />
</head>
<body>
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
        <form id="GCform" action="./addlink.php" method="POST">
            <h2><u>Add a class group chat</u></h2>
            <p>
                <label> Which class are you adding:
	            <select name="class" required>
			<option selected = "selected" value="1"> Engineering Design and Graphics</option>
			<option value="2"> Engineering Communication </option>
			<option value="3"> Thermodynamics </option>
			<option value="4"> Engineering Comp. Methods </option>
			<option value="5"> Dynamics </option>
                        <option value="6"> Materials Engineering </option>
			<option value="7"> Fluid Mechanics </option>
			<option value="8"> Engineering Statistics </option>
			<option value="9"> Mechatronics </option>
                        <option value="10"> Machine Elements </option>
			<option value="11"> Heat Transfer </option>
			<option value="12"> Dynamic Systems and Controls </option>
			<option value="13"> ME Design Methodology </option>
                        <option value="14"> Engineering Finance </option>
		    </select>
                </label>
            </p>
            <p>
                <label> Professor: <input name="prof" type="text" size="30" required/></label>
            </p>
            <p>
                <label> Please copy the chat link in the text box below <br>
		    <textarea id = "chatlink" name = "chatlink" rows = "4" cols = "36" req></textarea>
		</label>
            </p>
            <p>
		<button type = "button" onclick="checklink()">Enter</button>
		<input type = "reset" value = "Clear" />
	    </p>
        </form>
        <img src="MELogo.png" alt="Group Logo" width="60%" />
    </div>    
    </div>
</body>
</html>