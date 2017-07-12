<?php
include('../../db.php');

function form_error() {
    die(header('Location: index.php?error'));
}

// form validation
if(isset($_POST['name']) == false || empty($_POST['name']) || isset($_POST['sector']) == false || empty($_POST['sector']) || isset($_POST['pclose']) == false || empty($_POST['pclose']) || isset($_POST['ovalue']) == false || empty($_POST['ovalue']) || isset($_POST['bvalue']) == false || empty($_POST['bvalue']) || isset($_POST['lcircuit']) == false || empty($_POST['lcircuit']) || isset($_POST['ucircuit']) == false || empty($_POST['ucircuit']) || isset($_POST['dividend']) == false || empty($_POST['dividend'])  || isset($_POST['profile']) == false || empty($_POST['profile'])) {
    form_error();
}

$name = mysqli_real_escape_string($db, htmlspecialchars($_POST['name']));
$sector = mysqli_real_escape_string($db, htmlspecialchars($_POST['sector']));
$pclose = mysqli_real_escape_string($db, htmlspecialchars($_POST['pclose']));
$ovalue = mysqli_real_escape_string($db, htmlspecialchars($_POST['ovalue']));
$lcircuit = mysqli_real_escape_string($db, htmlspecialchars($_POST['lcircuit']));
$ucircuit = mysqli_real_escape_string($db, htmlspecialchars($_POST['ucircuit']));
$bvalue = mysqli_real_escape_string($db, htmlspecialchars($_POST['bvalue']));
$dividend = mysqli_real_escape_string($db, htmlspecialchars($_POST['dividend']));
$profile = mysqli_real_escape_string($db, htmlspecialchars($_POST['profile']));

$current = $ovalue;
$difference = $pclose - $ovalue;
$percentage = ($difference / $pclose) * 100;

// database query statements
$sql = "INSERT INTO stocks (name, sector, current, difference, percentage, pclose, ovalue, lcircuit, ucircuit, bvalue, dividend, profile) VALUES ('$name', '$sector', $current, $difference, $percentage, $pclose, $ovalue, $lcircuit, $ucircuit, $bvalue, $dividend, '$profile');";
date_default_timezone_set('Asia/Kolkata');
$time = date('d/m/y H:i');
$sql2 = "INSERT INTO updates (name, current, difference, percentage, time) VALUES ('$name', 0, 0, 0, '$time'), ('$name', $current, $difference, $percentage, '$time');";

if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
    form_error();
}
header('Location: index.php?success');