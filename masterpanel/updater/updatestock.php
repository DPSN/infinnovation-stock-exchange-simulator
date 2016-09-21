<?php
include('../../db.php');

function form_error() {
    die(header('Location: index.php?error'));
}

// form validation
if(isset($_POST['name']) == false || empty($_POST['name']) || isset($_POST['value']) == false || empty($_POST['value']) || isset($_POST['type']) == false || empty($_POST['type'])) {
    form_error();
}
