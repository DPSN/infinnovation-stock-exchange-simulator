<?php

include_once('db.php');

$sql = "SELECT * FROM stocks ORDER BY sector;";
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
        
        $name = $ar['name'];
        $current = $ar['current'];
        $difference = $ar['difference'];
        $percentage = $ar['percentage'];
        $sector = $ar['sector'];
        
        if(strcmp($sector,$sector_last) != 0) {
            $a = "<tr><td class=\"sector\" colspan=\"4\">$sector</td></tr>\n";
            print($a);
            $sector_last = $sector;
        }
        
        $string = "<tr class=\"persector $sector\">
            <td><a href=\"detail.php?sector=$sector#$name\">$name</a></td>
            <td>INR $current</td>
            <td><span class=\"not_inverted triangle\">&blacktriangle;</span>INR $difference</td>
            <td>$percentage%</td>
        </tr>\n";
        print($string);
    }
    ?>
</table>