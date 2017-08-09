<?php
//Set database settings
$host = getenv("OTHER_OPENSHIFT_APP_MYSQL_DB_HOST");
$username = getenv("OTHER_OPENSHIFT_APP_MYSQL_DB_USERNAME");
$password = getenv("OTHER_OPENSHIFT_APP_MYSQL_DB_PASSWORD");
$port = getenv("OTHER_OPENSHIFT_APP_MYSQL_DB_PORT");
$database = "infinnovationsesdb";
//-----------------------------
$db = mysqli_connect($host, $username, $password, $database, $port) or die("Database connection failed.");
