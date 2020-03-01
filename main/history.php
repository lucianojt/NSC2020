
<?php 
ob_start();
if(isset($_COOKIE["user"])){
session_start();
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

?>
<!doctype html>
<html lang="en">
  <head>
    <title>การเรียนรู้</title>
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="icon" href="../images/logoPJ.png" >
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../home/index.php">CHINY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="../main/situation.php">สถานการณ์ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../main/gramma.php">ไวยากรณ์</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../main/conclude.php">ผลสรุป</a>
      </li>
      </ul>
      <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
    </div>
  </nav>
   
   <div class="main">
    <p>การเรียนรู้</p>
    </div>
    <div class="container">
    <div class="link">
        <h5><a href="../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="conclude.php" class="text-reset">ผลสรุป</a> > การเรียนรู้</h5>
   </div><br>
   <?php  
   
//var_dump($_SESSION);
$number = $_SESSION["pincode"];
$namee = $_SESSION["username_user"];

if(isset($_SESSION["username_user"])){
  
   $callin = array(10,11,12);
   $callout = array(22,23,24);
   
      ?>
      <div class="row">
    <div class="col-3" >
    <div class="zz" style="text-align: center;">
    สถานการณ์ที่ 1
    </div>
    </div>
    <div class="col-9">
    <p>เช็คอิน</p>
         <table class="table">
   <thead class="thead-dark">
      <tr>
         <th scope="col">คำศัพท์</th>
         <th scope="col">ประโยค</th>
         <th scope="col">บทสนทนา</th>
      </tr>
   </thead>
   <tbody> 
         <tr class="floorTime">
            <?php
            for($i=0; $i<=2 ; $i++){
            $sql = "SELECT time FROM LessonTimeNew WHERE user_usr = '$namee' AND code = '$number' AND id_detail = $callin[$i] ";
            $result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($result);
            if($row['time'] == 0 ){
               echo ' <td>-</td>';
            }else{
                $sum = $row['time'];
               if($sum >= 3600){
                  $hour = (int)($sum / 3600);
                  $Fmin = $sum - ($hour * 3600);
                   $min = (int)($Fmin/60) ;
                $sec = $Fmin - ($min * 60);
                    $sumt = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
                   //echo $sumt;
                }elseif($sum >= 60){
                   $min = (int)($sum/60) ;
                $sec = $sum - ($min * 60);
                   $sumt = $min." นาที ".$sec." วินาที";
                   //echo $sumt;
                }else{
                $sumt = $sum." วินาที";
                //echo $sumt;
                }
                echo '<td>'.$sumt.'</td>';
            }
            }
            ?>
            
         </tr>
   </tbody>
   </table>
    </div><br>
    </div>
    <div class="row">
    <div class="col-3" >
    <div class="zz" style="text-align: center;">
    สถานการณ์ที่ 2
    </div>
    </div>
    <div class="col-9">
    <p>การแจ้งออกจากโรงแรม (เช็คเอาท์)</p>
         <table class="table">
   <thead class="thead-dark">
      <tr>
         <th scope="col">คำศัพท์</th>
         <th scope="col">ประโยค</th>
         <th scope="col">บทสนทนา</th>
      </tr>
   </thead>
   <tbody> 
         <tr class="floorTime">
            <?php
            for($i=0; $i<=2 ; $i++){
            $sql = "SELECT time FROM LessonTimeNew WHERE user_usr = '$namee' AND code = '$number' AND id_detail = $callout[$i] ";
            $result = mysqli_query($connection,$sql);
            $row = mysqli_fetch_assoc($result);
            if($row['time'] == 0 ){
               echo ' <td>-</td>';
            }else{
                $sum = $row['time'];
               if($sum >= 3600){
                  $hour = (int)($sum / 3600);
                  $Fmin = $sum - ($hour * 3600);
                   $min = (int)($Fmin/60) ;
                $sec = $Fmin - ($min * 60);
                    $sumt = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
                   //echo $sumt;
                }elseif($sum >= 60){
                   $min = (int)($sum/60) ;
                $sec = $sum - ($min * 60);
                   $sumt = $min." นาที ".$sec." วินาที";
                   //echo $sumt;
                }else{
                $sumt = $sum." วินาที";
                //echo $sumt;
                }
                echo '<td>'.$sumt.'</td>';
            }
            }
            ?>
            
         </tr>
   </tbody>
   </table>
    </div><br>

<?php
}else{
    echo 'เกิดข้อผิดพลาดบางอย่าง';
}
?>
    <!-- close container -->
    </div>
  <div class="backLink"><h6><a href="../home/index.php" class="text-reset"> << กลับไปหน้าหลัก </a> </h6>
  
  <!-- ปิด cookie -->
<?php

}else{
   header("location:../logout.php");
}
ob_end_flush();
?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>  
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
}
.active {
  transition: opacity 0.2s;
}
.navbar-collapse:hover .active:not(:hover) {
  opacity: 0.5;
}
.main {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.colT {
  background-color: rgba(54, 162, 235, 0.2);
  height: 50px;
  width: auto;
  padding: 15px; 
  border-radius: 10px 30px;
}
.floorTime {
  background: #e4cbd3;
}
.table {
  text-align: center;
}
.backLink {
  margin: 20px 0;
  text-align: center;
}
.text-reset {
  font-size: 18px;
}
</style>