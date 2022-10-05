<?php
    $arr1 = ["chats1.txt", "chats2.txt", "chats3.txt", "chats4.txt", "chats5.txt"];
    $arr2 = ["CH301: Principles of Chemistry I", "PHY303K: Engineering Physics I", "PHY303L: Engineering Physics II", "EM306: Statics", "EM319: Mechanics of Solids"];

    $outstr = '';
    $table_len = sizeof($arr1);
    for ($j = 0; $j < $table_len; $j = $j+2) {
    $arr = [];
    $profs = [];
    $links = [];

        $h = $j + 1;
        $filepath = "SciFiles/".$arr1[$j];
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

        $filepath = "SciFiles/".$arr1[$h];
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