<?php
session_start();
$dbhost = "localhost";
	$dbuser = "root";
	$dbpass = "";
	$dbname = "matladb";

	//Create Connection
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if(mysqli_connect_errno())
{
echo 'database connection failed with following error '.mysqli_connect_error();
    die();
}


?>

