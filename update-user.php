<?php
include 'connect.php';
session_start();
if(isset($_SESSION['user'])){
$id=$_GET['updateid'];
$sql = "select * from user where id=$id";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
    $firstName=$row['firstName'];
    $lastName=$row['lastName'];
    $gender=$row['gender'];
    $email=$row['email'];
    $password=$row['password'];
    $number=$row['number'];

if(isset($_POST['update'])){
    $firstName = $_POST['firstName'];
	$lastName = $_POST['lastName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$number = $_POST['number'];
  $file =addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	
    
	$sql="update user set id=$id,firstName='$firstName',lastName='$lastName'
    ,gender='$gender',email='$email',password='$password',number='$number', image='$file'
    where id=$id";
	$result =mysqli_query($conn,$sql);
    if($result){
        header('location:display.php');
    }else{
        die(mysqli_error($conn));
    }
    
} 
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registration Page</title>
    <link rel="stylesheet" type="text/css" href="test.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
  </head>
  <body>
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Registration Form</h1>
          </div>
          <div class="panel-body">
            <form  method="post" enctype="multipart/form-data">
              <div class="form-group">
                <label for="firstName">First Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="firstName"
                  name="firstName"
                  value="<?php echo $firstName; ?>"
                />
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="lastName"
                  name="lastName"
                  value="<?php echo $lastName; ?>"
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
                      <?php  
                      if($gender == 'm'){
                        echo 'checked';
                      }
                      ?>
                    />Male</label
                  >
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="f"
                      id="female"
                      <?php  
                      if($gender == 'f'){
                        echo 'checked';
                      }
                      ?>
                    />Female</label
                  >
                  <label for="others" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="o"
                      id="others"
                      <?php  
                      if($gender == 'o'){
                        echo 'checked';
                      }
                      ?>
                    />Others</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="email">Email</label>
                <input
                  type="text"
                  class="form-control"
                  id="email"
                  name="email"
                  value="<?php echo $email; ?>"
                />
              </div>
              <div class="form-group">
                <label for="password">Password</label>
                <input
                  type="password"
                  class="form-control"
                  id="password"
                  name="password"
                  value="<?php echo $password; ?>"
                />
              </div>
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input
                  type="number"
                  class="form-control"
                  id="number"
                  name="number"
                  value="<?php echo $number; ?>"
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
                />
              </div>
              <button type="submit" class="btn btn-primary" name="update">update</button>
            </form>
          </div>
          
        </div>
      </div>
    </div>
   
  </body>
</html>
<?php 
}else{
  header('location:index.php');
    exit();
}
?>
