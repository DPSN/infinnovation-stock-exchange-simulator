<?php
include('../../db.php');

function form_error() {
    die(header('Location: index.php?error'));
}

// form validation
if(isset($_POST['name']) == false || empty($_POST['name']) || isset($_POST['time']) == false || empty($_POST['time'])) {
    form_error();
}

$name = mysqli_real_escape_string($db, htmlspecialchars($_POST['name']));
$time = mysqli_real_escape_string($db, htmlspecialchars($_POST['time']));

$sql = "DELETE FROM updates WHERE name='".$name."' AND time='".$time."';";
$sql2 = "SELECT current, difference, percentage FROM updates WHERE name = '".$name."' ORDER BY id DESC LIMIT 1;";

$res = mysqli_query($db, $sql);
$res2 = mysqli_query($db, $sql2);

if($res == false || $res2 == false) {
    form_error();
}
else {
    $ar = mysqli_fetch_array($res2);
    $current = $ar['current'];
    $difference = $ar['difference'];
    $percentage = $ar['percentage'];
    
    $sql3 = "UPDATE stocks SET current = ".$current.", difference = ".$difference.", percentage = ".$percentage." WHERE name = '".$name."';";
    
    if(mysqli_query($db, $sql3) == false) {
        form_error();
    }
}
header('Location: index.php?success');
