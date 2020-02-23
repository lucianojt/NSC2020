
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
         <tr>
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
         <tr>
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
