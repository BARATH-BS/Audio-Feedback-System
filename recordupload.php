<?php session_start();
//echo $_SESSION['userid']; ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Record upload</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <style media="screen">
    body{
      background-color: light grey;
    }
      #knowmore
      {
        width: 60%;
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
        <li class="breadcrumb-item"><a href="record.php">Record</a></li>
        <li class="breadcrumb-item active" aria-current="recordupload.php">Record Upload</li>
      </ol>
    </nav>

    <?php
    include ("connection.php");
    $user=$_SESSION['userid'];
    $SpeechContent=$_POST['SpeechContent'];
    $Confidence=$_POST['confidence'];
    date_default_timezone_set("Asia/Calcutta");
    $date=date("Y:m:d");
    $sql_speech = "INSERT INTO speech (userid, sdate, content, confidence) VALUES ('$user','$date','$SpeechContent','$Confidence')";
    $connect->query($sql_speech);

    $NumberDigits=array("0","1","2","3","4","5","6","7","8","9","10");
    $NumberWords=array("zero","one","two","three","four","five","six","seven","eight","nine","ten");
    $NumberNotNormal=array("zero","one","tu","e3","four","five","six","saavn","88","nine","ten");
    $criteria=array("overall","technology","environment","knowledge","mode");
    $actualvalue=array(5,5,5,5,1);
    $outof="out of";
    echo $SpeechContent;
    $speech=(explode($outof,$SpeechContent)); //break the speechcontent
    for ($i=0; $i<count($criteria); $i++)
    {
      $speech[$i]=trim($speech[$i]," "); //to remove white spaces from both the end
      $subarray=(explode(" ",$speech[$i])); //break each element in speech
      $criteria[$i]=$subarray[count($subarray)-1];
    }
    for($i=0;$i<count($criteria);$i++)
    {
      $index1=array_search($criteria[$i],$NumberDigits,true);
      $index2=array_search($criteria[$i],$NumberWords,true);
      $index3=array_search($criteria[$i],$NumberNotNormal,true);
      $actualvalue[$i]=max($index1,$index2,$index3);
    }
    //to find the teaching mode
    $array4=(explode(" ",$speech[count($speech)-1]));
    for($i=0;$i<count($array4);$i++)
    {
      if(strtolower($array4[$i])=="online")
      {
        $actualvalue[4]=1;
        break;
      }
      else
      {
        $actualvalue[4]=0;
      }
    }
    $sql_dataset = "INSERT INTO dataset (userid, sdate, overall,technology,environment,knowledge,mode) VALUES ('$user','$date','$actualvalue[0]','$actualvalue[1]','$actualvalue[2]','$actualvalue[3]','$actualvalue[4]')";
    $connect->query($sql_dataset);
      ?>
      <!--<a href="predict.py">click</a>-->
     <center>
     <form id="future" action="predict.py" method="post" enctype="multipart/form-data">
       <div class="input-group-prepend">
         <span class="input-group-text">User ID</span>
       </div>
       <div class="shadow-lg p-3 mb-5 bg-white rounded">
       <input type="text" name="userid" value="<?php echo $_SESSION['userid']; ?>" readonly>
       </div>
       <div class="input-group-prepend">
         <span class="input-group-text">Date</span>
       </div>
       <div class="shadow-lg p-3 mb-5 bg-white rounded">
       <input type="text" name="date" value="<?php echo $date; ?>" readonly>
       </div>
       <button id="knowmore" type="submit" class="btn btn-primary btn-lg btn-block">Want to know how your class would tomorrow</button>
     </form>
   </center>
  </body>
</html>
