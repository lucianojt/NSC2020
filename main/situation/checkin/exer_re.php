
<?php
ob_start();
if(isset($_COOKIE["user"])){
session_start();
include("../../../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
$use =  $_SESSION["username_user"];
$code =  $_SESSION["pincode"];
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ส่งผลคะแนน</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="../../../images/logoPJ.png" >
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../../../style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../../../home/index.php">CHINY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="../../../main/situation.php">สถานการณ์ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../../../main/gramma.php">ไวยากรณ์</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../../../main/conclude.php">ผลสรุป</a>
      </li>
      </ul>
      <a class="nav-link" href="../../../logout.php">ออกจากระบบ</a>
    </div>
  </nav>

<div class="container">
<?php
$score = 0;
if(isset($_POST["answer"])) {
  foreach ($_POST["answer"] as $value) {
    $sql = "SELECT * FROM exercise_ans WHERE name = 'checkin' AND id= '".$value."'  ";
    $result = mysqli_query($connection,$sql);
    if (!$result) {
      echo mysqli_error().'<br>';
      die('Can not connect database');
    } else {
      $row = mysqli_fetch_assoc($result);
      $score += $row['mark'];
    }
  }
}else {
  ?>
    <div class="nochoise">
      <p>คุณไม่ได้เลือกคำตอบ</p>
    </div>
  <?php
  $score = 0;
  }
  $sql3 = "SELECT * FROM scoreExercise 
        WHERE code = '$code' 
        AND user_usr = '$use' 
        AND score_checkin >= 0 ";
  $result3 = mysqli_query($connection,$sql3);
  if ($result3==TRUE) {
    $row3 = mysqli_fetch_assoc($result3);
    if(!$row3 ){
      //เพิ่มคะแนนคนที่เล่นครั้งแรก scoreExercise เก็บเฉพาะครั้งแรก
      $sql2 = "UPDATE scoreExercise SET score_checkin = '$score' WHERE user_usr = '$use' AND code = '$code' ";
      $result2 = mysqli_query($connection,$sql2);
      //เพิ่มคะแนนครั้งแรกใน scoreCheckin เพิ่อเก็บจำนวนครั้งที่เล่น
      $sql5 = "INSERT INTO scoreCheckin VALUES(NULL,'$use','$code',$score)";
      $result5 = mysqli_query($connection,$sql5);
      // echo 'เล่นครั้งแรก';
    } else {
      //เพิ่มคะแนนคนที่เล่นครั้งที่ 2,3,4,5,....... เพิ่มใน scoreCheckin
      $sql4 = "INSERT INTO scoreCheckin VALUES(NULL,'$use','$code',$score)";
      $result4 = mysqli_query($connection,$sql4);
      // echo 'เคยเล่นแล้ว';
    }
    ?>
      <div class="score">
        <div class="center"><?php echo $score;?> คะแนน</div>
        <a href="checkin.php" class="btn btn-outline-light">ตกลง</a>
      </div>
    <?php
  } else {
    ?>
      <div class="nochoise">
        <p>เกิดบางอย่างผิดพลาด</p>
        <div class="link">
          <a href="checkin.php" class="btn btn-outline-light">ตกลง</a>
        </div>
      </div>
    <?php
  }
mysqli_close($connection);
?>
</body>
<?php
}else{
  header("location:../../../logout.php");
}
include('../../../footer.php');
ob_end_flush();
?>

<style>
body {
  background: #FFEEEB;
}
.nav-link {
  color: black;
}
.navbar{
  background-color: #e4cbd3 !important;
  font-size: 18px;
  position: sticky;
  top: 0;
}
.active {
  transition: opacity 0.2s;
}
.navbar-collapse:hover .active:not(:hover) {
  opacity: 0.5;
}
.nochoise {
  text-align: center;
  font-size: 40px;
  margin: 15% 0 0;
  position: relative;
}
.score {
  text-align: center;
  background-color: #551524;
  width: 30%;
  border: none;
  height: auto;
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
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
    width: 80%;
    position: absolute;
  }
}
.center {
  margin: 0 0 10px;
  color: white;
}
.cent {
  font-size: 24px;
  margin: 0 0 16px;
}
</style>

