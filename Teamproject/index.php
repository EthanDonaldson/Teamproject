<?php
session_start();

include("connections.php");
include("functions.php");

$user_data = check_login($con);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Free Speech Hub</title>
    <link rel='stylesheet'  href='style.css'>
</head>
<body>
<nav>
        <label class="logo">Free Speech Hub</label>
        <ul>
            <li><a href= "logout.php">Log out</a></li>
            <li><a href="index.php">Home</a></li>
            <li><a href="https://team-project-demo.freeforums.net/" target="_blank">Forum</a></li>
            <li><a href="upload.php">Upload</a></li>
        </ul>
</nav>
<div>
 
 <?php
 $fetchVideos = mysqli_query($con1, "SELECT * FROM videos ORDER BY id DESC");
 while($row = mysqli_fetch_assoc($fetchVideos)){
   $location = $row['location'];
   $name = $row['name'];
   echo "<div style='float: left; margin-right: 5px;'>
      <video src='".$location."' controls width='320px' height='320px' ></video>     
      <br>
      <span>".$name."</span>
   </div>";
 }
 ?>        
        <script src="script.js"></script>
    
</body>
    
</body>
</html>
