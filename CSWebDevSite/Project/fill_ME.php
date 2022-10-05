<?php
    $arr1 = ["chats1.txt", "chats2.txt", "chats3.txt", "chats4.txt", "chats5.txt", "chats6.txt", "chats7.txt", "chats8.txt", "chats9.txt", "chats10.txt", "chats11.txt", "chats12.txt", "chats13.txt", "chats14.txt", ];
    $arr2 = ["ME302: Engineering Design and Graphics", "ME333T: Engineering Communication", "ME316T: Thermodynamics", "ME318M: Engineering Computational Methods", "ME314D: Dynamics", "ME334: Materials Engineering",
            "ME330: Fluid Mechanics", "ME335: Engineering Statistics", "ME340: Mechatronics", "ME338: Machine Elements", "ME339: Heat Transfer", "ME344: Dynamic Systems and Controls", "ME366J: ME Design Methodology",
            "ME353: Engineering Finance"];

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

        print <<<INHTML
                <tr>
                    <td class='contactinfobox'>
                        <h3 id='group_label'>$arr2[$j]</h3>
                        <ul id='GClist'>
INHTML;

        for ($i = 0; $i < $length; $i++) {
            print "<a href = '" . $links[$i] . "'>" . $profs[$i] . "</a><br>";
        }

         print <<<INHTML
                    </ul>
                </td>
                <td class='contactinfobox'>
                    <h3 id='group_label'>$arr2[$h]</h3>
                    <ul id='GClist'>
INHTML;

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
            print "<a href = '" . $links[$i] . "'>" . $profs[$i] . "</a><br>";
        }

        print <<<INHTML
                        </ul>
                    </td>
                </tr>
INHTML;
    }
?>