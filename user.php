<?php

include 'connect.php';

session_start();
$user_id = $_SESSION['user'];

if(isset($user_id)){
  


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
   
    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
   
<div class="container">

   <div class="profile">
      <?php
         $select = mysqli_query($conn, "SELECT * FROM `user` WHERE email = '$user_id' || userName ='$user_id'") or die('query failed');
         if(mysqli_num_rows($select) > 0){
            $fetch = mysqli_fetch_assoc($select);
            $id=$fetch['id'];
         }
         if($fetch['gender']=='m'){
            $sex = "Mail";
         }elseif($fetch['gender']=='f'){
            $sex = "Female";
         }else{
            $sex = "Other";
         }
         echo '<img src="data:image;base64,'.base64_encode($fetch['image']).'" alt="image" style="width:100px; height:100px;">
         
         <h3> '.$fetch['firstName']. '</h3>
         <a href="update-user.php?updateid='.$id.'" class="btn">update profile</a>
         <a href="log-out.php" class="delete-btn">logout</a>
        
         
         <div  style="
    margin-top: 20px; ">
            <ul style="
            list-style-type: none;">
               <li style="margin-bottom: 5px;
               font-size: 20px;" ><i class="fa-solid fa-signature" ></i>   '.$fetch['firstName']." ".$fetch['lastName']. '</li>
               <li style="margin-bottom: 5px;font-size: 20px;"><i class="fa-solid fa-envelope"></i>   '.$fetch['email']. '</li>
               <li style="margin-bottom: 5px;font-size: 20px;"> <i class="fa-solid fa-phone"></i>  '.$fetch['number']. '</li>
               <li style="margin-bottom: 5px;font-size: 20px;"><i class="fa-solid fa-venus-mars"></i>  '.$sex . '</li>
            </ul>
            
         </div>
         '
         ?>

</div>

</body>
</html>
<?php
}else{
   header('location:index.php');
    exit();
}
?>