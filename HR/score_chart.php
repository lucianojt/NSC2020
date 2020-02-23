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
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" href="../style.css">
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
        <li class="nav-item active">
    <a class="nav-link" href="acce_info.php">เวลาเข้าใช้งาน <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="history.php">ประวัติพนักงาน</a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="score_chart.php">คะแนนการทดสอบ</a>
    </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <a  class="nav-link" href="../logout_hr.php">ออกจากระบบ </a>
        </form>
    </div>
    </nav>
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
    .text{
    text-align: center;
    background-image: url('../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px; 
   }
    .pre{
    font-size: 27px;
    font-weight: bold;
    }
    /* .horizonMix{
        font-size: 27px;
    } */
    </style>
     <div class="text"><h3>คะแนนการทดสอบ</h3></div><br>
     <div class="container">
      <div class="link">
        <h6><a href="MGRoom_hr.php" class="text-reset">หน้าหลัก</a> > คะแนนการทดสอบ</a></h6>
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
            backgroundColor: '#FFB384',
            hoverBackgroundColor : '#493829',
           
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
            backgroundColor: '#FFB384',
            hoverBackgroundColor : '#493829',
           
            data: <?=json_encode($bbb)?>
        },
        {
            
            label: 'คะแนนหลังเรียน',
            backgroundColor: '#668D3C',
            hoverBackgroundColor : '#668D3C',
           
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