<?php 
ob_end_flush();
if(isset($_COOKIE["hr"])){
session_start(); 
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ประวัติพนักงาน</title>
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
        text-align: center;
        background-color: #F7DAD2;
    }
   .table{
        background-color: #F3C4B7;
    }
   .colT{
        background-color: rgba(54, 162, 235, 0.2);
        height: 50px;
        width: 40%;
        padding: 15px; 
        border-radius: 10px 30px;
    }
   .col-md-5{
    background-color: #92a8d1;
   }
  .col-md-7{
    background-color: coral;
     height: 100px;
  }
  .table-responsive{
      height: 300px;
      overflow: scroll;
    }
    </style>
    <?php 
$room = $_SESSION["code"] ;
$name = $_GET['name'];
?>
     
      <div class="text"><h3>พนักงาน: <?php echo $name;?></h3></div><br>
      <div class="container">
      <div class="link">
        <h6><a href="MGRoom_hr.php" class="text-reset">จัดการห้อง</a> > <a href="history.php" class="text-reset">ประวัติพนักงาน</a> > ข้อมูลส่วนตัว</h6>
      </div>

<!-- close container -->
      </div><br>
  

<?php 
//echo $name."  ".$room;
$aaaa = "Room_".$room;
$sql = "SELECT * FROM $aaaa WHERE name_usr = '$name' ";
$result = mysqli_query($connection,$sql);
if(!$result){
  echo 'connect ไม่ได้';
}else{
  $row = mysqli_fetch_assoc($result);
  // echo 'connect ได้';
?>
<div class="container" >
<div class="jumbotron" style="background-color:#ECDEE3">
  <!-- <p>Bootstrap is the most popular HTML, CSS...</p>  -->
  <div class="row">
    <div class="col">
    <img src="../images/userpic/<?php echo $row['pic_usr'];?>" class=" mx-auto d-block" width="280" height="190" style=" border-radius: 13%;">
    </div>
    <div class="col">
      <h4>ผลคะแนนก่อนเรียน</h4>
      <?php 
      if($row['pretest'] == -1){
        ?>
        <p style="color: red;">ยังไม่มีข้อมูล</p>
        <?php

      }else{
      ?>

   <p style="color: red;"><?php echo $row['pretest'];?>/20</p>
      <?php  
      $sql3 = "SELECT time_pretest FROM $aaaa WHERE name_usr = '$name' ";
      $result3 = mysqli_query($connection,$sql3);
      $row3 = mysqli_fetch_assoc($result3);
      if( $row3['time_pretest']< 60) {
    ?>
     <p>เวลาที่ใช้: <?php echo $row3['time_pretest'];?> วินาที</p>
    <?php
      }else{
        $time = $row3['time_pretest'];
        $min = (int)($time/60) ;
        $sec = $time - ($min * 60);
        ?>
        <p>เวลาที่ใช้: <?php echo $min;?> นาที <?php echo $sec;?> วินาที</p>
       <?php
      }
      ?>
     

      <?php
      }
      ?>


   
      <br>
      <h4>ผลคะแนนหลังเรียน</h4>
      <?php 
      $sql2 = "SELECT posttest FROM $aaaa WHERE name_usr = '$name'";
      $result2 = mysqli_query($connection,$sql2);
      $row2 = mysqli_fetch_assoc($result2);
      if( $row2['posttest'] >= 0 ){
        ?>
         <p style="color: red;"><?php echo $row2['posttest'];?>/20</p>
        <?php

        $sql4 = "SELECT time_posttest FROM $aaaa WHERE name_usr = '$name' ";
        $result4 = mysqli_query($connection,$sql4);
        $row4 = mysqli_fetch_assoc($result4);
        if( $row4['time_posttest']< 60) {
        ?>
        <p>เวลาที่ใช้: <?php echo $row4['time_posttest'];?> วินาที</p>
        <?php
        }else{
          $time = $row4['time_posttest'];
          $min = (int)($time/60) ;
          $sec = $time - ($min * 60);
          ?>
          <p>เวลาที่ใช้: <?php echo $min;?> นาที <?php echo $sec;?> วินาที</p>
        <?php
        }
      }else{
        ?><p style="color: red;">ยังไม่มีข้อมูล</p><?php
      }
      ?>
     
    </div>
  </div>
</div>

 <div class="container" style="background-color: #660223;">
  <div class="jumbotron jumbotron-fluid" style="background-color:#ECDEE3">
  <div class="container">
    <h1 class="display-4"><?php echo $row['name_usr']." ".$row['lname_usr'];?></h1><br>
    <p class="lead">ชื่อผู้ใช้: <?php echo $row['user_usr']; ?></p>
    <p class="lead">อีเมล: <?php echo $row['email_usr']; ?></p>
  </div>
</div>
  </div>


  <div class="jumbotron jumbotron-fluid" style="background-color:#ECDEE3">
  <div class="container">
  <?php  
 $_SESSION["username_user"] = $row['user_usr'];
 $namee = $_SESSION["username_user"];


  $_SESSION['lastnam'] = $row['lname_usr']; 
  $last = $_SESSION['lastnam'];
  ?>
    <h4>การเข้าใช้งาน : <?php echo $name." ".$last;?></h4><br>

<?php 
//var_dump($_SESSION);


$number = $_SESSION["code"];


//echo $number.$name;
?>
 <div class="table-responsive">
   <table class="table">
  <thead class="thead-dark">
    <tr>
    <th scope="col">ลำดับที่</th>
      <th scope="col">ชื่อผู้ใช้</th>
      <th scope="col">วันที่เข้าใช้</th>
      <th scope="col">เวลาที่เข้าใช้</th>
    </tr>
  </thead>
  <tbody>

  <?php  
$num = 1;
$sql5 = "SELECT dayIn , timeIn , user_usr FROM ReTim WHERE code = '$number' AND user_usr = '$namee' ORDER BY id DESC";
$result5 = mysqli_query($connection,$sql5);
while($row5 = mysqli_fetch_assoc($result5)){
?>
    <tr>
      <th scope="row"><?php echo $num;?></th>
      <td><?php echo $row5['user_usr']; ?></td>
      <td><?php echo $row5['dayIn']; ?></td>
      <td><?php echo $row5['timeIn']; ?></td>
    </tr>


<?php $num++; } ?>
    


  </tbody>
</table>
</div>
  </div>
<?php
  // mysqli_close($connection);
}
?>
</div>


<div class="jumbotron" style="background-color:#ECDEE3">
  <!-- <p>Bootstrap is the most popular HTML, CSS...</p>  -->
  <h4>การเรียนรู้ : <?php echo $name." ".$last;?></h4><br>
  <?php 
  unset($_SESSION["lastnam"]);
  ?>
  <div class="container">

<?php 
$number = $_SESSION["pincode"];


if(isset($namee)){
   
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
   echo '<p>เกิดข้อผิดพลาด</p>';
}

?>
  

  </div>
  </div>

  <?php 

   unset($_SESSION["username_user"]);
   //var_dump($_SESSION); 
  
  ?>
 
<br>
<div class="text-center" style="color: red;"><h6><a href="MGRoom_hr.php" class="text-reset"> << กลับไปหน้าจัดการห้อง </a> </h6></div>
  <!-- ปิด cookie -->

  <?php

}else{
   header("location:../logout_hr.php");
}
//ob_end_flush();
include('../footer.php'); 
?>