        <table class="contacttable">
            <tr> 
                <td colspan="2"> <h1>Math Group Chats</h1> </td>
            </tr>

<?php
    $arr1 = ["chats1.txt", "chats2.txt", "chats3.txt", "chats4.txt"];
    $arr2 = ["M408C: Differential/Integral Calc", "M408D: Sequences, Series, & Multivariable Calc", "M427J: Diff. Eq. with Linear Algebra", "M427L: Advanced Calc for Applications II"];

    $outstr = '';
    $table_len = sizeof($arr1);
    for ($j = 0; $j < $table_len; $j = $j+2) {
    $arr = [];
    $profs = [];
    $links = [];

        $h = $j + 1;
        $filepath = "MathFiles/".$arr1[$j];
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

        $filepath = "MathFiles/".$arr1[$h];
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
			<option selected="selected" value="1"> Differential/Integral Calc </option>
                        <option value="2"> Sequences, Series, & Multivariable Calc </option>
                        <option value="3"> Diff. Eq. with Linear Algebra </option>
                        <option value="4"> Advanced Calc for Applications II </option>
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
		<button type = "button" onclick="ajaxFunction()">AddClass</button>
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
