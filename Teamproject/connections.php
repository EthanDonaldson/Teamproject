<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "login_db";
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname1 = "upload_db"; /* Database name */


if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}


$con1 = mysqli_connect($host, $user, $password,$dbname1);
// Check connection
if (!$con1) {
  die("Connection failed: " . mysqli_connect_error());
}
