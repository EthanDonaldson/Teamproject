<?php
session_start();

  include("connections.php");
  include("functions.php");

  if($_SERVER['REQUEST_METHOD'] == "POST")
  {
      //something posted
      $user_name = $_POST['user_name'];
      $password = $_POST['password'];

      if(!empty($user_name) && !empty($password) && !is_numeric($user_name))
      {

          //save to database
          $user_id = random_num(20);
          $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";

          mysqli_query($con, $query);

          header("Location: login.php");
          die;
      }else
      {
          echo "Please enter some valid information!";
      }

  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel='stylesheet' href='form.css'>
</head>
<body>
<div class= "Sign-up-form" id= "box">
        <div style="font-size: 20px;margin: 10px; font-family: Georgia, 'Times New Roman', Times, serif; color: cadetblue;">Sign up</div>
        <form method="post">
            <input type= "text" name= "user_name" placeholder="Enter your Username"><br><br>
            <input type= "password" name= "password"  placeholder="Enter your password"><br><br>
            <input type= "submit" value= "Signup"><br><br>

            <a href="login.php">Click here to Login</a><br><br>
        </form>
    
    </div>
</body>
</html>