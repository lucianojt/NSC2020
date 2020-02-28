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
      <div class="text"><h3>จัดการห้อง</h3></div>
      <div class="container">
      <div class="roomDetail">
        <span style="margin: 0 10px 0 0">ชื่อ</span><span style="color: #4B4B4B;"><?php echo $row['name_hr'].' '.$row['lname_hr'];?></span><br>
        <sapn style="margin: 0">โรงแรม</sapn> <span style="color: #4B4B4B;" ><?php echo $row['NHo_hr'].' จังหวัด '.$row['pro_hr'].' อำเภอ '.$row['dt_hr'];?></span>
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
    <div class="test">
    <p>ข้อมูลสถานการณ์</p>
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
  text-align: center;
  padding: 21px 0 0;
}
.titleName {
  margin: 10px 0;
}
.word {
  color: white;
  background-color: #AE0F0F;
  height: 140px;
  border-radius: 15px;
  text-align: center;
  padding: 16px 0;
  font-size: 18px;
}
.word:hover {
  background-color: #941414;
}
.test {
  color: white;
  background-color: #AE0F0F;
  border-radius: 15px;
  height: 70px;
  text-align: center;
  padding: 20px 0;
  font-size: 18px;
}
.roomDetail {
  background-color: #E4E4E4;
  border-radius: 6px;
  padding: 20px 20px;
  margin: 20px 0 20px;
  font-size: 18px;
}
</style>