<?php
include('../../db.php');

function form_error() {
    die(header('Location: index.php?error'));
}

// form validation
if(isset($_POST['name']) == false || empty($_POST['name'])) {
    form_error();
}

$name = mysqli_real_escape_string($db, htmlspecialchars($_POST['name']));

// database query statements
$sql = "DELETE FROM stocks WHERE name='$name';";
$sql2 = "DELETE FROM updates WHERE name='$name';";

if(mysqli_query($db, $sql) == false || mysqli_query($db, $sql2) == false) {
    form_error();
}
header('Location: index.php?success');