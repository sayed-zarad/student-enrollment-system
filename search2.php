<?php
session_start();
if(isset($_SESSION['user'])){
include 'connect.php';

function getAge($dob){
    $bday = new DateTime($dob);
    $today = new Datetime(date('m.d.y'));
    if($bday>$today){
      return 'You are not born yet';
    }
    $diff = $today->diff($bday);
    return ' '.$diff->y;
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>search</title>
    <link rel="stylesheet" type="text/css" href="test.css" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
    <style>

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav a:hover {
  background-color: #ddd;
  color: black;
  
}

.topnav a.active {
    background-color: #ddd;
  color: black; 
}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <!--<button class ="btn btn-primary my-5">
        <a href="display.php" class="text-light">home</a>
        </button>
        <button class ="btn btn-primary my-5" ><a href="test.html" class="text-light">Add user</a>
    </button>-->

    <div class="topnav">
  <a class="active" href="display.php" style="padding-bottom:32px;">Home</a>
  <a href="test.html" style="padding-bottom:32px;">Add Student</a>
  <a href="user.php" style="padding-bottom:32px;"> User Profile</a>
  <a href="log-out.php"><span class="glyphicon glyphicon-log-in col-md-12" ></span> Logout</a>
</div>

    <form action="search2.php" method="get">
    <div class="form-group" style="    margin-top: 50px;      margin-bottom: 30px;">
        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
        <button type="submit" class="btn btn-primary">Search</button>
    </div>
    </form>
    <table class="table">
    <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">fullName</th>
                    <th scope="col">gender</th>
                    <th scope="col">age</th>
                    <th scope="col">email</th>
                    <th scope="col">nationality</th>
                    <th scope="col">number</th>
                    <th scope="col">dateOfJoin</th>
                    <th scope="col">adress</th>
                    <th scope="col">academicYear</th>
                    <th scope="col">department</th>
                    <th scope="col">image</th>
                </tr>
            </thead>
<tbody>
<?php 
   
    if(isset($_GET['search']))
    {
        $filtervalues = $_GET['search'];
        $query = "SELECT * FROM registration WHERE fullName  LIKE '%$filtervalues%' ";
        $query_run = mysqli_query($conn, $query);

        if(mysqli_num_rows($query_run) > 0)
        {
            while($row=mysqli_fetch_assoc($query_run)){
                $id=$row['id'];
                $fullName=$row['fullName'];
                $gender=$row['gender'];
                $DOB=$row['DOB'];
                $email=$row['email'];
                $nationality=$row['nationality'];
                $number=$row['number'];
                $dateOfJoin=$row['dateOfJoin'];
                $address=$row['address'];
                $academicYear=$row['academicYear'];
                $department=$row['department'];
    
                echo '<tr>
                <th scope="row">'.$id.'</th>
                <td>'.$fullName.'</td>
                <td>'.$gender.'</td>
                <td>'.getAge($DOB).'</td>
                <td>'.$email.'</td>
                <td>'.$nationality.'</td>
                <td>'.$number.'</td>
                <td>'.$dateOfJoin.'</td>
                <td>'.$address.'</td>
                <td>'.$academicYear.'</td>
                <td>'.$department.'</td>
                <td> <img src="data:image;base64,'.base64_encode($row['image']).'" alt="image" style="width:100px; height:100px;"> </td>
                <td>
                <button class ="btn btn-primary"><a class="text-light" href="update.php?updateid='.$id.'">Update</a></button>
                <button class ="btn btn-danger"><a class="text-light" href="delete.php?deleteid='.$id.'">Delete</a></button>
                </td>
                </tr>';
            }
            
        }
        
        else
        {
            ?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
            <?php
        }
    }
?>

</tbody>
</table>
    </div>
</body>
</html>
<?php
}else{
    header('location:index.php');
    exit();
}
?>