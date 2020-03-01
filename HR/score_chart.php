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
    <title>คะแนนการทดสอบ</title>
    <?php include("head.php"); ?>

     <div class="text"><p>คะแนนการทดสอบ</p></div>
     <div class="container">
      <div class="link">
        <h5><a href="MGRoom_hr.php" class="text-reset">หน้าหลัก</a> > คะแนนการทดสอบ</a></h5>
   </div>
      </div><br>
      <div class="container">
      <div class="pre">คะแนนการทดสอบก่อนเรียน</div>
      <?php 
    //   $sql = "SELECT";
    $room = 'Room_'.$_SESSION["pincode"]; 
    // echo $room;
    $sql = "SELECT * FROM $room WHERE pretest >=0";
    $result = mysqli_query($connection,$sql);  
    
    if(!$result){
     echo 'ไม่มีข้อมูล';
    }else{
        while($row = mysqli_fetch_assoc($result)) {
            // echo $row['pretest']."<br>";
            $user[] = $row['user_usr'];
            $pretest[] = $row['pretest'];
        }
        ?> <canvas id="horizonMix"></canvas> <?php
    }
      ?>

<br>
    <div class="pre">เปรียบเทียบคะแนนทดสอบก่อนเรียน และหลังเรียน</div>
    <?php 
        //   $sql = "SELECT";
        $room = 'Room_'.$_SESSION["pincode"]; 
        // echo $room;
        $sql = "SELECT * FROM $room WHERE pretest >=0 AND posttest >= 0";
        $result = mysqli_query($connection,$sql);  
        
        if(!$result){
         echo 'ไม่มีข้อมูล';
        }else{
            while($row = mysqli_fetch_assoc($result)) {
                // echo 'ddddd';
                // echo $row['pretest']."<br>";
                $aaa[] = $row['user_usr'];
                $bbb[] = $row['pretest'];
                $ccc[] = $row['posttest'];
            }
            ?> <canvas id="poster"></canvas> <?php
        }
    ?>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
   <!-- ปิด cookie -->

   <?php

}else{
   header("location:../logout_hr.php");
}
ob_end_flush();
?>
  </body>
</html>
<script>
var ctx = document.getElementById('horizonMix').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'horizontalBar',

    // The data for our dataset
    data: {
        labels: <?=json_encode($user)?>,
        datasets: [{
            
            label: 'คะแนนก่อนเรียน',
            backgroundColor: '#5ba8a0',
            hoverBackgroundColor : '#416F6A',
           
            data: <?=json_encode($pretest)?>
        }]
    },

    // Configuration options go here
    options: {
        scales: {
				xAxes: [{
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
				text: 'แสดงผลคะแนนก่อนเรียน ภายในห้อง <?=json_encode($room)?>'
			}
    }
});
</script>
<script>
var ctx = document.getElementById('poster').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'horizontalBar',

    // The data for our dataset
    data: {
        labels: <?=json_encode($aaa)?>,
        datasets: [{
            label: 'คะแนนก่อนเรียน',
            backgroundColor: '#5ba8a0',
            hoverBackgroundColor : '#416F6A',
           
            data: <?=json_encode($bbb)?>
        },
        {
            label: 'คะแนนหลังเรียน',
            backgroundColor: '#5d6e1e',
            hoverBackgroundColor : '#434D20',
           
            data: <?=json_encode($ccc)?>
        }]
    },
    // Configuration options go here
    options: {
        scales: {
				xAxes: [{
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
				text: 'แสดงคะแนนก่อนเรียนและหลังเรียน ภายในห้อง <?=json_encode($room)?>'
			}
    }
});
</script>

<style>
.text {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.pre {
  font-size: 27px;
  font-weight: bold;
}
</style>