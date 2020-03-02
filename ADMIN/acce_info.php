<?php session_start(); 
if(isset($_COOKIE["minny"])){
 include("../database/database.php"); 
 $connection = mysqli_connect($localhost,$username,$pass,$database);
 mysqli_set_charset($connection,'utf8');
 $room = $_SESSION["code"] ;?>
<!doctype html>
<html lang="en">
  <head>
    <title>ข้อมูลการเข้าใช้งาน</title>
    <?php include("head.php"); ?>
  
     
      <div class="text"><p>ข้อมูลการเข้าใช้งาน</p></div>
      <div class="container">
      <div class="link">
        <h5><a href="index.php" class="text-reset">ADMIN</a> > <a href="MGRoom_ADMIN.php?code=<?php echo  $room;?>" class="text-reset">จัดการห้อง</a> > ข้อมูลการเข้าใช้งาน</a></h5>
   </div>
      </div>
      
      <div class="container">
      <?php 
      // echo $_SESSION["code"] ;
     
   
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
      <th  style="width: 23%; text-align: center;" scope="col">วันที่เข้าใช้งาน</th>
      <th  style="width: 23%; text-align: center;" scope="col">เวลาที่เข้าใช้งาน</th>
      <th  style="width: 23%; text-align: center;" scope="col">ชื่อ-สกุล</th>
      <th  style="width: 23%; text-align: center;" scope="col">ชื่อผู้ใช้</th>
     
    </tr>
  </thead>
  <tbody>
   <?php 
  
   $sql = "SELECT ReTim.dayIn ,ReTim.timeIn,ReTim.user_usr , ReTim.id,name_usr ,lname_usr
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
      <td style="width: 23%; text-align: center;" ><?php echo $row['dayIn'];?> </td>
      <td style="width: 23%; text-align: center;" ><?php echo $row['timeIn'];?> </td>
      <td style="width: 23%; text-align: center;" ><?php echo $row['name_usr'];?> <?php echo $row['lname_usr'];?></td>
      <td style="width: 23%; text-align: center;" ><?php echo $row['user_usr'];?> </td>
    </tr>
  <?php
  $i++;
   }
   }
  
   ?>
  </tbody>
</table>
<div>
      </div>
  <?php 
   }else{
    
    header("location:../logout_hr.php");
  }
  include('../footer.php'); ?>
<style>
.text{
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.table-responsive{
height: 500px;
overflow: scroll;
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
</style>