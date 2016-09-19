<?php

include_once('db.php');

$sql = "SELECT * FROM news ORDER BY time DESC;";
$res = mysqli_query($db, $sql);

?>

<?php date_default_timezone_set("Asia/Kolkata"); ?>
Last updated <?php echo date('d/m/y H:i:s'); ?><br>

<table id="news">
    <tr>
        <th>Time</th>
        <th>News</th>
    </tr>
    <?php
    while($ar = mysqli_fetch_array($res)) {
        $time = $ar['time'];
        $content = $ar['content'];
        $string = "<tr>
            <td>$time</td>
            <td>$content</td>
        </tr>\n";
        print($string);
    }
    ?>
</table>