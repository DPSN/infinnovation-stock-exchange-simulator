<?php
//Set database settings
$host = getenv("AWS_RDS_INSTANCE_MYSQL_DB_HOST");
$username = getenv("AWS_RDS_INSTANCE_MYSQL_DB_USERNAME");
$password = getenv("AWS_RDS_INSTANCE_MYSQL_DB_PASSWORD");
$database = "infinnovationses";
//-----------------------------
$db = mysqli_connect($host, $username, $password, $database) or die("Database connection failed.");
