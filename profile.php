<?php session_start();
//echo $_SESSION['userid']; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>View Profile</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style media="screen">
      body{
        background-color: black;
      }
    </style>
    </head>
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
        <li class="breadcrumb-item active" aria-current="profile.php">Profile</li>
      </ol>
    </nav>

    <?php
    include ("connection.php");
    $user=$_SESSION['userid'];
    $sql="SELECT * FROM newuser WHERE userid='$user'";
    $content=$connect->query($sql);
    while ($row=$content->fetch_assoc())
    {
      ?>
      <div class="jumbotron">
          <div class="input-group-prepend">
            <span class="input-group-text">User ID</span>
          </div>
          <div class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo $row['userid']; ?></div>

        <div class="input-group-prepend">
          <span class="input-group-text">Date Of Birth</span>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo $row['dob']; ?></div>

        <div class="input-group-prepend">
          <span class="input-group-text">Country</span>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo $row['country']; ?></div>

        <div class="input-group-prepend">
          <span class="input-group-text">Institute</span>
        </div>
        <div class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo $row['institute']; ?></div>
      </div>
      <?php
    }
     ?>
     <form action="changepass.php" method="post">
       <input type="submit" name="cp" value="Change Password" class="btn btn-outline-success btn-lg btn-block">
     </form>
     <br><br>

     <form action="editprofile.php" method="post">
       <input type="submit" name="ep" value="Edit Profile" class="btn btn-outline-primary btn-lg btn-block">
     </form>

     <br><br><br><br>
  </body>
</html>
