<?php 
session_start();
ob_start();
if(isset($_COOKIE["user"])){
include("../../../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

//var_dump($_SESSION);
date_default_timezone_set('Asia/Bangkok');
$ReserveCon_Din = date("d-m-Y");
$ReserveCon_Tin = date("H:i:s");

$_SESSION["ReserveCon_Din"] = $ReserveCon_Din;
$_SESSION["ReserveCon_Tin"] = $ReserveCon_Tin;

?>
<!doctype html>
<html lang="en">
  <head>
    <title>บทสนทนา: การจองห้องพัก</title>
    <?php include("../headU.php"); ?>
        <style>
   body {
        background-image: url('../../../images/wall.png');
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
   
    .detail{
        width: 100%;
        height: 400px;
        background-color: #AE0F0F;
        color: white;
        border-radius: 20px;
        padding: 10px;
        overflow: scroll;
    }
   
    .main{
    font-size: 27px;
    color: #AE0F0F;
    font-weight: bold;
   }
   .col-1{
    margin-top: 15px;
    float: inherit;
    text-align: center;
    font-size: 18px;
    font-weight: bold;
   }
   .col-11{
    margin-top: 15px;
    
   }
   
   .text{
    text-align: center;
    background-image: url('../../../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px; 
   }
   .chi{
    color: #FFFF00;
   font-size: 18px;
   }
   .ges{
    font-size: 20px;
    color: #1A2A73;
    font-weight: bold;
   }
  
    </style>
   
   <!-- start -->
   
   <div class="text"><h3>บทสนทนา: การจองห้องพัก</h3></div><br>

   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="reserva.php" class="text-reset">การจองห้องพัก</a> > บทสนทนา</h6>
   </div>
   </div><br>
    <div class="container">
    <div class="ges">G = Guest แขก<p>R = Receptionist พนักงานต้อนรับ</p></div>


    <?php
 $sql = "SELECT* FROM con_Topic WHERE topic = 'reserve' ";
 $result = mysqli_query($connection,$sql);
 if(!$result){
   echo 'ไม่สามารถติดต่อ database ได้';
 }else{
    while($row = mysqli_fetch_assoc($result)){
    ?> 
    <div class="main">
    <p><?php echo $row['con_nam'];?></p>
    </div>
   
    <div class="card">
    <div class="detail"> 
     <?php
    $sql2 = "SELECT* FROM con_simDa WHERE con_id = ".$row['con_id']." AND name = 'reserve' ";
    $result2 = mysqli_query($connection,$sql2);
    ?> 
    <div class="row">
    <?php
     while($row2 = mysqli_fetch_assoc($result2)){ 
     ?>
      <div class="col-1"><?php echo $row2['con_spe']." :"; ?></div>
      <div class="col-11">
            <div class="chi"><?php echo $row2['con_th']; ?></div>
            <?php echo $row2['con_ch']; ?>
            <p><?php echo $row2['con_en']; ?></p>
            
      </div>
     
     <?php
     }
     ?> 


    </div>
    </div>
 
  <div class="card-header">
  <audio controls>
           <source src="../../../sound/conver/reserve/<?php echo $row['con_sound'];?>" type="audio/mpeg">
    </audio>
  </div>
</div><br>
     <?php
  }
 }
?>    
  
    
    </div>
    <div class="container">
    </div><br>
    <div class="text-center" style="color: red;"><h6><a href="reserva.php" class="text-reset"> << ย้อนกลับไปหน้าที่แล้ว </a> </h6></div>
   
    <!-- ปิด cookie -->

  <?php

}else{
   header("location:../../../logout.php");
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