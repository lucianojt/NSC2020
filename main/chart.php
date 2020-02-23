<?php session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script type="text/javascript" src="jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.js"></script>
  </head>
  <body>
<style>
body{
  background: linear-gradient(110deg, #fdcd3b 40%, #ffed4b 40%);
}
.navbar{
    background-color: #660223;
    
}
.navbar-brand {
    color: white;
}
.navbar-nav .nav-link {
    color: white;
}
.navbar-toggler{
    border-color: rgb(255,102,203);
}
.navbar-toggler-icon{
    background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,102,203, 0.7)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
}
.col{        
    font-size: 25px;
    border-radius: 15px;
    border: 4px solid rgb(210, 210, 210);
    background-color: #FFFFFF;
    text-align: center;
    color: white;
    border-color: #660223;
}
.row{
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  grid-row-gap: 1rem;
  grid-column-gap: 1rem;
}

</style>
  <nav class="navbar">
            <a class="navbar-brand disabled">
                <img src="../images/logo.png" alt="logo" style="width:40px;">
            </a>
            <a class="navbar-brand" href="../home/index.php">Chiny</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav text-right">
                    <li class="nav-item">
                    <a class="nav-link" href="index.php">หน้าหลัก</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">การตั้งค่า</a>
                        <div class="dropdown-menu text-right">
                            <a class="dropdown-item" href="serviceList.php">แก้ไข้โปรไฟล์</a>
                        </div>
                    </li>   
                    <li class="nav-item">
                    <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
                    </li>
                </ul>
            </div> 
        </nav>
<br><br>
<?php 
include("../database/database.php");
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
 
// echo  $_SESSION["username_user"];
// echo  $_SESSION["pincode"];



$room = 'Room_'.$_SESSION["pincode"]; 

//echo $room;

$sql = "SELECT * FROM $room WHERE posttest >=0";
$result = mysqli_query($connection,$sql);  
if(!$sql){
  echo 'ไม่มีข้อมูล';
 }else{
   if (mysqli_num_rows($result) > 0) {
     while($row = mysqli_fetch_assoc($result)) {
         $posttest[] = $row['posttest'];
     }
   }
 }


$sql3 = "SELECT * FROM $room WHERE pretest >=0";
$result3 = mysqli_query($connection,$sql3);  

if(!$sql3){
 echo 'ไม่มีข้อมูล';
}else{
  if (mysqli_num_rows($result3) > 0) {

    while($row = mysqli_fetch_assoc($result3)) {
        $user[] = $row['user_usr'];
        $pretest[] = $row['pretest'];
    }
  }
}
 
?>


<div class="container text-center" cellpadding="20">
  <div class="row">
    <div class="col">
    <canvas id="horizonMix" width="400" height="400"></canvas>
    </div>
    
    <div class="col">
    <canvas id="pola" width="400" height="400"></canvas>
    </div>
  </div>
  <br>
  <div class="row">
  <div class="col">
  <canvas id="pie" width="400" height="400"></canvas>
  </div>
  <div class="col">
  <canvas id="line" width="400" height="400"></canvas>
  </div>
  </div> <br><br>
<a class="btn btn-danger" href="logout.php" role="button">logout</a> 
</div>
<br>


<!-- <div style="width: 400px;">
<canvas id="bar" width="400" height="400"></canvas>
</div> -->
<script>
var ctx = document.getElementById('horizonMix').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'horizontalBar',

    // The data for our dataset
    data: {
        labels: <?=json_encode($user)?>,
        datasets: [{
            
            label: 'คะแนน pretest',
            backgroundColor: '#493829',
            hoverBackgroundColor : '#EEC5A9',
           
            data: <?=json_encode($pretest)?>
        },
        {
            
            label: 'คะแนน posttest',
            backgroundColor: '#668D3C',
            hoverBackgroundColor : '#B99C6B',
           
            data: <?=json_encode($posttest)?>
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
				text: 'แสดงคะแนน pretest,posttest ภายในห้อง <?=json_encode($room)?>'
			}
    }
});
</script>

<script>
var ctx = document.getElementById('pola').getContext('2d');
var chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'polarArea',

    // The data for our dataset
    data: {
        labels:  <?=json_encode($user)?>,
        datasets: [{
            
            backgroundColor: ['#493829', '#4E6172', '#B99C6B','#8F3B1B','#DBCA69','#668D3C','#EEC5A9'],
            data: <?=json_encode($pretest)?>
        }]
    },
    options: {
        animation:{
            animateRotate: true,
            animateScale: true
        },
        title: {
				display: true,
				text: 'แสดงคะแนน pretest ภายในห้อง <?=json_encode($room)?>'
			}
    }
  
});

</script>
<script>
var ctx = document.getElementById('pie').getContext('2d');
var chart = new Chart(ctx, {
  type: 'pie',
    data: {
      datasets: [{
        data: <?=json_encode($pretest)?>,
        backgroundColor: ['#493829', '#4E6172', '#B99C6B','#8F3B1B','#DBCA69','#668D3C','#EEC5A9'],
    }],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    
    labels:  <?=json_encode($user)?>
    },
    options: {
      title: {
        display: true,
        text: 'แสดงคะแนน pretest ภายในห้อง <?=json_encode($room)?>'
      }
    }
});
</script>
<script>
var ctx = document.getElementById('line').getContext('2d');
var chart = new Chart(ctx, {
  type: 'line',
  data: {
    labels:  <?=json_encode($user)?>,
        datasets: [{ 
           label: 'คะแนน pretest',
            borderColor: '#3e95cd', 
            fill: false,
            pointBackgroundColor : '#B99C6B',
            pointRadius : 6,
            data: <?=json_encode($pretest)?>
           
        },
        {
          label: 'คะแนน posttest',
            borderColor: '#B99C6B', 
            fill: false,
            pointBackgroundColor : '#EEC5A9',
            pointRadius : 6,
            data: <?=json_encode($posttest)?>
        }
        ]
  },
    options: {
      scales: {
          yAxes: [{
					ticks: {
						beginAtZero:true,
            suggestedMax: 20
           
					}
				}]
			}
    }
});

</script>

<?php include('../footer.php'); ?>