<?php
include 'connect.php';
session_start();
if(isset($_SESSION['user'])){
$id=$_GET['updateid'];
$sql = "select * from registration where id=$id";
$result=mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);
$id=$row['id'];
$fullName=$row['fullName'];
$gender=$row['gender'];
$DOB =$row['DOB'];
$email=$row['email'];
$nationality=$row['nationality'];
$number=$row['number'];
$dateOfJoin=$row['dateOfJoin'];
$address=$row['address'];
$academicYear=$row['academicYear'];
$department=$row['department'];


if(isset($_POST['update'])){
  $fullName = $_POST['fullName'];
	$gender = $_POST['gender'];
	$email = $_POST['email'];
  $DOB = date("y-m-d" , strtotime($_POST['DOB']));
	$nationality = $_POST['nationality'];
	$number = $_POST['number'];
  $dateOfJoin= date("y-m-d" , strtotime($_POST['dateOfJoin']));
	$address = $_POST['address'];
	$academicYear = $_POST['academicYear'];
	$department = $_POST['department'];
  $file =addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
  

	
    
	$sql="update registration set id=$id,fullName='$fullName'
    ,gender='$gender',DOB='$DOB',email='$email',nationality='$nationality',number='$number',dateOfJoin='$dateOfJoin',
    address='$address',academicYear='$academicYear',department='$department', image='$file'
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
    <title>Update Page</title>
    <link rel="stylesheet" type="text/css" href="test.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  </head>
  <body>
    <div class="container">
      <div class="row col-md-6 col-md-offset-3">
        <div class="panel panel-primary">
          <div class="panel-heading text-center">
            <h1>Update Data</h1>
          </div>
          <div class="panel-body">
            <form  method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="lastName">FULL Name</label>
                <input
                  type="text"
                  class="form-control"
                  id="fullName"
                  name="fullName"
                  value="<?php echo $fullName; ?>"
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
                      <?php if($gender=='m')
                      echo "checked";?>
                    />Male</label
                  >
                  <label for="female" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="f"
                      id="female"
                     <?php if($gender=='f')
                      echo "checked"; ?>
                    />Female</label
                  >
                  <label for="others" class="radio-inline"
                    ><input
                      type="radio"
                      name="gender"
                      value="o"
                      id="others"
                      <?php if($gender=='o')
                      echo "checked"; ?>
                    />Others</label
                  >
                </div>
              </div>
              <div class="form-group">
                <label for="DOB">Date of Birth</label>
                <input
                  type="date"
                  class="form-control" 
                  id="DOB"
                  name="DOB"
                  value="<?php echo $DOB; ?>"
                 />
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
                <label for="lastName">Nationality</label>
                <input
                  type="text"
                  class="form-control"
                  id="nationality"
                  name="nationality"
                  value="<?php echo $nationality; ?>"
                />
              </div>
              <div class="form-group">
                <label for="number">Phone Number</label>
                <input
                  type="tel"
                  class="form-control"
                  id="number"
                  name="number"
                  value="<?php echo $number; ?>"
                />
              </div>
              <label for="dateOfJoin">Date of Join</label>
                <input
                  type="date"
                  class="form-control" 
                  id="dateOfJoin"
                  name="dateOfJoin"
                  value="<?php echo $dateOfJoin; ?>"
                 />
              <div class="form-group">
                <label for="lastName">Address</label>
                <input
                  type="text"
                  class="form-control"
                  id="address"
                  name="address"
                  value="<?php echo $address; ?>"
                />
                <div class="form-group">
                  <label for="academicYear">Academic year</label>
                  <div>
                    <label for="academicYear" class="list-inline"
                      ><select id="academicYear" name="academicYear" value="<?php echo $academicYear; ?>"
>
                        <option name="academicYear"
                        value="preparatory year"
                        id="preparatory year"
                        <?php if($academicYear=='1th year')
                      echo "selected"; ?>>preparatory year</option>
                        <option name="academicYear"
                        value="1th year"
                        id="1th year"
                        <?php if($academicYear=='1th year')
                      echo "selected"; ?>
                        >1th year</option>
                        <option name="academicYear"
                        value="2th year"
                        id="2th year"
                        <?php if($academicYear=='2th year')
                      echo "selected"; ?>>2th year</option>
                        <option name="academicYear"
                        value="3th year"
                        id="3th year"
                        <?php if($academicYear=='3th year')
                      echo "selected"; ?>>3th year</option>
                        <option name="academicYear"
                        value="4th year"
                        id="4th year"
                        <?php if($academicYear=='4th year')
                      echo "selected"; ?>>4th year</option>

                      </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="department">Department</label>
                  <div>
                    <label for="department" class="list-inline"
                      ><select id="department" name="department" value="<?php echo $department; ?>"
>
                        <option name="department"
                        value="power electricity"
                        id="power electricity"
                        <?php if($department=='power electricity')
                      echo "selected"; ?>>power electricity</option>
                        <option name="department"
                        value="communction and computer"
                        id="communction and computer"
                        <?php if($department=='communction and computer')
                      echo "selected"; ?>
                        >communction and computer</option>
                        <option name="department"
                        value="mechanical"
                        id="mechanical"
                        <?php if($department=='mechanical')
                      echo "selected"; ?>>mechanical</option>
                        
                      </select>
                  </div>
                </div>
              <div class="form-group">
                <label for="image">image</label>
                <input
                  type="file"
                  class="form-control"
                  id="image"
                  name="image"
                  required
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
