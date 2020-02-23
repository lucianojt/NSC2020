
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
    <?php include("headU.php"); ?>
        
        
        
        
        <style>
    body {
        background-image: url('../images/wall.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
        }
    .navbar{
        background-color: #660223;
    }
    .table{
        text-align: center;
        background-color: #F7DAD2;
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
    .main {
       
    text-align: center;
    background-image: url('../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px; 
    }
    .colT{
        background-color: rgba(54, 162, 235, 0.2);
        height: 50px;
        width: auto;
        padding: 15px; 
        border-radius: 10px 30px;
    }
   
    </style>
   

   <div class="main">
    <h3>การเรียนรู้</h3>
    </div><br>
    <div class="container">
    <div class="link">
        <h6><a href="../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="conclude.php" class="text-reset">ผลสรุป</a> > การเรียนรู้</h6>
   </div><br>
   <?php  
   
//var_dump($_SESSION);
$number = $_SESSION["pincode"];
$namee = $_SESSION["username_user"];

if(isset($_SESSION["username_user"])){
?>
<div class="row">
    <div class="col-3" >
    <div class="zz" style="text-align: center;">
     สถานการณ์ที่ 1
    </div>
    </div>
    <div class="col-9">
    
    <div class="aa" style="text-align: left;">
    <p>ประโยคที่ใช้ในชีวิตประจำวัน</p>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">คำศัพท์</th>
      <th scope="col">ประโยค</th>
      <th scope="col">บทสนทนา</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php 
     $sql1 = "SELECT time FROM LessonTime WHERE id_detail = 1 AND code = '$number' AND user_usr = '$namee'";
     $result1 = mysqli_query($connection,$sql1);
     $row1 = mysqli_fetch_assoc($result1);
     if(!$row1){
        ?><td>-</td><?php
     }else{
        $sql11 = "SELECT time FROM LessonTime WHERE id_detail = 1 AND code = '$number' AND user_usr = '$namee'";
        $result11 = mysqli_query($connection,$sql11);
        while($row11 = mysqli_fetch_assoc($result11)){
         $sumT[] = $row11['time'];
     }  
     $sum = array_sum($sumT);
      

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
    ?>   <td><?php echo $sumt; ?></td> <?php
     }
    
     ?>
     <!-- เสร็จคำศัพประโยคในชีวิตประจำวัน -->
     <?php 
     $sql2 = "SELECT time FROM LessonTime WHERE id_detail = 2 AND code = '$number' AND user_usr = '$namee'";
     $result2 = mysqli_query($connection,$sql2);
     $row2 = mysqli_fetch_assoc($result2);
     if(!$row2){
        ?><td>-</td><?php
     }else{
        $sql21 = "SELECT time FROM LessonTime WHERE id_detail = 2 AND code = '$number' AND user_usr = '$namee'";
        $result21 = mysqli_query($connection,$sql21);
        while($row21 = mysqli_fetch_assoc($result21)){
         $sumT2[] = $row21['time'];
     }  
     $sum2 = array_sum($sumT2);
      

     if($sum2 >= 3600){
      $hour = (int)($sum2 / 3600);
      $Fmin = $sum2 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt2 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum2 >= 60){
       $min = (int)($sum2/60) ;
    $sec = $sum2 - ($min * 60);
       $sumt2 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt2 = $sum2." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt2; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จประโยค ประโยคในชีวิตประจำวัน -->
       <?php 
     $sql3 = "SELECT time FROM LessonTime WHERE id_detail = 3 AND code = '$number' AND user_usr = '$namee'";
     $result3 = mysqli_query($connection,$sql3);
     $row3 = mysqli_fetch_assoc($result3);
     if(!$row3){
        ?><td>-</td><?php
     }else{
        $sql31 = "SELECT time FROM LessonTime WHERE id_detail = 3";
        $result31 = mysqli_query($connection,$sql31);
        while($row31 = mysqli_fetch_assoc($result31)){
         $sumT3[] = $row31['time'];
     }  
     $sum3 = array_sum($sumT3);
      

     if($sum3 >= 3600){
      $hour = (int)($sum3 / 3600);
      $Fmin = $sum3 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt3 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum3 >= 60){
       $min = (int)($sum3/60) ;
    $sec = $sum3 - ($min * 60);
       $sumt3 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt3 = $sum3." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt3; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จบทสนทนา ประโยคในชีวิตประจำวัน -->
    </tr>
  </tbody>
</table>
  

    </div>
  </div><br>
  <!-- เสร็จสถานการณ์ที่ 1 -->
  <div class="row">
    <div class="col-3" >
    <div class="zz" style="text-align: center;">
     สถานการณ์ที่ 2
    </div>
    </div>
    <div class="col-9">
    
    <div class="aa" style="text-align: left;">
    <p>การจองห้องพัก</p>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">คำศัพท์</th>
      <th scope="col">ประโยค</th>
      <th scope="col">บทสนทนา</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php 
     $sql4 = "SELECT time FROM LessonTime WHERE id_detail = 4 AND code = '$number' AND user_usr = '$namee'";
     $result4 = mysqli_query($connection,$sql4);
     $row4 = mysqli_fetch_assoc($result4);
     if(!$row4){
        ?><td>-</td><?php
     }else{
        $sql41 = "SELECT time FROM LessonTime WHERE id_detail = 4 AND code = '$number' AND user_usr = '$namee'";
        $result41 = mysqli_query($connection,$sql41);
        while($row41 = mysqli_fetch_assoc($result41)){
         $sumT4[] = $row41['time'];
     }  
     $sum4 = array_sum($sumT4);
      

     if($sum4 >= 3600){
      $hour = (int)($sum4 / 3600);
      $Fmin = $sum4 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt4 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum4 >= 60){
       $min = (int)($sum4/60) ;
    $sec = $sum4 - ($min * 60);
       $sumt4 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt4 = $sum4." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt4; ?></td> <?php
     }
    
     ?>
     <!-- เสร็จคำศัพการจองห้องพัก -->
     <?php 
     $sql5 = "SELECT time FROM LessonTime WHERE id_detail = 5 AND code = '$number' AND user_usr = '$namee'";
     $result5 = mysqli_query($connection,$sql5);
     $row5 = mysqli_fetch_assoc($result5);
     if(!$row5){
        ?><td>-</td><?php
     }else{
        $sql51 = "SELECT time FROM LessonTime WHERE id_detail = 5 AND code = '$number' AND user_usr = '$namee'";
        $result51 = mysqli_query($connection,$sql51);
        while($row51 = mysqli_fetch_assoc($result51)){
         $sumT5[] = $row51['time'];
     }  
     $sum5 = array_sum($sumT5);
      

     if($sum5 >= 3600){
      $hour = (int)($sum5 / 3600);
      $Fmin = $sum5 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt5 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum5 >= 60){
       $min = (int)($sum5/60) ;
    $sec = $sum5 - ($min * 60);
       $sumt5 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt5 = $sum5." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt5; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จประโยค การจองห้องพัก -->
       <?php 
     $sql6 = "SELECT time FROM LessonTime WHERE id_detail = 6 AND code = '$number' AND user_usr = '$namee'";
     $result6 = mysqli_query($connection,$sql6);
     $row6 = mysqli_fetch_assoc($result6);
     if(!$row6){
        ?><td>-</td><?php
     }else{
        $sql61 = "SELECT time FROM LessonTime WHERE id_detail = 6 AND code = '$number' AND user_usr = '$namee'";
        $result61 = mysqli_query($connection,$sql61);
        while($row61 = mysqli_fetch_assoc($result61)){
         $sumT6[] = $row61['time'];
     }  
     $sum6 = array_sum($sumT6);
      

     if($sum6 >= 3600){
      $hour = (int)($sum6 / 3600);
      $Fmin = $sum6 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt6 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum6 >= 60){
       $min = (int)($sum6/60) ;
    $sec = $sum6 - ($min * 60);
       $sumt6 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt6 = $sum6." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt6; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จบทสนทนา การจองห้องพัก -->
    </tr>
  </tbody>
</table>
  

    </div>
  </div><br>
  <!-- เสร็จสถานการณ์ที่ 2 -->
  <div class="row">
    <div class="col-3" >
    <div class="zz" style="text-align: center;">
     สถานการณ์ที่ 3
    </div>
    </div>
    <div class="col-9">
    
    <div class="aa" style="text-align: left;">
    <p>รายละเอียดของห้องพัก</p>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">คำศัพท์</th>
      <th scope="col">ประโยค</th>
      <th scope="col">บทสนทนา</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php 
     $sql7 = "SELECT time FROM LessonTime WHERE id_detail = 7 AND code = '$number' AND user_usr = '$namee'";
     $result7 = mysqli_query($connection,$sql7);
     $row7 = mysqli_fetch_assoc($result7);
     if(!$row7){
        ?><td>-</td><?php
     }else{
        $sql71 = "SELECT time FROM LessonTime WHERE id_detail = 7 AND code = '$number' AND user_usr = '$namee'";
        $result71 = mysqli_query($connection,$sql71);
        while($row71 = mysqli_fetch_assoc($result71)){
         $sumT7[] = $row71['time'];
     }  
     $sum7 = array_sum($sumT7);
      

     if($sum7 >= 3600){
      $hour = (int)($sum7 / 3600);
      $Fmin = $sum7 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt7 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum7 >= 60){
       $min = (int)($sum7/60) ;
    $sec = $sum7 - ($min * 60);
       $sumt7 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt7 = $sum7." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt7; ?></td> <?php
     }
    
     ?>
     <!-- เสร็จคำศัพ รายละเอียดของห้องพัก -->
     <?php 
     $sql8 = "SELECT time FROM LessonTime WHERE id_detail = 81 AND code = '$number' AND user_usr = '$namee' OR id_detail = 82 OR id_detail = 83 OR id_detail = 84 ";
     $result8 = mysqli_query($connection,$sql8);
     $row8 = mysqli_fetch_assoc($result8);
     if(!$row8){
        ?><td>-</td><?php
     }else{
        $sql81 = "SELECT time FROM LessonTime WHERE id_detail = 81 AND code = '$number' AND user_usr = '$namee' OR id_detail = 82 OR id_detail = 83 OR id_detail = 84 ";
        $result81 = mysqli_query($connection,$sql81);
        while($row81 = mysqli_fetch_assoc($result81)){
         $sumT8[] = $row81['time'];
     }  
     $sum8 = array_sum($sumT8);
      

     if($sum8 >= 3600){
      $hour = (int)($sum8 / 3600);
      $Fmin = $sum8 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt8 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum8 >= 60){
       $min = (int)($sum8/60) ;
    $sec = $sum8 - ($min * 60);
       $sumt8 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt8 = $sum8." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt8; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จประโยค รายละเอียดของห้องพัก -->
       <?php 
     $sql9 = "SELECT time FROM LessonTime WHERE id_detail = 9 AND code = '$number' AND user_usr = '$namee'";
     $result9 = mysqli_query($connection,$sql9);
     $row9 = mysqli_fetch_assoc($result9);
     if(!$row9){
        ?><td>-</td><?php
     }else{
        $sql91 = "SELECT time FROM LessonTime WHERE id_detail = 9 AND code = '$number' AND user_usr = '$namee'";
        $result91 = mysqli_query($connection,$sql91);
        while($row91 = mysqli_fetch_assoc($result91)){
         $sumT9[] = $row91['time'];
     }  
     $sum9 = array_sum($sumT9);
      
//var_dump( $sum9 );
     if($sum9 >= 3600){
      $hour = (int)($sum9 / 3600);
      $Fmin = $sum9 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt9 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum9 >= 60){
       $min = (int)($sum9/60) ;
    $sec = $sum9 - ($min * 60);
       $sumt9 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt9 = $sum9." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt9; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จบทสนทนา รายละเอียดของห้องพัก -->
    </tr>
  </tbody>
</table>
  

    </div>
  </div><br>
  <!-- เสร็จสถานการณ์ที่ 3 -->
  <div class="row">
    <div class="col-3" >
    <div class="zz" style="text-align: center;">
     สถานการณ์ที่ 4
    </div>
    </div>
    <div class="col-9">
    
    <div class="aa" style="text-align: left;">
    <p>เช็คอิน</p>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">คำศัพท์</th>
      <th scope="col">ประโยค</th>
      <th scope="col">บทสนทนา</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php 
     $sql10 = "SELECT time FROM LessonTime WHERE id_detail = 10 AND code = '$number' AND user_usr = '$namee'";
     $result10 = mysqli_query($connection,$sql10);
     $row10 = mysqli_fetch_assoc($result10);
     if(!$row10){
        ?><td>-</td><?php
     }else{
        $sql101 = "SELECT time FROM LessonTime WHERE id_detail = 10 AND code = '$number' AND user_usr = '$namee'";
        $result101 = mysqli_query($connection,$sql101);
        while($row101 = mysqli_fetch_assoc($result101)){
         $sumT10[] = $row101['time'];
     }  
     $sum10 = array_sum($sumT10);
     // var_dump( $sum9);
     if($sum10 >= 3600){
      $hour = (int)($sum10 / 3600);
      $Fmin = $sum10 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt10 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum10 >= 60){
       $min = (int)($sum10/60) ;
    $sec = $sum10 - ($min * 60);
       $sumt10 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt10 = $sum10." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt10; ?></td> <?php
     }
    
     ?>
     <!-- เสร็จคำศัพ เช็คอิน -->
     <?php 
     $sql11 = "SELECT time FROM LessonTime WHERE id_detail = 111  AND code = '$number' AND user_usr = '$namee' OR id_detail = 112 OR id_detail = 113 ";
     $result11 = mysqli_query($connection,$sql11);
     $row11 = mysqli_fetch_assoc($result11);
     if(!$row11){
        ?><td>-</td><?php
     }else{
        $sql111 = "SELECT time FROM LessonTime WHERE id_detail = 111  AND code = '$number' AND user_usr = '$namee' OR id_detail = 112 OR id_detail = 113 ";
        $result111 = mysqli_query($connection,$sql111);
        while($row111 = mysqli_fetch_assoc($result111)){
         $sumT11[] = $row111['time'];
        }  
     $sum11 = array_sum($sumT11);
      

     if($sum11 >= 3600){
      $hour = (int)($sum11 / 3600);
      $Fmin = $sum11 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt11 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum11 >= 60){
       $min = (int)($sum11/60) ;
    $sec = $sum11 - ($min * 60);
       $sumt11 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt11 = $sum11." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt11; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จประโยค เช็คอิน -->
       <?php 
     $sql12 = "SELECT time FROM LessonTime WHERE id_detail = 12 AND code = '$number' AND user_usr = '$namee'";
     $result12 = mysqli_query($connection,$sql12);
     $row12 = mysqli_fetch_assoc($result12);
     if(!$row12){
        ?><td>-</td><?php
     }else{
        $sql121 = "SELECT time FROM LessonTime WHERE id_detail = 12 AND code = '$number' AND user_usr = '$namee'";
        $result121 = mysqli_query($connection,$sql121);
        while($row121 = mysqli_fetch_assoc($result121)){
         $sumT12[] = $row121['time'];
     }  
     $sum12 = array_sum($sumT12);
      

     if($sum12 >= 3600){
      $hour = (int)($sum12 / 3600);
      $Fmin = $sum12 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt12 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum12 >= 60){
       $min = (int)($sum12/60) ;
    $sec = $sum12 - ($min * 60);
       $sumt12 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt12 = $sum12." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt12; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จบทสนทนา เช็คอิน -->
    </tr>
  </tbody>
</table>
  

    </div>
  </div><br>
  <!-- เสร็จสถานการณ์ที่ 4 -->

  <div class="row">
    <div class="col-3" >
    <div class="zz" style="text-align: center;">
     สถานการณ์ที่ 5
    </div>
    </div>
    <div class="col-9">
    
    <div class="aa" style="text-align: left;">
    <p>ปัญหาระหว่างการเข้าพัก</p>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">คำศัพท์</th>
      <th scope="col">ประโยค</th>
      <th scope="col">บทสนทนา</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php 
     $sql13 = "SELECT time FROM LessonTime WHERE id_detail = 13 AND code = '$number' AND user_usr = '$namee'";
     $result13 = mysqli_query($connection,$sql13);
     $row13 = mysqli_fetch_assoc($result13);
     if(!$row13){
        ?><td>-</td><?php
     }else{
        $sql131 = "SELECT time FROM LessonTime WHERE id_detail = 13 AND code = '$number' AND user_usr = '$namee'";
        $result131 = mysqli_query($connection,$sql131);
        while($row131 = mysqli_fetch_assoc($result131)){
         $sumT13[] = $row131['time'];
     }  
     $sum13 = array_sum($sumT13);
     // var_dump( $sum9);
     if($sum13 >= 3600){
      $hour = (int)($sum13 / 3600);
      $Fmin = $sum13 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt13 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum13 >= 60){
       $min = (int)($sum13/60) ;
    $sec = $sum13 - ($min * 60);
       $sumt13 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt13 = $sum13." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt13; ?></td> <?php
     }
    
     ?>
     <!-- เสร็จคำศัพ ปัญหาระหว่างการเข้าพัก -->
     <?php 
     $sql14 = "SELECT time FROM LessonTime WHERE id_detail = 14 AND code = '$number' AND user_usr = '$namee' ";
     $result14 = mysqli_query($connection,$sql14);
     $row14 = mysqli_fetch_assoc($result14);
     if(!$row14){
        ?><td>-</td><?php
     }else{
        $sql141 = "SELECT time FROM LessonTime WHERE id_detail = 14 AND code = '$number' AND user_usr = '$namee'";
        $result141 = mysqli_query($connection,$sql141);
        while($row141 = mysqli_fetch_assoc($result141)){
         $sumT14[] = $row141['time'];
     }  
     $sum14 = array_sum($sumT14);
      

     if($sum14 >= 3600){
      $hour = (int)($sum14 / 3600);
      $Fmin = $sum14 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt14 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum14 >= 60){
       $min = (int)($sum14/60) ;
    $sec = $sum14 - ($min * 60);
       $sumt14 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt14 = $sum14." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt14; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จประโยค ปัญหาระหว่างการเข้าพัก -->
       <?php 
     $sql15 = "SELECT time FROM LessonTime WHERE id_detail = 15 AND code = '$number' AND user_usr = '$namee'";
     $result15 = mysqli_query($connection,$sql15);
     $row15 = mysqli_fetch_assoc($result15);
     if(!$row15){
        ?><td>-</td><?php
     }else{
        $sql151 = "SELECT time FROM LessonTime WHERE id_detail = 15 AND code = '$number' AND user_usr = '$namee'";
        $result151 = mysqli_query($connection,$sql151);
        while($row151 = mysqli_fetch_assoc($result151)){
         $sumT15[] = $row151['time'];
     }  
     $sum15 = array_sum($sumT15);
      

     if($sum15 >= 3600){
      $hour = (int)($sum15 / 3600);
      $Fmin = $sum15 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt15 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum15 >= 60){
       $min = (int)($sum15/60) ;
    $sec = $sum15 - ($min * 60);
       $sumt15 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt15 = $sum15." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt15; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จบทสนทนา ปัญหาระหว่างการเข้าพัก -->
    </tr>
  </tbody>
</table>
  

    </div>
  </div><br>
  <!-- เสร็จสถานการณ์ที่ 5 -->



  <div class="row">
    <div class="col-3" >
    <div class="zz" style="text-align: center;">
     สถานการณ์ที่ 6
    </div>
    </div>
    <div class="col-9">
    
    <div class="aa" style="text-align: left;">
    <p>การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม</p>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">คำศัพท์</th>
      <th scope="col">ประโยค</th>
      <th scope="col">บทสนทนา</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php 
     $sql16 = "SELECT time FROM LessonTime WHERE id_detail = 16 AND code = '$number' AND user_usr = '$namee'";
     $result16 = mysqli_query($connection,$sql16);
     $row16 = mysqli_fetch_assoc($result16);
     if(!$row16){
        ?><td>-</td><?php
     }else{
        $sql161 = "SELECT time FROM LessonTime WHERE id_detail = 16 AND code = '$number' AND user_usr = '$namee'";
        $result161 = mysqli_query($connection,$sql161);
        while($row161 = mysqli_fetch_assoc($result161)){
         $sumT16[] = $row161['time'];
     }  
     $sum16 = array_sum($sumT16);
     // var_dump( $sum9);
     if($sum16 >= 3600){
      $hour = (int)($sum16 / 3600);
      $Fmin = $sum16 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt16 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum16 >= 60){
       $min = (int)($sum16/60) ;
    $sec = $sum16 - ($min * 60);
       $sumt16 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt16 = $sum16." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt16; ?></td> <?php
     }
    
     ?>
     <!-- เสร็จคำศัพ การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม -->
     <?php 
     $sql17 = "SELECT time FROM LessonTime WHERE id_detail = 17 AND code = '$number' AND user_usr = '$namee' ";
     $result17 = mysqli_query($connection,$sql17);
     $row17 = mysqli_fetch_assoc($result17);
     if(!$row17){
        ?><td>-</td><?php
     }else{
        $sql171 = "SELECT time FROM LessonTime WHERE id_detail = 17 AND code = '$number' AND user_usr = '$namee' ";
        $result171 = mysqli_query($connection,$sql171);
        while($row171 = mysqli_fetch_assoc($result171)){
         $sumT17[] = $row171['time'];
     }  
     $sum17 = array_sum($sumT17);
      

     if($sum17 >= 3600){
      $hour = (int)($sum17 / 3600);
      $Fmin = $sum17 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt17 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum17 >= 60){
       $min = (int)($sum17/60) ;
    $sec = $sum17 - ($min * 60);
       $sumt17 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt17 = $sum17." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt17; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จประโยค การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม -->
       <?php 
     $sql18 = "SELECT time FROM LessonTime WHERE id_detail = 18 AND code = '$number' AND user_usr = '$namee'";
     $result18 = mysqli_query($connection,$sql18);
     $row18 = mysqli_fetch_assoc($result18);
     if(!$row18){
        ?><td>-</td><?php
     }else{
        $sql181 = "SELECT time FROM LessonTime WHERE id_detail = 18 AND code = '$number' AND user_usr = '$namee'";
        $result181 = mysqli_query($connection,$sql181);
        while($row181 = mysqli_fetch_assoc($result181)){
         $sumT18[] = $row181['time'];
     }  
     $sum18 = array_sum($sumT18);
      

     if($sum18 >= 3600){
      $hour = (int)($sum18 / 3600);
      $Fmin = $sum18 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt18 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum18 >= 60){
       $min = (int)($sum18/60) ;
    $sec = $sum18 - ($min * 60);
       $sumt18 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt18 = $sum18." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt18; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จบทสนทนา การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม -->
    </tr>
  </tbody>
</table>
  

    </div>
  </div><br>
  <!-- เสร็จสถานการณ์ที่ 6 -->

  <div class="row">
    <div class="col-3" >
    <div class="zz" style="text-align: center;">
     สถานการณ์ที่ 7
    </div>
    </div>
    <div class="col-9">
    
    <div class="aa" style="text-align: left;">
    <p>การสอบถามตำแหน่งสถานที่ และบริการเรียกรถ</p>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">คำศัพท์</th>
      <th scope="col">ประโยค</th>
      <th scope="col">บทสนทนา</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php 
     $sql19 = "SELECT time FROM LessonTime WHERE id_detail = 19 AND code = '$number' AND user_usr = '$namee'";
     $result19 = mysqli_query($connection,$sql19);
     $row19 = mysqli_fetch_assoc($result19);
     if(!$row19){
        ?><td>-</td><?php
     }else{
        $sql191 = "SELECT time FROM LessonTime WHERE id_detail = 19 AND code = '$number' AND user_usr = '$namee'";
        $result191 = mysqli_query($connection,$sql191);
        while($row191 = mysqli_fetch_assoc($result191)){
         $sumT19[] = $row191['time'];
     }  
     $sum19 = array_sum($sumT19);
     // var_dump( $sum9);
     if($sum19 >= 3600){
      $hour = (int)($sum19 / 3600);
      $Fmin = $sum19 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt19 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum19 >= 60){
       $min = (int)($sum19/60) ;
    $sec = $sum19 - ($min * 60);
       $sumt19 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt19 = $sum19." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt19; ?></td> <?php
     }
    
     ?>
     <!-- เสร็จคำศัพ การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม -->
     <?php 
     $sql20 = "SELECT time FROM LessonTime WHERE id_detail = 20  AND code = '$number' AND user_usr = '$namee'";
     $result20 = mysqli_query($connection,$sql20);
     $row20 = mysqli_fetch_assoc($result20);
     if(!$row20){
        ?><td>-</td><?php
     }else{
        $sql201 = "SELECT time FROM LessonTime WHERE id_detail = 20  AND code = '$number' AND user_usr = '$namee'";
        $result201 = mysqli_query($connection,$sql201);
        while($row201 = mysqli_fetch_assoc($result201)){
         $sumT20[] = $row201['time'];
     }  
     $sum20 = array_sum($sumT20);
      

     if($sum20 >= 3600){
      $hour = (int)($sum20 / 3600);
      $Fmin = $sum20 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt20 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum20 >= 60){
       $min = (int)($sum20/60) ;
    $sec = $sum20 - ($min * 60);
       $sumt20 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt20 = $sum20." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt20; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จประโยค การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม -->
       <?php 
     $sql21 = "SELECT time FROM LessonTime WHERE id_detail = 21 AND code = '$number' AND user_usr = '$namee'";
     $result21 = mysqli_query($connection,$sql21);
     $row21 = mysqli_fetch_assoc($result21);
     if(!$row21){
        ?><td>-</td><?php
     }else{
        $sql211 = "SELECT time FROM LessonTime WHERE id_detail = 21 AND code = '$number' AND user_usr = '$namee'";
        $result211 = mysqli_query($connection,$sql211);
        while($row211 = mysqli_fetch_assoc($result211)){
         $sumT21[] = $row211['time'];
     }  
     $sum21 = array_sum($sumT21);
      

     if($sum21 >= 3600){
      $hour = (int)($sum21 / 3600);
      $Fmin = $sum21 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt21 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum21 >= 60){
       $min = (int)($sum21/60) ;
    $sec = $sum21 - ($min * 60);
       $sumt21 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt21 = $sum21." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt21; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จบทสนทนา การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม -->
    </tr>
  </tbody>
</table>
  

    </div>
  </div><br>
  <!-- เสร็จสถานการณ์ที่ 7 -->


  <div class="row">
    <div class="col-3" >
    <div class="zz" style="text-align: center;">
     สถานการณ์ที่ 8
    </div>
    </div>
    <div class="col-9">
    
    <div class="aa" style="text-align: left;">
    <p>การแจ้งออกจากโรงแรม (เช็คเอาท์)</p>
    </div>
    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">คำศัพท์</th>
      <th scope="col">ประโยค</th>
      <th scope="col">บทสนทนา</th>
    </tr>
  </thead>
  <tbody>
    <tr>
     <?php 
     $sql22 = "SELECT time FROM LessonTime WHERE id_detail = 22 AND code = '$number' AND user_usr = '$namee'";
     $result22 = mysqli_query($connection,$sql22);
     $row22 = mysqli_fetch_assoc($result22);
     if(!$row22){
        ?><td>-</td><?php
     }else{
        $sql221 = "SELECT time FROM LessonTime WHERE id_detail = 22 AND code = '$number' AND user_usr = '$namee'";
        $result221 = mysqli_query($connection,$sql221);
        while($row221 = mysqli_fetch_assoc($result221)){
         $sumT22[] = $row221['time'];
     }  
     $sum22 = array_sum($sumT22);
     // var_dump( $sum9);
     if($sum22 >= 3600){
      $hour = (int)($sum22 / 3600);
      $Fmin = $sum22 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt22 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum22 >= 60){
       $min = (int)($sum22/60) ;
    $sec = $sum22 - ($min * 60);
       $sumt22 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt22 = $sum22." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt22; ?></td> <?php
     }
    
     ?>
     <!-- เสร็จคำศัพ การแจ้งออกจากโรงแรม (เช็คเอาท์) -->
     <?php 
     $sql23 = "SELECT time FROM LessonTime WHERE id_detail = 23  AND code = '$number' AND user_usr = '$namee'";
     $result23 = mysqli_query($connection,$sql23);
     $row23 = mysqli_fetch_assoc($result23);
     if(!$row23){
        ?><td>-</td><?php
     }else{
        $sql231 = "SELECT time FROM LessonTime WHERE id_detail = 23  AND code = '$number' AND user_usr = '$namee'";
        $result231 = mysqli_query($connection,$sql231);
        while($row231 = mysqli_fetch_assoc($result231)){
         $sumT23[] = $row231['time'];
     }  
     $sum23 = array_sum($sumT23);
      

     if($sum23 >= 3600){
      $hour = (int)($sum23 / 3600);
      $Fmin = $sum23 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt23 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum23 >= 60){
       $min = (int)($sum23/60) ;
    $sec = $sum23 - ($min * 60);
       $sumt23 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt23 = $sum23." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt23; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จประโยค การแจ้งออกจากโรงแรม (เช็คเอาท์) -->
       <?php 
     $sql24 = "SELECT time FROM LessonTime WHERE id_detail = 24 AND code = '$number' AND user_usr = '$namee'";
     $result24 = mysqli_query($connection,$sql24);
     $row24 = mysqli_fetch_assoc($result24);
     if(!$row24){
        ?><td>-</td><?php
     }else{
        $sql241 = "SELECT time FROM LessonTime WHERE id_detail = 24 AND code = '$number' AND user_usr = '$namee'";
        $result241 = mysqli_query($connection,$sql241);
        while($row241 = mysqli_fetch_assoc($result241)){
         $sumT24[] = $row241['time'];
     }  
     $sum24 = array_sum($sumT24);
      

     if($sum24 >= 3600){
      $hour = (int)($sum24 / 3600);
      $Fmin = $sum24 - ($hour * 3600);
       $min = (int)($Fmin/60) ;
    $sec = $Fmin - ($min * 60);
        $sumt24 = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
       //echo $sumt;
    }elseif($sum24 >= 60){
       $min = (int)($sum24/60) ;
    $sec = $sum24 - ($min * 60);
       $sumt24 = $min." นาที ".$sec." วินาที";
       //echo $sumt;
    }else{
    $sumt24 = $sum24." วินาที";
    //echo $sumt;
    }
    ?>   <td><?php echo $sumt24; ?></td> <?php
     }
    
     ?> 
       <!-- เสร็จบทสนทนา การแจ้งออกจากโรงแรม (เช็คเอาท์) -->
    </tr>
  </tbody>
</table>
  

    </div>
  </div><br>
  <!-- เสร็จสถานการณ์ที่ 8 -->
  </div>
  </div><br>
<?php
}else{
    echo 'เกิดข้อผิดพลาดบางอย่าง';
}
?>
  </tbody>
</table>
<?php  mysqli_close($connection);?>
    <!-- close container -->
    </div>
    <br>
    <div class="text-center" style="color: red;"><h6><a href="../../../home/index.php" class="text-reset"> << กลับไปหน้าหลัก </a> </h6></div>
  
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
