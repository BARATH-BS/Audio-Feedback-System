<?php session_start();
//echo $_SESSION['userid']; ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Record</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
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
        <li class="breadcrumb-item active" aria-current="record.php">Record</li>
      </ol>
    </nav>

    <center>
      <table cellpadding = "100">
        <tr>
          <td id="One">
            <p>Follow this order</p>
            <p>1 Overall</p>
            <p>2 Technology</p>
            <p>3 Environment</p>
            <p>4 Knowledge</p>
            <p>5 Mode (online or Offline)</p>
            <p><b>Use the word out of 10</b></p>
            <p><b>Example:</b> For Overall experience, I would rate it 7 out of 10.</p>
          </td>
          <td id="Two">
            <center>
            <form  action="recordupload.php" method="post">
              <h1>Speech Recogination</h1>
              <textarea id="textbox" rows="10" cols="80" class="btn btn-outline-info" name="SpeechContent" readonly></textarea>
              <br><br><br>
              <button id="start" name="start" class="btn btn-success btn-lg">Start</button>
              <button id="end" name="end" class="btn btn-danger btn-lg">End</button>
              <button type="submit" id="sub" name="upload" class="btn btn-warning btn-lg">Upload</button><br><br>
              <p id="instructions" >Press Start button to start recognition</p>
              <p id="confi"></p>
              <textarea id="confidence" name="confidence" hidden readonly></textarea>
            </form>
            </center>
          </td>
        </tr>
      </table>
    </center>
    <script src="record.js"></script>
  </body>
</html>
