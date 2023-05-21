<?php
session_start();
if($_SERVER['REQUEST_METHOD']=='POST'){


include 'connect.php';

if(isset($_POST['login']))
    {
        $email = $_POST['email'];
	    $password = $_POST['password'];
        if(empty($email)|| empty($password)){
            echo "please fill in the blanks";
        }
        else{
            $query = "select * from user where email = '$email' or userName = '$email'";
            $query_run = mysqli_query($conn, $query);
            if($row=mysqli_fetch_assoc($query_run)){
                $dp_pass=$row['password'];
                if($password==$dp_pass){
                    $_SESSION['user']=$email;
                    header('location:display.php');
                }
                else{
                    echo "wrong password";
                }
            }
            else{
                echo "please check ur quary";
            }
        } 	
    }
}

?>

