<?php

include_once('db.php');

$sql = "SELECT * FROM stocks;";
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
    <tr>
        <td><a href="detail.php#Apple">Apple</a></td>
        <td>INR 3400.00</td>
        <td><span class="not_inverted triangle">&blacktriangle;</span>INR 21.80</td>
        <td>3%</td>
    </tr>
    <?php
    while($ar = mysqli_fetch_array($res)) {
        $name = $ar['name'];
        $current = $ar['current'];
        $difference = $ar['difference'];
        $percentage = $ar['percentage'];
        $string = "<tr>
            <td><a href=\"detail.php#$name\">$name</a></td>
            <td>INR $current</td>
            <td><span class=\"not_inverted triangle\">&blacktriangle;</span>INR $difference</td>
            <td>$percentage%</td>
        </tr>";
        print($string);
    }
    ?>
</table>