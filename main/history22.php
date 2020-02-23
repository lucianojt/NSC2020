
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
    <title>ประวัติการเรียนรู้</title>
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
        overflow: hidden;
        position: fixed;
        top: 0;
        width: 100%;
        
    }
    .table{
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
        margin-top: 56px;
    text-align: center;
    background-image: url('../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px; 
    overflow: hidden;
        position: fixed;
        top: 0;
        width: 100%;
   
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
    <h3>ประวัติการเรียนรู้</h3>
    </div><br><br><br><br><br><br><br>
    <div class="container">
    <div class="link">
        <h6><a href="../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="conclude.php" class="text-reset">ผลสรุป</a> > ประวัติการเรียนรู้</h6>
   </div><br>
   <?php  
   

   if(isset($_SESSION["username_user"])){
   
   
    $room = $_SESSION["pincode"];
    $userr = $_SESSION["username_user"];

   
   $sql2 = "SELECT sumti FROM ReTim WHERE code = '$room' AND user_usr = '$userr'";
   $result2 = mysqli_query($connection,$sql2);
   if($result2 == TRUE){
    while($row2 = mysqli_fetch_assoc($result2)){
          $time[] =  intval($row2['sumti']);
    }
    //var_dump($time);
    $sumTime = array_sum($time);

    //$sumTime = 40;
    if($sumTime >= 86400){
        $dayt = (int)($sumTime / 86400);
        $hou = $sumTime - ($dayt*86400);
        $hour = (int)($hou / 3600);
        $Fhour = $hou - ( $hour*3600);
        $Fmin = (int)($Fhour/60);
        $sec = $Fhour - ($Fmin * 60);
        $sumt = $dayt." วัน ".$hour." ชั่วโมง ".$Fmin." นาที ".$sec." วินาที";
        //echo $sumt;
    }
    elseif($sumTime >= 3600){
        $hour = (int)($sumTime / 3600);
        $Fmin = $sumTime - ($hour * 3600);
        $min = (int)($Fmin/60) ;
        $sec = $Fmin - ($min * 60);
        $sumt = $hour." ชั่วโมง ".$min." นาที ".$sec." วินาที";
        //echo $sumt;
    }elseif($sumTime >= 60){
        $min = (int)($sumTime/60) ;
        $sec = $sumTime - ($min * 60);
        $sumt = $min." นาที ".$sec." วินาที";
        //echo $sumt;
    }else{
    $sumt = $sumTime." วินาที";
    //echo $sumt;
    }



   }else{
       echo 'sql ผิด';
   }

   ?>
   <div class="colT">
    <h5 class="textt">เวลาที่ใช้ทั้งหมด: <?php echo $sumt;?></h5>
   </div><br>
   
   <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">ครั้งที่</th>
      <th scope="col">ชื่อผู้ใช้</th>
      <th scope="col">วันที่เข้าใช้</th>
      <th scope="col">เวลาที่เข้าใช้</th>
      <th scope="col">วันที่ออกจากระบบ</th>
      <th scope="col">เวลาที่ออกจากระบบ</th>
      <th scope="col">ทั้งหมด</th>
    </tr>
  </thead>
  <tbody>

<?php 

$num = 1;
$sql = "SELECT * FROM ReTim WHERE code = '$room' AND user_usr = '$userr' ORDER BY id DESC";
$result = mysqli_query($connection,$sql);
if(!$result){
    echo 'code ผิด';
}else{
    while($row = mysqli_fetch_assoc($result)) {
        ?> 
         <tr>
            <th scope="row"><?php echo $num;?></th>
            <td><?php echo $row['user_usr']; ?></td>
            <td><?php echo $row['dayIn']; ?></td>
            <td><?php echo $row['timeIn']; ?></td>
            <td><?php echo $row['dayOut']; ?></td>
            <td><?php echo $row['TmeOut']; ?></td>
            <td><?php echo $row['sumt']; ?></td>
         </tr>
         <?php
         $num++;
    }
    
}
//have username
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
