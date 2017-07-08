<table>
<?php
include('../../db.php');

//  validation
if(isset($_GET['name']) == false || empty($_GET['name'])) {
    die('Please select a stock first!');
}

$name = mysqli_real_escape_string($db, htmlspecialchars($_GET['name']));
print($name);

$sql = "SELECT * FROM updates WHERE name = \"".$name."\" ORDER BY id DESC;";
$res = mysqli_query($db, $sql);

while($ar = mysqli_fetch_array($res)) {
    $name = $ar['name'];
    $time = $ar['time'];
    $current = $ar['current'];

    $str = "<tr> <form method=\"POST\" action=\"rollbackupdate.php\"> <input type=\"hidden\" name=\"name\" value=\"".$name."\"> <input type=\"hidden\" name=\"time\" value=\"".$time."\"> <td class=\"time\">At ".$time."</td> <td class=\"current\">".$name." securites were priced at INR ".$current.".</td> <td class=\"button\"><button type=\"submit\">Rollback</button></td> </form> </tr>\n";
    print($str);
}
?>
</table>