<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Check</title>
    <style media="screen">
      body{background-color: #e0feff;}
      a
      {
        text-decoration: none;
        color: black;
      }
      button
      {
        width: 250px;
        height: 50px;
        border: solid black 5px;
        border-radius: 20px;
        background-color: #73ffa2;
      }
    </style>
  </head>
  <body>
    <center>
      <?php
      unset($_SESSION['userid']); //to unset any previous session array
      include ("connection.php");
      $user=$_POST["userid"]; //user id from form
      $sql="SELECT * FROM login WHERE userid='$user'"; //sql for password check
      $content=$connect->query($sql); //content from database
      while($row = $content->fetch_assoc())
      {
        if(($row['password']==$_POST['password'])) //if password matches
        {
          $_SESSION['userid']=$_POST['userid']; //setting session variable
        }
      }
      if(isset($_SESSION['userid'])) //if valid user, leeting to do the operation
      {?>
        <?php
        echo '<script> window.location.href = "home.php";</script>';
        ?>
      <?php
      }
      else //invalid user, redirected to login page
      {
        echo '<script> window.location.href = "login.php";</script>';
      }
      ?>
    </center>
  </body>
</html>