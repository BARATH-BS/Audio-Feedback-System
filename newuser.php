 <!DOCTYPE html>
 <html lang="en" dir="ltr">
   <head>
     <meta charset="utf-8">
     <title>New User</title>
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
   </head>
   <body>
     <center>
     <img src="newuserlogo.jpg" alt="logo"><br><br><br>
   </center>
      <div class="container">
        <div class="jumbotron">
        <form  action="addnewuser.php" method="post">
          <div class="input-group input-group-lg">
            <div class="input-group-prepend">
              <span class="input-group-text">User-ID</span>
            </div>
            <input type="text" class="form-control" placeholder="Userid" name="userid" required>
          </div>
          <br><br>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">DOB</span>
            </div>
            <input type="date" class="form-control" placeholder="Date of Birth" name="dob" required>
          </div>
          <br><br>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Country</span>
            </div>
            <input type="text" class="form-control" placeholder="Country" name="country" required>
          </div>
          <br><br>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Educational Institute</span>
            </div>
            <input type="text" class="form-control" placeholder="Enter your school or collage name" name="eduinst" required>
          </div>
          <br><br>
          <div class="input-group mb-3">
            <div class="input-group-prepend">
              <span class="input-group-text">Password</span>
            </div>
            <input type="password" class="form-control" placeholder="Password" name="password" min="8" required>
          </div>

          <button type="submit" class="btn btn-primary btn-lg">Create Account</button>
        </form>
        </div>
      </div>

   </body>
 </html>
