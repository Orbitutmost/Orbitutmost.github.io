        <table class="contacttable">
            <tr> 
                <td colspan="2"> <h1>ME Group Chats</h1> </td>
            </tr>

<?php
    $arr1 = ["chats1.txt", "chats2.txt", "chats3.txt", "chats4.txt", "chats5.txt", "chats6.txt", "chats7.txt", "chats8.txt", "chats9.txt", "chats10.txt", "chats11.txt", "chats12.txt", "chats13.txt", "chats14.txt", ];
    $arr2 = ["ME302: Engineering Design and Graphics", "ME333T: Engineering Communication", "ME316T: Thermodynamics", "ME318M: Engineering Computational Methods", "ME314D: Dynamics", "ME334: Materials Engineering",
            "ME330: Fluid Mechanics", "ME335: Engineering Statistics", "ME340: Mechatronics", "ME338: Machine Elements", "ME339: Heat Transfer", "ME344: Dynamic Systems and Controls", "ME366J: ME Design Methodology",
            "ME353: Engineering Finance"];

    $outstr = '';
    $table_len = sizeof($arr1);
    for ($j = 0; $j < $table_len; $j = $j+2) {
    $arr = [];
    $profs = [];
    $links = [];

        $h = $j + 1;
        $filepath = "MEFiles/".$arr1[$j];
        $file = fopen($filepath, "r");
        $line = fgets($file);
            while ($line != "") {
                $arr[] = $line;
                $line = fgets($file);
            }

        foreach ($arr as $value) {
            $mid_idx = strpos($value, ":");
            $profs[] = substr($value, 0, $mid_idx);
            $end_idx = strpos($value, "\n");
            $links[] = substr($value, $mid_idx + 1, $end_idx - $mid_idx - 1);
        }

        fclose($file);
        $length = sizeof($arr);

        $outstr.="            <tr>\n";
        $outstr.="                <td class='contactinfobox'>\n";
        $outstr.="                    <h3 id='group_label'>$arr2[$j]</h3>\n";
        $outstr.="                    <ul id='GClist'>\n";

        for ($i = 0; $i < $length; $i++) {
            $outstr.="                        <li><a href = '" . $links[$i] . "'>" . $profs[$i] . "</a></li><br>\n";
        }

        $outstr.="                    </ul>\n";
        $outstr.="                </td>\n";
        $outstr.="                <td class='contactinfobox'>\n";
        $outstr.="                    <h3 id='group_label'>$arr2[$h]</h3>\n";
        $outstr.="                    <ul id='GClist'>\n";

        $arr = [];
        $profs = [];
        $links = [];

        $filepath = "MEFiles/".$arr1[$h];
        $file = fopen($filepath, "r");
        $line = fgets($file);
            while ($line != "") {
                $arr[] = $line;
                $line = fgets($file);
            }

        foreach ($arr as $value) {
            $mid_idx = strpos($value, ":");
            $profs[] = substr($value, 0, $mid_idx);
            $end_idx = strpos($value, "\n");
            $links[] = substr($value, $mid_idx + 1, $end_idx - $mid_idx - 1);
        }

        fclose($file);
        $length = sizeof($arr);
        
        for ($i = 0; $i < $length; $i++) {
            $outstr.="                        <li><a href = '" . $links[$i] . "'>" . $profs[$i] . "</a></li><br>\n";
        }

        $outstr.="                    </ul>\n";
        $outstr.="                </td>\n";
        $outstr.="            </tr>\n";

    }
    echo $outstr;
?>

            <tr>
                <td colspan="2" class='contactinfobox'>

        <?php

            if (isset($_COOKIE['name'])) {
                print <<<INHTML
                <form id="GCform" method="POST">
                    <h2><u>Add/Remove a class group chat</u></h2>
                    <p>
                        <label> Which class are you adding:
	                    <select id="class" required>
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
                        <label> Professor: <input id="prof" type="text" size="30" required/></label>
                    </p>
                    <p>
                        <label> Please copy the chat link in the text box below (Not required for delete) <br>
		            <textarea id = "chatlink" name = "chatlink" rows = "4" cols = "36"></textarea>
		                </label>
                    </p>
                    <p>
		        <button type = "button" onclick="ajaxFunction()">Add Class</button>
                        <button type = "button" onclick="ajaxDelete()">Remove Class</button>
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

