<?php 
ob_start();
if(isset($_COOKIE["hr"])){
session_start(); 
  include("../database/database.php"); 
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
  </head>
  <body>
  
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="../home/index.php">
   <img src="../images/icon_9.png" width="40" height="30" class="d-inline-block align-top" alt="">
</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
       
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <a  class="nav-link" href="../logout_hr.php">ออกจากระบบ </a>
        </form>
    </div>
    </nav>
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
    $room = $_SESSION["code"] ;
    $user=  $_SESSION["username_hr"];

   $name_hr = $_GET['name_hr'];
   $lname_hr = $_GET['lname_hr'];
   $pass_hr = $_GET['pass_hr'];
   $NHo_hr = $_GET['NHo_hr'];
   $pro_hr = $_GET['pro_hr'];
   $dt_hr = $_GET['dt_hr'];
   $zip_hr = $_GET['zip_hr'];
   $mail_hr = $_GET['mail_hr'];
//    echo $name_hr;

//echo  $room;

$sql = "UPDATE regis_hr SET name_hr = '$name_hr',
                             lname_hr = '$lname_hr',              
                             pass_hr = '$pass_hr' ,
                             NHo_hr = '$NHo_hr',
                             pro_hr = '$pro_hr' ,
                             dt_hr = '$dt_hr',
                             zip_hr = '$zip_hr',
                             mail_hr = '$mail_hr'
                             WHERE code =  '$room' AND user_hr = '$user'
                             ";
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
         <a href="data.php" class="btn btn-outline-dark">ตกลง</a>
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
         <a href="data.php" class="btn btn-outline-dark">ตกลง</a>
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
   header("location:../logout_hr.php");
}
 include('../footer.php'); 
 ob_end_flush();
 ?>