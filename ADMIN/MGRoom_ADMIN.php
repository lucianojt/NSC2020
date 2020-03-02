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
        ?>  <div class="text"><p>โรงแรม: <?php echo $row2['NHo_hr'];?></p></div><?php
      }
      ?><br>
      <div class="container">
       <div class="link">
        <h5><a href="index.php" class="text-reset">ADMIN</a> > ข้อมูลโรงแรม</a></h5>
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
    <div class="word">
    <p style="font-size: 18px; margin: 0">ข้อมูลสถานการณ์</p>
    </div>
    </a><br>

   
      </div>
 <?php
}

?>
</div>
<style>
.text{
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
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
</style>
<?php 
}else{
  header("location:../logout_hr.php");
}
  include('../footer.php'); ?>