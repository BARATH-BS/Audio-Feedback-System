<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  </head>
  <body>
    <center>
    <img src="newuserlogo.jpg" alt="logo"><br><br><br>
    </center>
    <div class="jumbotron">
      <center><h1>AUDIO FEEDBACK SYSTEM</h1><br><br><br></center>
        <form action="check.php" method="post">
          <div class="form-group">
            <label for="uid">User-ID</label>
            <input type="text" class="form-control" id="uid" name="userid">
          </div>
          <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <input type="submit" class="btn btn-primary" value="Login">
        </form><br><br><br>
        <hr>
        <b>Note :</b>This page remains the same if wrong credentials are entered.
        <hr>
    </div>
  </body>
</html>
