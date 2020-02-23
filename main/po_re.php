<?php
ob_start();
if(isset($_COOKIE["user"])){
session_start();
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
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="icon" href="../images/icon_9.png" >  
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
        <a  class="nav-link" href="../logout.php">ออกจากระบบ </a>
        </form>
    </div>
    </nav>

<style>
body {
  background-image: url('../images/wallpaperP.jpg');
  background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
}.centered {
  color: #501C07;
  font-size: 60px;
  letter-spacing: 8px;
}
.center{
  color: #501C07;
  font-size: 40px;
  letter-spacing: 1px;
}
.cent{
  color: #501C07;
  font-size: 30px;
  letter-spacing: 1px;
  text-align: center;
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
</style>

<br>
<div class="container">
<?php
//var_dump($_POST["answer"]);
$time_start = $_SESSION["time_start"];
$today_start = $_SESSION["today_start"];


function DateTimeDiff($strDateTime1,$strDateTime2){
return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
}
 

date_default_timezone_set('Asia/Bangkok');
$time_end = date("H:i:s");
$today_end = date("Y-m-d");

$sumT = DateTimeDiff("$today_start $time_start","$today_end $time_end");

//echo $time." วินาที";


include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

  $score =0;

if(isset($_POST["answer"])){
 //echo 'เลือกคำตอบ'; 
 foreach ($_POST["answer"] as $value) {
  
     //echo  'hi!! '.$value."<br>" ; 
    $sql = "SELECT * FROM postest_ans WHERE as_id= '".$value."'  ";

  $result = mysqli_query($connection,$sql);
  if(!$result){
    echo mysqli_error().'<br>';
    die('Can not connect database');
  }else{ 
  $row = mysqli_fetch_assoc($result);

 //echo $row['mark']; 
  $score += $row['mark'];
    }
 
  } 
}else{
  ?> 
  <br><br><br><br><br>
    <div class="container" >
    <div class="card">
    <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
    <div class="centeredd">คุณไม่ได้เลือกคำตอบ</div>
    </div>
  </div><br>
  
      <?php
   $score = 0;
}



  $pincode = $_SESSION["pincode"];
  $name =  $_SESSION["username_user"];

  $sql2 = "UPDATE Room_$pincode 
           SET posttest = '$score' , time_posttest = '$sumT'
           WHERE user_usr = '$name' ";
  $result2 = mysqli_query($connection,$sql2);
  if($sql2==TRUE){
    ?>
    <br><br><br><br><br>
    <div class="card">
    <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
    <div class="center">คุณได้ <?php echo $score;?> คะแนน</div>
    </div>
    </div>
    </div><br>
    
      <?php


if($sumT > 60){
  $min = (int)($sumT/60) ;
  $sec = $sumT - ($min * 60);
  ?>
  <div class="cent">เวลา: <?php echo $min;?> นาที <?php echo $sec;?> วินาที</div>
  <?php
}else{
  ?>
  <div class="cent">เวลา: <?php echo $sumT;?> วินาที</div>
  <?php
}           
?>
<br>
       <div class="link">
           <a href="../home/index.php" class="btn btn-outline-dark">ตกลง</a>
       </div>
<?php
  }else{
    ?>
    <br><br><br><br><br>
       <div class="container" >
       <div class="card">
       <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
       <div class="centeredd">เกิดบางอย่างผิดพลาด</div>
       </div><br>
       <div class="link">
           <a href="../home/index.php" class="btn btn-outline-dark">ตกลง</a>
       </div>
     </div>
    <?php
  }
mysqli_close($connection);
//while($row = mysqli_fetch_assoc($result)){
  

?>



</body>
<!-- ปิด cookie -->

<?php

}else{
   header("location:../logout.php");
}
include('../footer.php');
ob_end_flush();
?>
