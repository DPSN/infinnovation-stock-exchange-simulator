<?php

include_once('db.php');

$sql = "SELECT * FROM stocks ORDER BY sector, name;";
$res = mysqli_query($db, $sql);

?>
<?php date_default_timezone_set("Asia/Kolkata"); ?>
Last updated <?php echo date('d/m/y H:i:s'); ?><br>
<table>
    <tr>
        <th>Stock Name</th>
        <th>Current</th>
        <th>Difference</th>
        <th>% Change</th>
    </tr>
    <?php
    $sector_last = "";
    while($ar = mysqli_fetch_array($res)) {
        
        //array sql table result manipulation to print data
        
        $name = $ar['name'];
        $current = $ar['current'];
        $difference = intval($ar['difference']);
        $percentage = $ar['percentage'];
        $sector = $ar['sector'];
        
        if(strcmp($sector,$sector_last) != 0) {
            $a = "<tr><td class=\"sector\" colspan=\"4\"><a href=\"detail.php?sector=$sector\">$sector</a></td></tr>\n";
            print($a);
            $sector_last = $sector;
        }
        
        $string = "";
        // if loss then inverted red triangle
        if($difference >= 0) {
            $string = "<tr class=\"persector $sector\">
            <td><a href=\"detail.php?sector=$sector#$name\">$name</a></td>
            <td>INR $current</td>
            <td><span class=\"inverted triangle\">&#9660;</span>INR $difference</td>
            <td class=\"loss\">$percentage%</td>
            </tr>\n";
        }
        // else gain then inverted green triangle
        else {
            $percentage = abs($percentage);
            $difference = abs($difference);
            $string = "<tr class=\"persector $sector\">
            <td><a href=\"detail.php?sector=$sector#$name\">$name</a></td>
            <td>INR $current</td>
            <td><span class=\"not_inverted triangle\">&#9650;</span>INR $difference</td>
            <td class=\"gain\">$percentage%</td>
            </tr>\n";
        }
        
        print($string);
    }
    ?>
</table>