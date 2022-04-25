<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname1 = "upload_db"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname1);
// Check connection
if (!$con) {
  die("Connection failed: " . mysqli_connect_error());
}