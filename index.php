<?php 
include 'connect.php';
session_start();
if(isset($_SESSION['user'])){
  header('location:display.php');
}
else {


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>display</title>
        <link rel="stylesheet" type="text/css" href="test.css" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
<div class="container">
    <div class="row">
    <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Login</h1>
          </div>
          <div class="panel-body">
            <form action="login.php" method="post" >
            <div class="form-group">
                <label for="email">Email or user name</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  placeholder="Enter email"
              
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  placeholder="Enter password"
                />
              </div>
              <button type="submit" name="login" class="btn btn-primary">login</button>
              <p>If you don't have user account, You can<a href="register.php"> Register Account!</a></p>
            </form>    
            </div>
</div>
    </body>
</html>
<?php
}
?>