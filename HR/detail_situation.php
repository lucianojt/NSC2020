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
    <title>ข้อมูลสถานการณ์</title>
    <?php include("head.php"); ?>
    <style>
     body {
        background-image: url('../images/wall.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
       
        }
    .navbar{
      background-color: #660223;
        /* overflow: hidden;
        position: fixed; */
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
    .text{
      /* margin-top: 56px; */
    text-align: center;
    background-image: url('../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px;


   }
   .table{
        background-color: #DEDADB;
    }
    </style>
    <?php 
$room = $_SESSION["code"] ;
$name = $_GET['name'];
$s = 'Room_'.$room;

$sql8 = "SELECT user_usr FROM $s WHERE name_usr = '$name' ";
$result8 = mysqli_query($connection,$sql8);
$row8 = mysqli_fetch_assoc($result8);
if(!$row8){
    echo 'ชื่อนี้ไม่มีอยู่ในระบบ';
}
?>
     
      <div class="text"><h3>พนักงาน: <?php echo $name."(".$row8['user_usr'].")";?></h3></div><br>
      <div class="container">
      <div class="link">
        <h6><a href="MGRoom_hr.php" class="text-reset">จัดการห้อง</a> > <a href="data_situation.php" class="text-reset">ข้อมูลสถานการณ์</a> > ข้อมูล</h6>
      </div>
      </div>
<div class="container">
    <?php 
    $sql = "SELECT * FROM $s WHERE name_usr = '$name' AND code = '$room' ";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_assoc($result);
    // echo $row['user_usr'];
    if(!$result){
        echo 'เกิดข้อผิดพลาดบางอย่าง';
    }else{

    $sql2 = "SELECT * FROM scoreCheckin WHERE user_usr = '".$row['user_usr']."' ";
    $result2 = mysqli_query($connection,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    if(!$row2){
        ?><br>
        <p style="color: red; font-weight:bold;">เกณฑ์การวัดระดับ</p>
        <table class="table">
        <thead class="thead" style="color: #660223;">
    <tr>
      <th style="width: 40%;" scope="col">สถานการณ์</th>
      <th class="cent" scope="col">เกณฑ์</th>
      <th class="cent" scope="col">คะแนนที่ได้(มากที่สุด)</th>
      <th class="cent" scope="col">จำนวนครั้งที่ทำแบบทดสอบ</th>
    </tr>
  </thead>
  <tbody>
   
    <tr>
      <th scope="row"  style="color: #660223;">เช็คอิน</th>
      <td class="cent">-</td>
      <td class="cent">-</td>
      <td class="cent">-</td>
    </tr>
        <tr>
        <th scope="row" style="color: #660223;">การแจ้งออกจากโรงแรม (เช็คเอาท์)</th>
        <td class="cent">-</td>
        <td class="cent">-</td>
        <td class="cent">-</td>
        </tr>
  </tbody>
</table>
        <?php
    }else{
        //  echo 'ชื่อนี้ทำแล้ว';
      
        $usermm =  $row['user_usr'];


        //เก็บคะแนนของประโยคที่ใช้ในชีวิตประจำวัน
        $sql31 = "SELECT score_sim FROM scoreSim WHERE user_usr = '$usermm' AND code = '$room' ";
        $result31 = mysqli_query($connection,$sql31);
        $row31 = mysqli_fetch_assoc($result31);
        

        if($row31){
        $sql3 = "SELECT score_sim FROM scoreSim WHERE user_usr = '$usermm' AND code = '$room' ";
        $result3 = mysqli_query($connection,$sql3);
       
        if(!$result3){
            echo 'เกิดบางอย่างผิดผลาด';
        }else{
        $row311 = mysqli_num_rows($result3); 
         while( $row3 = mysqli_fetch_assoc($result3)){
        //   echo $row3['score_sim'];
          $scoreSim[] = $row3['score_sim'];
        }
        $score = max($scoreSim);
        // echo  $score;
        // var_dump($score);
        }
        }
        //สิ้นสุดการเก็บคะแนนของประโยคที่ใช้ในชีวิตประจำวัน


        //เก็บคะแนนของการจองห้องพัก
        $sql41 = "SELECT score_reserve FROM scoreReserve WHERE user_usr = '$usermm' AND code = '$room' ";
        $result41 = mysqli_query($connection,$sql41);
        $row41 = mysqli_fetch_assoc($result41);
        

        if($row41){
        $sql4 = "SELECT score_reserve FROM scoreReserve WHERE user_usr = '$usermm' AND code = '$room' ";
        $result4 = mysqli_query($connection,$sql4);
       
        if(!$result4){
            echo 'เกิดบางอย่างผิดผลาด';
        }else{
        $row411 = mysqli_num_rows($result4); 
         while( $row4 = mysqli_fetch_assoc($result4)){
        //   echo $row3['score_reserve'];
          $scoreReserve[] = $row4['score_reserve'];
        }
        $scor = max($scoreReserve);
        // echo  $scor;
        // var_dump($scor);
        }
        }
        //สิ้นสุดการเก็บคะแนนของการจองห้องพัก



         //เก็บคะแนนของรายละเอียดของห้องพัก
         $sql51 = "SELECT score_detailreserve FROM scoreDetailreserve WHERE user_usr = '$usermm' AND code = '$room' ";
         $result51 = mysqli_query($connection,$sql51);
         $row51 = mysqli_fetch_assoc($result51);
         
 
         if($row51){
         $sql5 = "SELECT score_detailreserve FROM scoreDetailreserve WHERE user_usr = '$usermm' AND code = '$room' ";
         $result5 = mysqli_query($connection,$sql5);
        
         if(!$result5){
             echo 'เกิดบางอย่างผิดผลาด';
         }else{
         $row511 = mysqli_num_rows($result5); 
          while( $row5 = mysqli_fetch_assoc($result5)){
         //   echo $row3['score_detailreserve'];
           $scoreDetailreserve[] = $row5['score_detailreserve'];
         }
         $sco = max($scoreDetailreserve);
         // echo  $sco;
         // var_dump($sco);
         }
         }
         //สิ้นสุดการเก็บคะแนนของรายละเอียดของห้องพัก


        //เก็บคะแนนของเช็คอิน
        $sql61 = "SELECT score_checkin FROM scoreCheckin WHERE user_usr = '$usermm' AND code = '$room' ";
        $result61 = mysqli_query($connection,$sql61);
        $row61 = mysqli_fetch_assoc($result61);
        

        if($row61){
        $sql6 = "SELECT score_checkin FROM scoreCheckin WHERE user_usr = '$usermm' AND code = '$room' ";
        $result6 = mysqli_query($connection,$sql6);
        
        if(!$result6){
            echo 'เกิดบางอย่างผิดผลาด';
        }else{
        $row611 = mysqli_num_rows($result6); 
        while( $row6 = mysqli_fetch_assoc($result6)){
        //   echo $row3['score_checkin'];
            $scoreCheckin[] = $row6['score_checkin'];
        }
        $sc = max($scoreCheckin);
        // var_dump($score);
        }
        }
        //สิ้นสุดการเก็บคะแนนของเช็คอิน


         //เก็บคะแนนของปัญหาระหว่างการเข้าพัก
         $sql71 = "SELECT score_problem FROM scoreProblem WHERE user_usr = '$usermm' AND code = '$room' ";
         $result71 = mysqli_query($connection,$sql71);
         $row71 = mysqli_fetch_assoc($result71);
         
 
         if($row71){
         $sql7 = "SELECT score_problem FROM scoreProblem WHERE user_usr = '$usermm' AND code = '$room' ";
         $result7 = mysqli_query($connection,$sql7);
         
         if(!$result7){
             echo 'เกิดบางอย่างผิดผลาด';
         }else{
         $row711 = mysqli_num_rows($result7); 
         while( $row7 = mysqli_fetch_assoc($result7)){
         //   echo $row3['score_problem'];
             $scoreProblem[] = $row7['score_problem'];
         }
         $s = max($scoreProblem);
         // var_dump($score);
         }
         }
         //สิ้นสุดการเก็บคะแนนของปัญหาระหว่างการเข้าพัก

          //เก็บคะแนนของการให้ข้อมูลบริการด้านต่างๆ ของโรงแรม
          $sql81 = "SELECT score_data FROM scoreData WHERE user_usr = '$usermm' AND code = '$room' ";
          $result81 = mysqli_query($connection,$sql81);
          $row81 = mysqli_fetch_assoc($result81);
          
  
          if($row81){
          $sql8 = "SELECT score_data FROM scoreData WHERE user_usr = '$usermm' AND code = '$room' ";
          $result8 = mysqli_query($connection,$sql8);
          
          if(!$result8){
              echo 'เกิดบางอย่างผิดผลาด';
          }else{
          $row811 = mysqli_num_rows($result8); 
          while( $row8 = mysqli_fetch_assoc($result8)){
          //   echo $row3['score_data'];
              $scoreData[] = $row8['score_data'];
          }
          $ss = max($scoreData);
          // var_dump($score);
          }
          }
          //สิ้นสุดการเก็บคะแนนของการให้ข้อมูลบริการด้านต่างๆ ของโรงแรม

          //เก็บคะแนนของการสอบถามตำแหน่งสถานที่ และบริการเรียกรถแท็กซี่
          $sql91 = "SELECT score_location FROM scoreLocation WHERE user_usr = '$usermm' AND code = '$room' ";
          $result91 = mysqli_query($connection,$sql91);
          $row91 = mysqli_fetch_assoc($result91);
          
  
          if($row91){
          $sql9 = "SELECT score_location FROM scoreLocation WHERE user_usr = '$usermm' AND code = '$room' ";
          $result9 = mysqli_query($connection,$sql9);
          
          if(!$result9){
              echo 'เกิดบางอย่างผิดผลาด';
          }else{
          $row911 = mysqli_num_rows($result9); 
          while( $row9 = mysqli_fetch_assoc($result9)){
          //   echo $row3['score_location'];
              $scoreLocation[] = $row9['score_location'];
          }
          $sss = max($scoreLocation);
          // var_dump($score);
          }
          }
          //สิ้นสุดการเก็บคะแนนของการสอบถามตำแหน่งสถานที่ และบริการเรียกรถแท็กซี่

          //เก็บคะแนนของการแจ้งออกจากโรงแรม (เช็คเอาท์)
          $sql101 = "SELECT score_out FROM scoreOut WHERE user_usr = '$usermm' AND code = '$room' ";
          $result101 = mysqli_query($connection,$sql101);
          $row101 = mysqli_fetch_assoc($result101);
          
  
          if($row101){
          $sql10 = "SELECT score_out FROM scoreOut WHERE user_usr = '$usermm' AND code = '$room' ";
          $result10 = mysqli_query($connection,$sql10);
          
          if(!$result10){
              echo 'เกิดบางอย่างผิดผลาด';
          }else{
          $row1011 = mysqli_num_rows($result10); 
          while( $row10 = mysqli_fetch_assoc($result10)){
          //   echo $row3['score_out'];
              $scoreOut[] = $row10['score_out'];
          }
          $ssss = max($scoreOut);
          // var_dump($score);
          }
          }
          //สิ้นสุดการเก็บคะแนนของการแจ้งออกจากโรงแรม (เช็คเอาท์)


        ?><br>
        <p style="color: red; font-weight:bold;">เกณฑ์การวัดระดับ</p>
        <table class="table">
        <thead class="thead" style="color: #660223;">
    <tr>
      <th style="width: 40%;" scope="col">สถานการณ์</th>
      <th class="cent" scope="col">เกณฑ์</th>
      <th class="cent" scope="col">คะแนนที่ได้(มากที่สุด)</th>
      <th class="cent" scope="col">จำนวนครั้งที่ทำแบบทดสอบ</th>
    </tr>
  </thead>
  <tbody>
   
    
    <tr>
      <th scope="row"  style="color: #660223;">เช็คอิน</th>
      <?php if(!$row61){
          ?>
          <td class="cent">-</td>
      <td class="cent">-</td>
      <td class="cent">-</td>
          <?php
      }else{
        if( $sc >=0 AND $sc <= 9 ){
            ?>
       <td class="cent">พอใช้</td>
   <td class="cent"><?php echo $sc."/12";?></td>
   <td class="cent"><?php echo $row611." ครั้ง";?></td>
     <?php
       }elseif($sc >9 AND $sc < 12){
         ?>
         <td class="cent">ดี</td>
     <td class="cent"><?php echo $sc."/12";?></td>
     <td class="cent"><?php echo $row611." ครั้ง";?></td>
       <?php
       }elseif($sc >=12  ){
         ?>
         <td class="cent">ดีมาก</td>
     <td class="cent"><?php echo $sc."/12";?></td>
     <td class="cent"><?php echo $row611." ครั้ง";?></td>
       <?php
       }
      }
      ?>  
    </tr>
   
    <tr>
        <th scope="row" style="color: #660223;">การแจ้งออกจากโรงแรม (เช็คเอาท์)</th>
        <?php if(!$row101){
          ?>
          <td class="cent">-</td>
      <td class="cent">-</td>
      <td class="cent">-</td>
          <?php
      }else{
        if( $ssss >=0 AND $ssss <= 6 ){
            ?>
       <td class="cent">พอใช้</td>
   <td class="cent"><?php echo $ssss."/10";?></td>
   <td class="cent"><?php echo $row1011." ครั้ง";?></td>
     <?php
       }elseif($ssss >6 AND $ssss < 8){
         ?>
         <td class="cent">ดี</td>
     <td class="cent"><?php echo $ssss."/10";?></td>
     <td class="cent"><?php echo $row1011." ครั้ง";?></td>
       <?php
       }elseif($ssss >=8  ){
         ?>
         <td class="cent">ดีมาก</td>
     <td class="cent"><?php echo $ssss."/10";?></td>
     <td class="cent"><?php echo $row1011." ครั้ง";?></td>
       <?php
       }
      }
      ?>  
    </tr>
  </tbody>
</table>
        <?php
    }
      
    }
    ?>
      
</div>
<div class="text-center" style="color: red;"><h6><a href="MGRoom_hr.php" class="text-reset"> << กลับไปหน้าจัดการห้อง </a> </h6></div>

 <!-- ปิด cookie -->

 <?php

}else{
   header("location:../logout_hr.php");
}
include('../footer.php');
ob_end_flush(); ?>