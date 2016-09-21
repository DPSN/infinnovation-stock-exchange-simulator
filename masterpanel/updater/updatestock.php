<?php
include('../../db.php');

function form_error() {
    die(header('Location: index.php?error'));
}

// form validation
if(isset($_POST['name']) == false || empty($_POST['name']) || isset($_POST['value']) == false || empty($_POST['value']) || isset($_POST['type']) == false || empty($_POST['type'])) {
    form_error();
}

$name = mysqli_real_escape_string($db, htmlspecialchars($_POST['name']));
$value = intval(mysqli_real_escape_string($db, htmlspecialchars($_POST['value'])));
$type = mysqli_real_escape_string($db, htmlspecialchars($_POST['type']));

$sql = "SELECT current FROM stocks WHERE name = '$name';";
$res = mysqli_query($db, $sql);

$ar = mysqli_fetch_array($res);

$current_old = intval($ar['current']);

$current_new = 0;
$difference_new = 0;
$percentage_new = 0;

// manipulate all data that needs to inserted into the database
if(strcmp($type,'current') == 0) {
    $current_new = abs($value);
    $difference_new = $current_old - $current_new;
    $percentage_new = ($difference_new / $current_old) * 100;
}
else if(strcmp($type,'difference') == 0) {
    $difference_new = -($value);
    $percentage_new = ($difference_new / $current_old) * 100;
    $current_new = $current_old - $difference_new;
}
else if(strcmp($type,'percentage') == 0) {
    $percentage_new = -($value);
    $difference_new = ($percentage_new * $current_old) / 100;
    $current_new = $current_old - $difference_new;
}
else {
    form_error();
}

// database query statements
$sql = "UPDATE stocks SET current=$current_new, difference=$difference_new, percentage=$percentage_new WHERE name=$name;";

$sql2 = "INSERT INTO updates (name, current, difference, percentage) VALUES ($name, $current_new, $difference_new, $percentage);";

if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2)) {
    form_error();
}
header('Location: index.php?success');