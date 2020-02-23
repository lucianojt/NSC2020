<?php 
ob_start();
if(isset($_COOKIE["user"])){
session_start(); 
  include("../database/database.php"); 
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>แก้ไข้ข้อมูล</title>
    <?php include("headU.php"); ?>
    <style>
     body {
      background-image: url('../images/wallpaperP.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        }
        .centered {
  color: #501C07;
  font-size: 60px;
  letter-spacing: 8px;
}
.center{
  color: #501C07;
  font-size: 45px;
  letter-spacing: 1px;
}
.link{
  text-align: center;
  
}
.btn-outline-dark{
  width: 120px;
  height: 60px;
  font-size: 29px;
}
.centeredd{
  color: #501C07;
  font-size: 50px;
  letter-spacing: 6px;
}
    .navbar{
      background-color: #660223;
       
        top: 0;
        width: 100%;
    }
    .nav-link {
        color: white;
    }
    .navbar-toggler{
        border-color: rgb(255,102,203);
    }
    .navbar-toggler-icon{
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,102,203, 0.7)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }
    </style>
     
   <?php
$use =  $_SESSION["username_user"];
$room =  $_SESSION["pincode"];


$name_usr = $_GET['name_usr'];
$lname_usr = $_GET['lname_usr'];
$pass_usr = $_GET['pass_usr'];
$email_usr = $_GET['email_usr'];


//echo $use.$room.$name_usr;

$room = "Room_".$room;

$sql = "UPDATE $room SET name_usr = '$name_usr',
                          lname_usr = '$lname_usr',
                          pass_usr = '$pass_usr',
                          email_usr = '$email_usr'  ";
$result = mysqli_query($connection,$sql);

if(!$result){
  ?> 
  <br><br><br><br><br>
    <div class="container" >
    <div class="card">
    <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
    <div class="centeredd">แก้ไข้ข้อมูลไม่สำเร็จ</div>
    </div>
  </div><br><br>
     <div class="link">
         <a href="setting.php" class="btn btn-outline-dark">ตกลง</a>
     </div>
  
      <?php
}else{
  ?> 
  <br><br><br><br><br>
    <div class="container" >
    <div class="card">
    <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
    <div class="centeredd">แก้ไข้ข้อมูลสำเร็จ</div>
    </div>
  </div><br><br>
     <div class="link">
         <a href="setting.php" class="btn btn-outline-dark">ตกลง</a>
     </div>
  
      <?php
}


// echo $room;
// echo $user;
// $sql2 = "SELECT * FROM regis_hr WHERE code =  '$room' AND user_hr = '$user' ";
// $result2 = mysqli_query($connection,$sql2);
// $row2 = mysqli_fetch_assoc($result2);

// echo $row2['dt_hr'];



?>
  <!-- ปิด cookie -->

  <?php

}else{
   header("location:../logout.php");
}
 include('../footer.php'); 
 ob_end_flush();
 ?>