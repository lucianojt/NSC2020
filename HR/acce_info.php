<?php
session_start(); 
ob_start();
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
if(isset($_COOKIE["hr"])){ 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>เวลาการเข้าใช้งาน</title>
<?php include("head.php"); ?>
      <div class="text"><p>เวลาการเข้าใช้งาน</p></div>
      <div class="container">
      <div class="link">
        <h5><a href="MGRoom_hr.php" class="text-reset">จัดการห้อง</a> > เวลาการเข้าใช้งาน</a></h5>
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

<style>
.text {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.word {
  color: white;
  height: 140px;
  border-radius: 15px;
  text-align: center;
  padding: 23px;
}
.big {
  text-align: center;
  font-size: 25px;
}
.table {
  background-color: #F7DAD2;
}
.table-responsive{
  height: 500px;
  overflow: scroll;
}
</style>