<?php
include 'connect.php';

if(isset($_POST['signup'])){
  $firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$userName = $_POST['userName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
  $cpassword = $_POST['cpassword'];
	$number = $_POST['number'];
  $file =addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	
    $query = "select * from user where email = '$email' or userName='$userName'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        $num=mysqli_num_rows($query_run);
        if($num>0)
        {
          echo '<script type="text/javascript">

          window.onload = function () { alert("this account already exit"); }

</script>';
        }
        else {
            if ($password==$cpassword)
            {
                $query = "insert into user(firstName, lastName, userName,gender, email, password, number , image) values('$firstName', '$lastName','$userName', '$gender', '$email' , ' $password', '$number ' ,'$file')";
                $query_run = mysqli_query($conn, $query);
                if($query_run){
                    header('location:display.php');
                }
                else{
                    die(mysqli_error($conn));
                }
            }
        else{
          echo '<script type="text/javascript">

          window.onload = function () { alert("passward did\'t match"); }

</script>';
           
        }
        }
} }
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
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
<div class="container">
    <div class="row">
    <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Sign up</h1>
          </div>
          <div class="panel-body">
            <form method="post" enctype="multipart/form-data">
    
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="firstName"
                  name="firstName"
                  autocomplete="off"
                  required
                />
              </div>

              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastName"
                  name="lastName"
                  autocomplete="off"
                  required
                />
              </div>
              <div class="form-group">
                <label for="userName">user Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="userName"
                  name="userName"
                  autocomplete="off"
                  required
                />
              </div>
              <div class="form-group">
                <label for="gender">Gender</label>
                <div>
                  <label for="male" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="m"
                      id="male"
                      checked
                    />Male</label
                    >
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="f"
                      id="female"
                    />Female</label
                  >
                  <label for="others" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="o"
                      id="others"
                    />Others</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="email"
                  class="form-control"
                  id="email"
                  name="email"
                  required
                />
              </div>
              
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input
                  type="number"
                  class="form-control"
                  id="number"
                  name="number"
                  autocomplete="off"
                  required
                />
              </div>
              <div class="form-group">
                <label for="image">image</label>
                <input
                  type="file"
                  class="form-control"
                  id="image"
                  name="image"
                  accept=".jpg , .jpeg , .png"
                  required
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
                  autocomplete="off"
                  required

                />
              </div>
              <div class="form-group">
                <label for="cpassword">confirm Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="cpassword"
                  name="cpassword"
                  placeholder="Re enter password"
                  autocomplete="off"
                  required

                />
              </div>
              </div>
              <button type="submit" name="signup" class="btn btn-primary">sign up</button>
              <p>If you have already user account, You can<a href="index.php"> Login !</a></p>
            </form>    
            </div>
</div>
    </body>
</html>