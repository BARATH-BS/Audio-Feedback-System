<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Add new user</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style media="screen">
    a
    {
      text-decoration: none;
      color: black;
    }
    </style>
  </head>
  <body>
    <center>
    <img src="newuserlogo.jpg" alt="logo"><br><br><br>
  </center>
    <?php
    include ("connection.php");
    $user=$_POST['userid'];
    $dob=$_POST['dob'];
    $country=$_POST['country'];
    $eduinst=$_POST['eduinst'];
    $password=$_POST['password'];
    include ("connection.php");
    $sql="SELECT userid FROM newuser WHERE userid='$user'";
    $content=$connect->query($sql); //content from database
    if(mysqli_num_rows($content)!=0)
    {
      ?>
      <div class="jumbotron">
      <div class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo $user.", this UserID is already used, try with different combination"; ?></div><br><br><br><br><br><br>
      <center>
      <button type="button" class="btn btn-warning btn-lg btn-block"><?php echo '<a href="newuser.php">Register</a>'; ?></button><br><br><br><br><br><br><br><br>
      </center>
      </div>
      <?php
    }
    else
    {
      $sql_add = "INSERT INTO newuser (userid, dob, country, institute) VALUES ('$user','$dob','$country','$eduinst')";
      $connect->query($sql_add);
      $sql_login = "INSERT INTO login (userid, password) VALUES ('$user','$password')";
      $connect->query($sql_login);
      ?>
      <div class="jumbotron">
      <div class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo $user.", account created successfully"; ?></div><br><br><br><br><br><br>
      <center>
      <button type="button" class="btn btn-success btn-lg btn-block"><?php echo '<a href="login.php">Login</a>'; ?></button><br><br><br><br><br><br><br><br>
      </center>
      </div>
      <?php
    }
       ?>

  </body>
</html>
