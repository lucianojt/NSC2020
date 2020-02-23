<?php 
session_start(); 
if(isset($_COOKIE["minny"])){
  include("../database/database.php"); 
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>โรงแรม</title>
    <?php include("head.php"); ?>
      <div class="container">
    
      </div>
      <?php 
      $code = $_GET['code'];
      $_SESSION["code"] =  $code;
      $room = $_SESSION["code"] ;
      $sql2 = "SELECT * FROM regis_hr WHERE code = '$code'";
      $result2 = mysqli_query($connection,$sql2);
      $row2 = mysqli_fetch_assoc($result2);
      if(!$result2){
      ?><div class="text"><h3>จัดการห้อง</h3></div><?php
      }else{
        ?>  <div class="text"><h3>โรงแรม: <?php echo $row2['NHo_hr'];?></h3></div><?php
      }
      ?><br>
      <div class="container">
       <div class="link">
        <h6><a href="index.php" class="text-reset">ADMIN</a> > ข้อมูลโรงแรม</a></h6>
   </div>
      </div>
     
<div class="container"><br>
<?php 

//echo $code;
$sql = "SELECT * FROM regis_hr WHERE code = '$code'";
$result = mysqli_query($connection,$sql);
if(!$result){
  echo 'ไม่ได้';
}else{
 ?>
 <div class="row">
    <div class="col">
    <a href="acce_info.php" role="button">
      <div class="word">
      <img src="../images/time.png" style="width: 61px; height: 61px;">
      <p>การเข้าใช้งาน</p>
      </div>
      </a>
    <br>
    </div>
    <div class="col">
      <a href="history.php" role="button">
      <div class="word">
      <img src="../images/break-time.png" style="width: 61px; height: 61px;">
      <p>ประวัติพนักงาน</p>
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
      <p>คะแนนการทดสอบ</p>
      </div>
      </a>
    <br>
    </div>
    <div class="col">
      <a href="data.php" role="button">
      <div class="word">
      <img src="../images/hotel2.png" style="width: 61px; height: 61px;">
      <p>ข้อมูลห้อง</p>
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
}

?>
</div>
<style>
.navbar{
  background-color: #660223;
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
body{
  background-image: url('../images/wall.png');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
.text{
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
</style>
<?php 
}else{
  header("location:../logout_hr.php");
}
  include('../footer.php'); ?>