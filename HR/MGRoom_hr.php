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
    <title>จัดการห้อง</title>
    <?php include("head.php"); ?>
      <div class="container"> 
      <?php 
     if(isset($_SESSION["username_hr"])){
       ?>
<!-- start -->
      <?php 
     
      $name = $_SESSION["username_hr"];
      $sql = "SELECT * FROM regis_hr WHERE user_hr = '$name'";
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_array($result);
      if ($result==TRUE) {
        $_SESSION["code"] = $row["code"];
      ?>
      </div>
      <div class="text"><p>จัดการห้อง</p></div>
      <div class="container">
      <div class="roomDetail">
        <span style="margin: 0 10px 0 0">ชื่อ</span><span><?php echo $row['name_hr'].' '.$row['lname_hr'];?></span><br>
        <sapn style="margin: 0">โรงแรม</sapn> <span><?php echo $row['NHo_hr'].' จังหวัด '.$row['pro_hr'].' อำเภอ '.$row['dt_hr'];?></span>
      </div>
<div class="row">
    <div class="col">
    <a href="acce_info.php" role="button">
      <div class="word">
      <img src="../images/time.png" style="width: 61px; height: 61px;">
      <p class="titleName" >เวลาเข้าใช้งาน</p>
      </div>
      </a>
    <br>
    </div>
    <div class="col">
      <a href="history.php" role="button">
      <div class="word">
      <img src="../images/break-time.png" style="width: 61px; height: 61px;">
      <p class="titleName" >ประวัติพนักงาน</p>
      </div>
      </a>
    <br>
    </div>
</div>
<div class="row">
    <div class="col">
    <a href="score_chart.php" role="button">
      <div class="word">
      <img src="../images/score.png" style="width: 61px; height: 61px;">
      <p class="titleName" >คะแนนการทดสอบ</p>
      </div>
      </a>
    <br>
    </div>
    <div class="col">
      <a href="data.php" role="button">
      <div class="word">
      <img src="../images/hotel2.png" style="width: 61px; height: 61px;">
      <p class="titleName" >ข้อมูลห้อง</p>
      </div>
      </a>
    <br>
    </div>
</div>
    <a href="data_situation.php" role="button">
    <div class="word">
    <p style="font-size: 18px; margin: 0">ข้อมูลสถานการณ์</p>
    </div>
    </a><br>
      </div>
        <?php
      mysqli_close($connection);
    }else{
        echo 'ไม่สามารถเข้าถึงข้อมูลได้';
        mysqli_close($connection);
      }
  }else{
    header("location:../logout_hr.php");
  }
}else{
  header("location:../logout_hr.php");
}
include('../footer.php'); 
ob_end_flush();?>

<style>
.text{
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.titleName {
  margin: 20px 0 0;
  font-size: 18px;
}
.word {
  position: relative;
  padding: 20px 0;
  background: #7e1f35;
  text-align: center;
  color: white;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.word:hover {
  background-color: #551524;
  color: white;
  animation-name: example;
  animation-duration: 0.6s;
}
@keyframes example {
  0% {
    left: 0%;
  }
  50% {
    left: 2%;
  }
  75% {
    left: -2%;
  }
  100% {
    left: 0%;
  }
}
@media (max-width: 575.98px) {
  .word {
    height: 86%;
  }
}
.roomDetail {
  background-color: #e4cbd3;
  border-radius: 6px;
  padding: 20px 20px;
  margin: 20px 0 20px;
  font-size: 18px;
}
</style>