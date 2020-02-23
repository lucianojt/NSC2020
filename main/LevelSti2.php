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
    <title>ระดับสถานการณ์</title>
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
        /* overflow: hidden;
        position: fixed;
        top: 0;
        width: 100%; */
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

    .table{
        background-color: #DEDADB;
    }

   
    </style>
   

   <div class="main">
    <h3>ระดับสถานการณ์</h3>
    </div><br>
  
  
    <div class="container">
    <div class="link">
        <h6><a href="../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="conclude.php" class="text-reset">ผลสรุป</a> > ระดับสถานการณ์</h6>
   </div><br>
<!-- close container -->
   </div>
<div class="container">
<?php 
$room = $_SESSION["pincode"];
$name = 'Room_'.$room;
$userr = $_SESSION["username_user"];


$sql = "SELECT * FROM $name WHERE user_usr = '$userr' ";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);

if(!$row){
    echo 'เกิดข้อผิดพลาดบางอย่าง';
}else{

    $sql2 = "SELECT * FROM scoreExercise WHERE user_usr = '$userr'  AND code = '$room'";
    $result2 = mysqli_query($connection,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    if(!$row2){
    ?>
    <p style="color: red; font-weight:bold;">เกณฑ์การวัดระดับ</p>
    <table class="table">
    <thead class="thead" style="color: #660223;">
        <tr>
        <th scope="col">สถานการณ์</th>
        <th scope="col">เกณฑ์</th>
        <th scope="col">คะแนนที่ได้(มากที่สุด)</th>
        <th scope="col">จำนวนครั้งที่ทำแบบทดสอบ</th>
        </tr>
    </thead>
    <tbody>

        <tr>
        <th scope="row" style="color: #660223;">ประโยคที่ใช้ในชีวิตประจำวัน</th>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        </tr>

        <tr>
        <th scope="row" style="color: #660223;">การจองห้องพัก</th>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        </tr>

        <tr>
        <th scope="row" style="color: #660223;">รายละเอียดของห้องพัก</th>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        </tr>

        <tr>
        <th scope="row" style="color: #660223;">เช็คอิน</th>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        </tr>

        <tr>
        <th scope="row" style="color: #660223;">ปัญหาระหว่างการเข้าพัก</th>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        </tr>

        <tr>
        <th scope="row" style="color: #660223;">การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม</th>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        </tr>

        <tr>
        <th scope="row" style="color: #660223;">การสอบถามตำแหน่งสถานที่ และบริการเรียกรถแท็กซี่</th>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        </tr>

        <tr>
        <th scope="row" style="color: #660223;">การแจ้งออกจากโรงแรม (เช็คเอาท์)</th>
        <td>-</td>
        <td>-</td>
        <td>-</td>
        </tr>
    </tbody>
    </table>
    <?php
    }else{
        // echo $userr.$room;

         //เก็บคะแนนของประโยคที่ใช้ในชีวิตประจำวัน
         $sql31 = "SELECT score_sim FROM scoreSim WHERE user_usr = '$userr' AND code = '$room' ";
         $result31 = mysqli_query($connection,$sql31);
         $row31 = mysqli_fetch_assoc($result31);
         
 
         if($row31){
         $sql3 = "SELECT score_sim FROM scoreSim WHERE user_usr = '$userr' AND code = '$room' ";
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
        $sql41 = "SELECT score_reserve FROM scoreReserve WHERE user_usr = '$userr' AND code = '$room' ";
        $result41 = mysqli_query($connection,$sql41);
        $row41 = mysqli_fetch_assoc($result41);
        

        if($row41){
        $sql4 = "SELECT score_reserve FROM scoreReserve WHERE user_usr = '$userr' AND code = '$room' ";
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
        // echo  $score;
        // var_dump($score);
        }
        }
        //สิ้นสุดการเก็บคะแนนของการจองห้องพัก

         //เก็บคะแนนของรายละเอียดของห้องพัก
         $sql51 = "SELECT score_detailreserve FROM scoreDetailreserve WHERE user_usr = '$userr' AND code = '$room' ";
         $result51 = mysqli_query($connection,$sql51);
         $row51 = mysqli_fetch_assoc($result51);
         
 
         if($row51){
         $sql5 = "SELECT score_detailreserve FROM scoreDetailreserve WHERE user_usr = '$userr' AND code = '$room' ";
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
         // echo  $score;
         // var_dump($score);
         }
         }
         //สิ้นสุดการเก็บคะแนนของรายละเอียดของห้องพัก

         //เก็บคะแนนของเช็คอิน
        $sql61 = "SELECT score_checkin FROM scoreCheckin WHERE user_usr = '$userr' AND code = '$room' ";
        $result61 = mysqli_query($connection,$sql61);
        $row61 = mysqli_fetch_assoc($result61);
        

        if($row61){
        $sql6 = "SELECT score_checkin FROM scoreCheckin WHERE user_usr = '$userr' AND code = '$room' ";
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
        $sql71 = "SELECT score_problem FROM scoreProblem WHERE user_usr = '$userr' AND code = '$room' ";
        $result71 = mysqli_query($connection,$sql71);
        $row71 = mysqli_fetch_assoc($result71);
        

        if($row71){
        $sql7 = "SELECT score_problem FROM scoreProblem WHERE user_usr = '$userr' AND code = '$room' ";
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
         $sql81 = "SELECT score_data FROM scoreData WHERE user_usr = '$userr' AND code = '$room' ";
         $result81 = mysqli_query($connection,$sql81);
         $row81 = mysqli_fetch_assoc($result81);
         
 
         if($row81){
         $sql8 = "SELECT score_data FROM scoreData WHERE user_usr = '$userr' AND code = '$room' ";
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
          $sql91 = "SELECT score_location FROM scoreLocation WHERE user_usr = '$userr' AND code = '$room' ";
          $result91 = mysqli_query($connection,$sql91);
          $row91 = mysqli_fetch_assoc($result91);
          
  
          if($row91){
          $sql9 = "SELECT score_location FROM scoreLocation WHERE user_usr = '$userr' AND code = '$room' ";
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
          $sql101 = "SELECT score_out FROM scoreOut WHERE user_usr = '$userr' AND code = '$room' ";
          $result101 = mysqli_query($connection,$sql101);
          $row101 = mysqli_fetch_assoc($result101);
          
  
          if($row101){
          $sql10 = "SELECT score_out FROM scoreOut WHERE user_usr = '$userr' AND code = '$room' ";
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



        ?>
         <p style="color: red; font-weight:bold;">เกณฑ์การวัดระดับ</p>
    <table class="table">
    <thead class="thead" style="color: #660223;">
        <tr>
        <th scope="col">สถานการณ์</th>
        <th scope="col">เกณฑ์</th>
        <th scope="col">คะแนนที่ได้(มากที่สุด)</th>
        <th scope="col">จำนวนครั้งที่ทำแบบทดสอบ</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        <th scope="row" style="color: #660223;">ประโยคที่ใช้ในชีวิตประจำวัน</th>
        <?php if(!$row31){
          ?>
          <td>-</td>
      <td>-</td>
      <td>-</td>
          <?php
      }else{
          if( $score >=0 AND $score <= 6 ){
               ?>
          <td>พอใช้</td>
      <td><?php echo $score."/10";?></td>
      <td><?php echo $row311." ครั้ง";?></td>
        <?php
          }elseif($score >6 AND $score < 8){
            ?>
            <td>ดี</td>
        <td><?php echo $score."/10";?></td>
        <td><?php echo $row311." ครั้ง";?></td>
          <?php
          }elseif($score >=8  ){
            ?>
            <td>ดีมาก</td>
        <td><?php echo $score."/10";?></td>
        <td><?php echo $row311." ครั้ง";?></td>
          <?php

          }
      }
      ?>  
    </tr>
        <tr>
        <th scope="row" style="color: #660223;">การจองห้องพัก</th>
        <?php if(!$row41){
          ?>
          <td>-</td>
      <td>-</td>
      <td>-</td>
          <?php
      }else{
        if( $scor >=0 AND $scor <= 9 ){
            ?>
       <td>พอใช้</td>
   <td><?php echo $scor."/15";?></td>
   <td><?php echo $row411." ครั้ง";?></td>
     <?php
       }elseif($scor >9 AND $scor < 12){
         ?>
         <td>ดี</td>
     <td><?php echo $scor."/15";?></td>
     <td><?php echo $row411." ครั้ง";?></td>
       <?php
       }elseif($scor >=12  ){
         ?>
         <td>ดีมาก</td>
     <td><?php echo $scor."/15";?></td>
     <td><?php echo $row411." ครั้ง";?></td>
       <?php

       }
      }
      ?>  
    </tr>
        <tr>
        <th scope="row" style="color: #660223;">รายละเอียดของห้องพัก</th>
        <?php if(!$row51){
          ?>
          <td>-</td>
      <td>-</td>
      <td>-</td>
          <?php
      }else{
        if( $sco >=0 AND $sco <= 7 ){
            ?>
       <td>พอใช้</td>
   <td><?php echo $sco."/15";?></td>
   <td><?php echo $row511." ครั้ง";?></td>
     <?php
       }elseif($sco >7 AND $sco < 10){
         ?>
         <td>ดี</td>
     <td><?php echo $sco."/15";?></td>
     <td><?php echo $row511." ครั้ง";?></td>
       <?php
       }elseif($sco >=10  ){
         ?>
         <td>ดีมาก</td>
     <td><?php echo $sco."/15";?></td>
     <td><?php echo $row511." ครั้ง";?></td>
       <?php
       }
      }
      ?>  
    </tr>

        <tr>
        <th scope="row" style="color: #660223;">เช็คอิน</th>
        <?php if(!$row61){
          ?>
          <td>-</td>
      <td>-</td>
      <td>-</td>
          <?php
      }else{
        if( $sc >=0 AND $sc <= 9 ){
            ?>
       <td>พอใช้</td>
   <td><?php echo $sc."/12";?></td>
   <td><?php echo $row611." ครั้ง";?></td>
     <?php
       }elseif($sc >9 AND $sc < 12){
         ?>
         <td>ดี</td>
     <td><?php echo $sc."/12";?></td>
     <td><?php echo $row611." ครั้ง";?></td>
       <?php
       }elseif($sc >=12){
         ?>
         <td>ดีมาก</td>
     <td><?php echo $sc."/12";?></td>
     <td><?php echo $row611." ครั้ง";?></td>
       <?php
       }
      }
      ?>  
    </tr>

    <tr>
        <th scope="row" style="color: #660223;">ปัญหาระหว่างการเข้าพัก</th>
        <?php if(!$row71){
          ?>
          <td>-</td>
      <td>-</td>
      <td>-</td>
          <?php
      }else{
        if( $s >=0 AND $s <= 7 ){
            ?>
       <td>พอใช้</td>
   <td><?php echo $s."/12";?></td>
   <td><?php echo $row711." ครั้ง";?></td>
     <?php
       }elseif($s >7 AND $s < 10){
         ?>
         <td>ดี</td>
     <td><?php echo $s."/12";?></td>
     <td><?php echo $row711." ครั้ง";?></td>
       <?php
       }elseif($s >=10  ){
         ?>
         <td>ดีมาก</td>
     <td><?php echo $s."/12";?></td>
     <td><?php echo $row711." ครั้ง";?></td>
       <?php
       }
      }
      ?>  
    </tr>

    <tr>
        <th scope="row" style="color: #660223;">การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม</th>
        <?php if(!$row81){
          ?>
          <td>-</td>
      <td>-</td>
      <td>-</td>
          <?php
      }else{
        if( $ss >=0 AND $ss <= 7 ){
            ?>
       <td>พอใช้</td>
   <td><?php echo $ss."/12";?></td>
   <td><?php echo $row811." ครั้ง";?></td>
     <?php
       }elseif($ss >7 AND $ss < 10){
         ?>
         <td>ดี</td>
     <td><?php echo $ss."/12";?></td>
     <td><?php echo $row811." ครั้ง";?></td>
       <?php
       }elseif($ss >=10  ){
         ?>
         <td>ดีมาก</td>
     <td><?php echo $ss."/12";?></td>
     <td><?php echo $row811." ครั้ง";?></td>
       <?php
       }
      }
      ?>  
    </tr>

    <tr>
        <th scope="row" style="color: #660223;">การสอบถามตำแหน่งสถานที่ และบริการเรียกรถแท็กซี่</th>
        <?php if(!$row91){
          ?>
          <td>-</td>
      <td>-</td>
      <td>-</td>
          <?php
      }else{
        if( $sss >=0 AND $sss <= 7 ){
            ?>
       <td>พอใช้</td>
   <td><?php echo $sss."/12";?></td>
   <td><?php echo $row911." ครั้ง";?></td>
     <?php
       }elseif($sss >7 AND $sss < 10){
         ?>
         <td>ดี</td>
     <td><?php echo $sss."/12";?></td>
     <td><?php echo $row911." ครั้ง";?></td>
       <?php
       }elseif($sss >=10  ){
         ?>
         <td>ดีมาก</td>
     <td><?php echo $sss."/12";?></td>
     <td><?php echo $row911." ครั้ง";?></td>
       <?php
       }
      }
      ?>  
    </tr>


    <tr>
        <th scope="row" style="color: #660223;">การแจ้งออกจากโรงแรม (เช็คเอาท์)</th>
        <?php if(!$row101){
          ?>
          <td>-</td>
      <td>-</td>
      <td>-</td>
          <?php
      }else{
        if( $ssss >=0 AND $ssss <= 6 ){
            ?>
       <td>พอใช้</td>
   <td><?php echo $ssss."/10";?></td>
   <td><?php echo $row1011." ครั้ง";?></td>
     <?php
       }elseif($ssss >6 AND $ssss < 8){
         ?>
         <td>ดี</td>
     <td><?php echo $ssss."/10";?></td>
     <td><?php echo $row1011." ครั้ง";?></td>
       <?php
       }elseif($ssss >=8  ){
         ?>
         <td>ดีมาก</td>
     <td><?php echo $ssss."/10";?></td>
     <td><?php echo $row1011." ครั้ง";?></td>
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


<!-- close container -->
</div>
    <div class="text-center" style="color: red;"><h6><a href="../home/index.php" class="text-reset"> << กลับไปหน้าหลัก </a> </h6></div>
    
    
</div>



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