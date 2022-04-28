<?php
include("connections.php");
 
if(isset($_POST['but_upload'])){
   $maxsize = 5242880; // 5MB
   if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ''){
       $name = $_FILES['file']['name'];
       $target_dir = "videos/";
       $target_file = $target_dir . $_FILES["file"]["name"];

       // Select file type
       $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

       // Valid file extensions
       $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

       // Check extension
       if( in_array($extension,$extensions_arr) ){
 
          // Check file size
          if(($_FILES['file']['size'] >= $maxsize) || ($_FILES["file"]["size"] == 0)) {
             $_SESSION['message'] = "File too large. File must be less than 5MB.";
          }else{
             // Upload
             if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){
               // Insert record
               $query = "INSERT INTO videos(name,location) VALUES('".$name."','".$target_file."')";

               mysqli_query($con1,$query);
               $_SESSION['message'] = "Upload successfully.";
             }
          }

       }else{
          $_SESSION['message'] = "Invalid file extension.";
       }
   }else{
       $_SESSION['message'] = "Please select a file.";
   }
   header('location: upload.php');
   exit;
} 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Upload</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' href='form.css'>
    <script src='main.js'></script>
</head>
<body>
    <?php
    
    if(isset($_SESSION['message'])){
        echo $_SESSION['message'];
        unset($_SESSION['message']);
    }

    ?>

    <div class= "Sign-up-form">
        <h1>Upload your video</h1>
        <form method="post" action="" enctype='multipart/form-data'>
        <input type='file' name='file' />
        <input type='submit' value='Upload' name='but_upload'>
        <p>Back to homepage <a href="index.php">Home</a></p>
        </form>
    
    </div>
</body>
</html>
