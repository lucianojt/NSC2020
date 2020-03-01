<?php
ob_start(); 
if(isset($_COOKIE["user"])){
session_start();
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
$room = $_SESSION["pincode"];
$name = 'Room_'.$room;
$userr = $_SESSION["username_user"];
?>
<!doctype html>
<html lang="en">
  <head>
    <title>คะแนนการทดสอบ</title>
    <?php include("headU.php"); ?>
   <div class="main">
    <p>คะแนนการทดสอบ</p>
    </div>
    <div class="container">
    <div class="link">
        <h5><a href="../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="conclude.php" class="text-reset">ผลสรุป</a> > คะแนนการทดสอบ</h5>
   </div><br>
   <div class="aa">
        <p>ทดสอบก่อนเรียน</p>
   </div> 
   <?php 
   $sql = "SELECT * FROM $name WHERE user_usr = '$userr'";
   $result = mysqli_query($connection,$sql); 

       $sql2 = "SELECT * FROM $name WHERE user_usr = '$userr'";
        $result2 = mysqli_query($connection,$sql2); 
        $row2 = mysqli_fetch_assoc($result2);
        if( $row2['pretest'] >=0 ){
           while($row = mysqli_fetch_assoc($result)) {
         $user[] = $row['user_usr'];
         $pretest[] = $row['pretest'];
         }
         ?> 
          <canvas id="myChart"></canvas>
          <?php 
          //  echo $row2['time_pretest'];
          $time = $row2['time_pretest'];
              if($time > 60){
                $min = (int)($time/60) ;
                $sec = $time - ($min * 60);
              //    echo $min."<br>";
              //    echo $sec;
              ?> 
                <div class="row">
              <div class="col">
              <p> ผลคะแนนของ "<?php echo $row2['user_usr']; ?>" คือ <?php echo $row2['pretest']; ?> เต็ม 20 คะแนน </p>
              </div>
              <div class="col">
              <p class="time">ใช้เวลา: <?php echo $min;?> นาที <?php echo $sec;?> วินาที</p>
              </div>
            </div>
              <?php
              }else{
                  ?> 
                <div class="row">
                  <div class="col">
                    <p> ผลคะแนนของ "<?php echo $row2['user_usr']; ?>" คือ <?php echo $row2['pretest']; ?> เต็ม 20 คะแนน </p>
                  </div>
                  <div class="col">
                  <p class="time">ใช้เวลา: <?php echo $row2['time_pretest'];?> วินาที</p>
                  </div>
                </div>
                  <?php
              }
          
          
          ?>
         <?php
      }else{
      echo 'เกิดข้อผิดผลาด กรุณาทำแบบทดสอบก่อนเรียน';
      }
      
   ?> 
   <div class="aa">
        <p>เปรียบเทียบคะแนนก่อนเรียน และหลังเรียน</p>
   </div> 
   <?php
   $sql4 = "SELECT * FROM $name WHERE user_usr = '$userr'";
   $result4 = mysqli_query($connection,$sql4); 

       $sql5 = "SELECT * FROM $name WHERE user_usr = '$userr'";
        $result5 = mysqli_query($connection,$sql5); 
        $row5 = mysqli_fetch_assoc($result5);
        if( $row5['posttest'] >=0 ){
           while($row4 = mysqli_fetch_assoc($result4)) {
         $usera[] = $row4['user_usr'];
         $posttesta[] = $row4['posttest'];
         $pretesta[] = $row4['pretest'];
         }
         ?> 
          <canvas id="before"></canvas>
          <?php 
          //  echo $row2['time_posttest'];
          $time = $row5['time_posttest'];
              if($time > 60){
                $min = (int)($time/60) ;
                $sec = $time - ($min * 60);
              //    echo $min."<br>";
              //    echo $sec;
              ?> 
                <div class="row">
              <div class="col">
              <p> ผลคะแนนของ "<?php echo $row5['user_usr']; ?>" คือ <?php echo $row5['posttest']; ?> เต็ม 20 คะแนน </p>
              </div>
              <div class="col">
              <p class="time">ใช้เวลา: <?php echo $min;?> นาที <?php echo $sec;?> วินาที</p>
              </div>
            </div>
              <?php
              }else{
                  ?> 
                <div class="row">
                  <div class="col">
                    <p> ผลคะแนนของ "<?php echo $row5['user_usr']; ?>" คือ <?php echo $row2['posttest']; ?> เต็ม 20 คะแนน </p>
                  </div>
                  <div class="col">
                  <p class="time">ใช้เวลา: <?php echo $row5['time_posttest'];?> วินาที</p>
                  </div>
                </div>
                  <?php
              }
          
          
          ?>
         <?php
      } else{
      echo 'คุณยังไม่ได้ทำแบบทดสอบ';
      }

      ?>
    <!-- close container -->
    </div>
    <br>
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
<script>
var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?=json_encode($user)?>,
        datasets: [{
            label: 'ผลคะแนนทดสอบก่อนเรียน',
            data: <?=json_encode($pretest)?>,
            backgroundColor: [
                '#5ba8a0'
            ],
            borderColor: [
                '#5ba8a0'
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true,
            suggestedMax: 20,
           
					} ,gridLines: {
                offsetGridLines: true
            }
				}]
			},
			 responsive: true,
			 title: {
				display: true,
			
			}
    }
});
</script>
<script>
var ctx = document.getElementById('before').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: <?=json_encode($usera)?>,
        datasets: [{
            label: 'ผลคะแนนทดสอบก่อนเรียน',
            data: <?=json_encode($pretesta)?>,
            backgroundColor: [
                '#5ba8a0'
            ],
            borderColor: [
                '#5ba8a0'
            ],
            borderWidth: 1
        },
        {
            label: 'ผลคะแนนทดสอบหลังเรียน',
            data: <?=json_encode($posttesta)?>,
            backgroundColor: [
                '#5d6e1e'
            ],
            borderColor: [
                '#5d6e1e'
            ],
            borderWidth: 1
        }
        
        ]
    },
    options: {
        scales: {
				yAxes: [{
					ticks: {
						beginAtZero:true,
            suggestedMax: 20,
           
					} ,gridLines: {
                offsetGridLines: true
            }
				}]
			},
			 responsive: true,
			 title: {
				display: true,
			
			}
    }
});
</script>

<style>
.main {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.pic {
  background-color: #AE0F0F;
  height: 180px;
  color: white;
  border-radius: 15px;
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
.aa{
  font-size: 27px;
  font-weight: bold;
}
.time{
  text-align: right;
}
.zx {
  font-size: 27px;
}
.backLink {
  margin: 20px 0;
  text-align: center;
}
.text-reset {
  font-size: 18px;
}
</style>