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
  <div class="main">
    <p>ระดับสถานการณ์</p>
  </div>
    <div class="container">
    <div class="link">
        <h5><a href="../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="conclude.php" class="text-reset">ผลสรุป</a> > ระดับสถานการณ์</h5>
   </div><br>
<!-- close container -->
   </div>
<div class="container">
<?php 
$room = $_SESSION["pincode"];
$name = 'Room_'.$room;
$userr = $_SESSION["username_user"];


//var_dump($_SESSION);
$sql = "SELECT * FROM $name WHERE user_usr = '$userr' ";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_assoc($result);

if(!$row){
    echo 'เกิดข้อผิดพลาดบางอย่าง';
}else{

    $sql2 = "SELECT * FROM scoreCheckin WHERE user_usr = '$userr'  AND code = '$room'";
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
          <th scope="row" style="color: #660223;">เช็คอิน</th>
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
    <div class="table-responsive">
      <table class="table">
        <thead class="thead" style="color: #660223;">
            <tr>
            <th style="width: 40%;" scope="col">สถานการณ์</th>
            <th class="cent" scope="col">เกณฑ์</th>
            <th class="cent" scope="col">คะแนนที่ได้(มากที่สุด)</th>
            <th class="cent" scope="col">จำนวนครั้งที่ทำแบบทดสอบ</th>
            <th class="cent" scope="col">กราฟ</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <th scope="row" style="color: #660223;">เช็คอิน</th>
            <?php if(!$row61){
              ?>
              <td class="cent">-</td>
          <td class="cent">-</td>
          <td class="cent">-</td>
          <td class="cent">-</td>
          <?php
          } else {
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
            }elseif($sc >=12){
            ?>
            <td class="cent">ดีมาก</td>
            <td class="cent"><?php echo $sc."/12";?></td>
            <td class="cent"><?php echo $row611." ครั้ง";?></td>
          <?php
          }
          ?>
            <td class="cent">
              <button type="button" class="btn btn-info" data-toggle="modal" data-target="#checkin">
              ดูกราฟ
            </button>
            </td>
          <?php
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
            ?>
              <td class="cent">
                <button type="button" class="btn btn-info" data-toggle="modal" data-target="#checkout">
                  ดูกราฟ
                </button>
              </td>
            <?php
            }
            ?>  
          </tr>
        </tbody>
      </table>
    </div>
        <?php
    }
}
?>
<!-- graph checkin -->
<div class="modal fade" id="checkin" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">เช็คอิน</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
      $sqlCheckin = "SELECT * FROM scoreCheckin WHERE user_usr = '$userr' AND code = '$room' ORDER BY `id` ASC ";
      $resultCheckin = mysqli_query($connection,$sqlCheckin);
      while($rowCheckin = mysqli_fetch_assoc($resultCheckin)){
        $g_scoreCheckin[] = $rowCheckin['score_checkin'];
      }
      $countTest = count($g_scoreCheckin);
      $x = 1;
      $countTestCheckin = [];
      while($x <= $countTest) {
        array_push($countTestCheckin, $x);
        $x++;
      }
      ?>
        <canvas id="chart-checkin"></canvas>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- graph checkout -->
<div class="modal fade" id="checkout" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">การแจ้งออกจากโรงแรม (เช็คเอาท์)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <?php
      $sqlCheckout = "SELECT * FROM scoreOut WHERE user_usr = '$userr' AND code = '$room' ORDER BY `id` ASC ";
      $resultCheckout = mysqli_query($connection,$sqlCheckout);
      while($rowCheckout = mysqli_fetch_assoc($resultCheckout)){
        $g_scoreCheckout[] = $rowCheckout['score_out'];
      }
      $countTestOut = count($g_scoreCheckout);
      $x = 1;
      $countTestCheckout = [];
      while($x <= $countTestOut) {
        array_push($countTestCheckout, $x);
        $x++;
      }
      ?>
        <canvas id="chart-checkout"></canvas>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" data-dismiss="modal">ตกลง</button>
      </div>
    </div>
  </div>
</div>
<!-- close container -->
</div>
  <div class="backLink"><h6><a href="../home/index.php" class="text-reset"> << กลับไปหน้าหลัก </a> </h6>
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

<script>
var ctx = document.getElementById('chart-checkin').getContext('2d');
  var chart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: <?=json_encode($countTestCheckin)?>,
          datasets: [{
              label: 'คะแนนแต่ละรอบ',
              backgroundColor: '#5ba8a0',
              borderColor: '#385284',
              data: <?=json_encode($g_scoreCheckin)?>
          }]
      },
      options: {
          scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true,
              suggestedMax: 12,
            }
          }]
        },
        responsive: true
      }
  });
var ctx = document.getElementById('chart-checkout').getContext('2d');
  var chart = new Chart(ctx, {
      type: 'line',
      data: {
          labels: <?=json_encode($countTestCheckout)?>,
          datasets: [{
              label: 'คะแนนแต่ละรอบ',
              backgroundColor: '#5ba8a0',
              borderColor: '#385284',
              data: <?=json_encode($g_scoreCheckout)?>
          }]
      },
      options: {
          scales: {
          yAxes: [{
            ticks: {
              beginAtZero:true,
              suggestedMax: 10,
            }
          }]
        },
        responsive: true
      }
  });
</script>

<style>
.cent{
  text-align: center;
}
.main {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.table{
  background-color: #e4cbd3 !important;
}
.backLink {
  margin: 20px 0;
  text-align: center;
}
.text-reset {
  font-size: 18px;
}
</style>