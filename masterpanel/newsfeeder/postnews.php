<?php
include('../../db.php');

function form_error() {
    die(header('Location: index.php?error'));
}

// form validation
if(isset($_POST['message']) == false || empty($_POST['message'])) {
    form_error();
}

// get current time
date_default_timezone_set('Asia/Kolkata');
$news = mysqli_real_escape_string($db, htmlspecialchars($_POST['message']));
$time = date('d/m/y H:i');

$sql = "INSERT INTO news (time, content) VALUES ('$time','$news');";

// insert data into database
if(mysqli_query($db, $sql) == false) {
    form_error();
}
header('Location: index.php?success');
