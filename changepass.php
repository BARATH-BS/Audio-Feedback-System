<?php session_start();
//echo $_SESSION['userid'] ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Change Password</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style media="screen">
      body{
        background-color: black;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark sticky-top">
      <a class="navbar-brand" href="home.php">AFS</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item active">
            <a class="nav-link" href="record.php">Upload<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="view.php">View Recordings</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="profile.php">Profile</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php">Logout</a>
          </li>
        </ul>
      </div>
    </nav>
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item"><a href="profile.php">Profile</a></li>
        <li class="breadcrumb-item active" aria-current="changepass.php">Change Password</li>
      </ol>
    </nav>


    <?php
    if(isset($_POST['npass']))
    {
    include ("connection.php");
    $user=$_SESSION['userid'];
    $npass=$_POST['npass'];
    $sql="UPDATE login SET password='$npass' WHERE userid='$user'";
    $connect->query($sql);
    ?>
    <div class="jumbotron">
      <div class="shadow-lg p-3 mb-5 bg-white rounded"><b>Password Updated</b> </div>
    </div>

    <?php
    }
     ?>
    <div class="jumbotron">
      <form  action="changepass.php" method="post">
        <div class="input-group input-group-lg">
          <div class="input-group-prepend">
            <span class="input-group-text">New Password</span>
          </div>
          <input type="password" class="form-control" placeholder="New Password" name="npass" required>
        </div>
        <br><br><br>
        <input type="submit" name="cp" value="Change Password" class="btn btn-outline-success btn-lg btn-block">
      </form>
    </div>
  </body>
</html>
