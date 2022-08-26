<?php

$sname= "localhost";
$email= "root";
$password = "";

$db_name = "demo";

$link = mysqli_connect($sname, $email, $password, $db_name);

if (!$link) {
	echo "Connection failed!";
}