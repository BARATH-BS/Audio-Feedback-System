<?php session_start();
//echo $_SESSION['userid'];
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Old records</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style media="screen">
      body{
        background-color: black;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
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
        <li class="breadcrumb-item active" aria-current="view.php">View</li>
      </ol>
    </nav>


    <?php
    include ("connection.php");
    $user=$_SESSION['userid'];
    if(isset($_POST["indate"]))
    {
      $d=$_POST['indate'];
      $d=str_replace("-",":",$d);
      $sql="SELECT * FROM speech WHERE userid='$user' AND sdate='$d'";
      $content=$connect->query($sql);
      if(mysqli_num_rows($content)>0)
      {
        while($row = $content->fetch_assoc())
        {
          ?>
          <div class="jumbotron">
              <div class="input-group-prepend">
                <span class="input-group-text">Date</span>
              </div>
              <div class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo $row['sdate']; ?></div>

            <div class="input-group-prepend">
              <span class="input-group-text">Content</span>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo $row['content']; ?></div>

            <div class="input-group-prepend">
              <span class="input-group-text">Confidence</span>
            </div>
            <div class="shadow-lg p-3 mb-5 bg-white rounded"><?php echo $row['confidence']; ?></div>
        </div>
          <?php
        }
      }
      else
      {
        ?>
        <div class="jumbotron">
        <?php
          echo "You didn't upload on that day";
          ?>
        </div>
        <?php
      }
    }
     ?>
     <div class="jumbotron">
     <form action="view.php" method="post">
         <div class="input-group mb-3">
           <div class="input-group-prepend">
             <span class="input-group-text">Select Date</span>
           </div>
           <input type="date" class="form-control" placeholder="Select Date" name="indate">
         </div>
           <button type="submit" class="btn btn-primary" id="submit" name="search">Search</button>
         </div>
     </form>
     </div>
  </body>
</html>
