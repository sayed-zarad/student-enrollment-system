<?php
include 'connect.php';
session_start();
if(isset($_SESSION['user'])){
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];
    $sql="delete from registration where id=$id";
    $result = mysqli_query($conn,$sql);
    if($result){
        header('location:display.php');
    }else{
        die("Connection Failed : ". $conn->connect_error);
    }
}

}else{
    header('location:index.php');
    exit();
}
?>