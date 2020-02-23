<?php
session_start(); 
ob_start();
if(isset($_COOKIE["hr"])){ 

include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>เวลาการเข้าใช้งาน</title>
<?php include("head.php"); ?>
    <style>
     body {
        background-image: url('../images/wall.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
       
        }
    .navbar{
      background-color: #660223;
        overflow: hidden;
        position: fixed;
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
    .text{
      margin-top: 56px;
    text-align: center;
    background-image: url('../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px; 
   }
   
  .word{
    color: white;
    background-color: #AE0F0F;
    height: 140px;
    border-radius: 15px;
    text-align: center;
    padding: 23px;
    }
    .test{
    color: white;
    background-color: #AE0F0F;
    border-radius: 15px;
    height: 70px;
    text-align: center;
    padding: 20px;
    }
    .big{
      text-align: center;
      font-size: 25px;

    }
    .table{
        background-color: #F7DAD2;
    }
    .table-responsive{
      height: 500px;
      overflow: scroll;
    }
    </style>
     
      <div class="text"><h3>เวลาการเข้าใช้งาน</h3></div><br>
      <div class="container">
      <div class="link">
        <h6><a href="MGRoom_hr.php" class="text-reset">จัดการห้อง</a> > เวลาการเข้าใช้งาน</a></h6>
   </div>
      </div>
      <div class="container">

       



      <?php 
      // echo $_SESSION["code"] ;
      $room = $_SESSION["code"] ;
   
      ?>
      <div class="big">
      <p>ห้องเรียน 
      <?php 
      echo $room."<br>"; 
      $roomCode = 'Room_'.$room;
      // echo  $roomCode;
     
      $today = date("d-m-Y");
      echo  $today;
      
      ?></p>
      </div>
      <div class="table-responsive">
      <table class="table">
  <thead class="thead-dark">
    <tr>
      <th style="width: 8%; text-align: center;" scope="col">ลำดับที่</th>
      <th style="width: 23%; text-align: center;" scope="col">วันที่เข้าใช้งาน</th>
      <th style="width: 23%; text-align: center;" scope="col">เวลาที่เข้าใช้งาน</th>
      <th style="width: 23%; text-align: center;" scope="col">ชื่อ-สกุล</th>
      <th style="width: 23%; text-align: center;" scope="col">ชื่อผู้ใช้</th>
     
    </tr>
  </thead>

  <tbody>
   <?php 
   $sql = "SELECT ReTim.dayIn ,ReTim.timeIn, ReTim.user_usr , ReTim.id,name_usr ,lname_usr
           FROM $roomCode , ReTim
           WHERE $roomCode.user_usr = ReTim.user_usr
           ORDER BY id DESC";
   $result = mysqli_query($connection,$sql);
   if(!$result){
     echo 'ไม่มีคนเข้าใช้งาน'; 
   }else{
     $i=1;
     while($row = mysqli_fetch_assoc($result)){
  ?> 
 <tr>
      
          <th style="width: 8%; text-align: center;" scope="row"><?php echo $i;?></th>
          <td style="width: 23%; text-align: center;"><?php echo $row['dayIn'];?> </td>
          <td style="width: 23%; text-align: center;"><?php echo $row['timeIn'];?> </td>
          <td style="width: 23%; text-align: center;"><?php echo $row['name_usr'];?> <?php echo $row['lname_usr'];?></td>
          <td style="width: 23%; text-align: center;"><?php echo $row['user_usr'];?> </td>
     
    </tr>
  <?php
  $i++;
   }
   }
  
   ?>
  </tbody>
</table>
</div>
      </div>
   <!-- ปิด cookie -->

   <?php

}else{
   header("location:../logout_hr.php");
} include('../footer.php'); 
ob_end_flush();
?>