<?php
include 'connect.php';
session_start();
if(isset($_SESSION['user'])){
	$fullName = $_POST['fullName'];
	$gender = $_POST['gender'];
	$DOB = date("y-m-d" , strtotime($_POST['DOB']));
	$email = $_POST['email'];
	$nationality = $_POST['nationality'];
	$number = $_POST['number'];
	$dateOfJoin = date("y-m-d" , strtotime($_POST['dateOfJoin']));
	$address = $_POST['address'];
	$academicYear = $_POST['academicYear'];
	$department = $_POST['department'];
	$file =addslashes(file_get_contents($_FILES["image"]["tmp_name"]));
	

		$query = "insert into registration(fullName, gender,DOB, email, nationality,number ,dateOfJoin ,address,academicYear ,department, image) values('$fullName', '$gender','$DOB', '$email' , ' $nationality', '$number ', '$dateOfJoin' ,'$address','$academicYear','$department','$file')";
        $query_run = mysqli_query($conn, $query);
		if($query_run){
			header('location:display.php');
		}
		else{
			die(mysqli_error($conn));
		}
	}else{
		header('location:index.php');
    exit();
	}
?>


