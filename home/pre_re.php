<?php
ob_start();
if(isset($_COOKIE["user"])){
session_start();
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
date_default_timezone_set('Asia/Bangkok');
$time_end = date("H:i:s");
$today_end = date("Y-m-d");
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ส่งผลคะแนน</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../images/logoPJ.png" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">CHINY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
        <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
    </div>
  </nav>

<div class="container">
<?php
$time_start = $_SESSION["time_start"];
$today_start = $_SESSION["today_start"];
function DateTimeDiff($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
}
$sumT = DateTimeDiff("$today_start $time_start","$today_end $time_end");
$score =0;

if (isset($_POST["answer"])) {
  foreach ($_POST["answer"] as $value) {
    $sql = "SELECT * FROM pretest_ans WHERE as_id= '".$value."'  ";
    $result = mysqli_query($connection,$sql);
    if (!$result) {
      echo mysqli_error().'';
      die('Can not connect database');
    } else {
      $row = mysqli_fetch_assoc($result);
      $score += $row['mark'];
    }
  }
  ?>
    <div class="nochoise"></div>
  <?php
} else {
  ?>
    <div class="nochoise">
      <p>คุณไม่ได้เลือกคำตอบ</p>
    </div>
  <?php
  $score = 0;
  }
  $pincode = $_SESSION["pincode"];
  $name =  $_SESSION["username_user"];
  $sql2 = "UPDATE Room_$pincode 
           SET pretest = '$score' , time_pretest = '$sumT'
           WHERE user_usr = '$name' ";
  $result2 = mysqli_query($connection,$sql2);
  if($sql2==TRUE){
    ?>
      <div class="score">
        <div class="center"><?php echo $score;?> คะแนน</div>
      </div>
    <?php
    if ($sumT > 60) {
      $min = (int)($sumT/60) ;
      $sec = $sumT - ($min * 60);
      ?>
        <div class="time">
          <div class="cent">
            เวลา: <?php echo $min;?> นาที <?php echo $sec;?> วินาที
          </div>
          <div class="link">
            <a href="index.php" class="btn btn-outline-dark">ตกลง</a>
          </div>
        </div>
      <?php
    } else {
      ?>
        <div class="time">
          <div class="cent">
            เวลา: <?php echo $sumT;?> วินาที
          </div>
          <div class="link">
            <a href="index.php" class="btn btn-outline-dark">ตกลง</a>
          </div>
        </div>
      <?php
    }
  } else {
    ?>
      <div class="nochoise">
        <p>เกิดบางอย่างผิดพลาด</p>
        <div class="link">
          <a href="index.php" class="btn btn-outline-dark">ตกลง</a>
        </div>
      </div>
    <?php
  }
mysqli_close($connection);
?>
</body>
<?php
}else{
  header("location:../logout.php");
}
include('../footer.php');
ob_end_flush();
?>

<style>
body {
  background: #F5F5F5;
}
.bg-light {
  background-color: #F5F5F5!important;
}
.nav-link {
  color: black;
}
.nochoise {
  text-align: center;
  font-size: 40px;
  margin: 15% 0 0;
  position: relative;
}
.score {
  text-align: center;
  background-color: #FECCCC;
  width: 30%;
  border: none;
  height: auto;
  position: absolute;
  left: 50%;
  transform: translate(-50%, 0%);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  border-radius: 20px;
  font-size: 24px;
  padding: 14px 0;
  animation-name: example;
  animation-duration: 1.1s;
}
@keyframes example {
  0% {
    left: 40%;
  }
  25% {
    left: 60%;
  }
  50% {
    left: 45%;
  }
  75% {
    left: 55%;
  }
  100% {
    left: 50%;
  }
}
@media (max-width: 575.98px) {
  .score {
    width: 60%;
    position: absolute;
  }
}
.center {
  color: #3E3E3E;
}
.time {
  margin: auto;
  width: 100%;
  text-align: center;
  padding: 90px 0 0;
}
.cent {
  font-size: 24px;
  margin: 0 0 16px;
}
</style>