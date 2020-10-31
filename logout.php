<?php
session_start()
?>
<?php
if(isset($_SESSION['userid']))
{
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Logout</title>
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
    <div class="jumbotron">
    <center>
      <br><br><br>
    <?php
       session_destroy();
       ?>
         <div class="shadow-lg p-3 mb-5 bg-white rounded"><b>Successfully logged out</b></div>
       <?php
    ?>
    <br><br><br><br><br>

    <button type="button" class="btn btn-success btn-lg btn-block"><?php echo '<a href="login.php">Login</a>'; ?></button>
    </center>
    </div>
</body>
</html>
<?php
}

?>
