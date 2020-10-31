<?php session_start();
//echo $_SESSION['userid']; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
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
        <li class="breadcrumb-item active" aria-current="home.php">Home</li>
      </ol>
    </nav>
    <div class="jumbotron">
    <center>
    <table cellpadding = "100">
      <tr>
        <td>
          <div class="card border-info mb-3" style="width: 18rem;">
            <img src="HowWasYourDay.jpg" class="card-img-top" alt="View">
            <div class="card-body">
              <h5 class="card-title">Upload audio</h5>
              <p class="card-text">Upload your audio</p>
              <a href="record.php" class="btn btn-primary">Say how was your day</a>
            </div>
          </div>
        </td>

        <td>
          <div class="card border-info mb-3" style="width: 18rem;">
            <img src="viewrecords.jpg" class="card-img-top" alt="Record">
            <div class="card-body">
              <h5 class="card-title">View</h5>
              <p class="card-text">View your records</p>
              <a href="view.php" class="btn btn-primary">Old records</a>
            </div>
          </div>
        </td>
      </tr>
      <tr>
        <td>
          <div class="card border-info mb-3" style="width: 18rem;">
            <img src="profileimg.png" class="card-img-top" alt="Profile">
            <div class="card-body">
              <h5 class="card-title">Profile</h5>
              <p class="card-text">View your profile</p>
              <a href="profile.php" class="btn btn-primary">Profile</a>
            </div>
          </div>
        </td>

        <td>
          <div class="card border-info mb-3" style="width: 18rem;">
            <img src="logoutpic.jpg" class="card-img-top" alt="How Was Your Day">
            <div class="card-body">
              <h5 class="card-title">Logout</h5>
              <p class="card-text">Logout from this device</p>
              <a href="logout.php" class="btn btn-primary">Logout</a>
            </div>
          </div>
        </td>

      </tr>
    </table>
    </div>
  </center>
  </body>
</html>
