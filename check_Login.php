<?php 
ob_start();
session_start();
include("database/database.php");
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
include('header2.php'); ?>
<div class="container"><br><br>
<?php
$a = $_POST['user'];
$b = $_POST['pass'];
if ($a === '' && $b === '') {
  header("location:login.php"); 
}
$sql5="SELECT * FROM ADMIN WHERE user = '$a' AND password = '$b'  ";
$result5 = mysqli_query($connection,$sql5);
$row5 = mysqli_fetch_array($result5);
if ($row5 == TRUE) {
  setcookie("minny","minny", time()+ 3600*5);
  header("location:ADMIN/index.php");
}
$sql= "SELECT user_usr,code
       FROM regis_usr
       WHERE user_usr = '$a'
       AND pass_usr = '$b' ";
$result = mysqli_query($connection,$sql);
$row = mysqli_fetch_array($result);
if(!$row){
  header("location:login.php"); 
?>
 <!-- <br><br><br><br><br>
      <div class="container" >
      <div class="card">
      <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
      <div class="centeredd">รหัสผ่านไม่ถูกต้อง</div>
      </div>
    </div><br><br>
       <div class="link">
           <a href="login.php" class="btn btn-outline-dark">ตกลง</a>
       </div> -->
<?php
}else{
  $_SESSION["username_user"] = $row["user_usr"];
  $_SESSION["pincode"] = $row["code"];
  if ( $row['code'] == "-") {
    header("location:login_pin.php"); 
  }
  else {
    if (isset($_COOKIE["user"])) {
      $codee = $_SESSION["pincode"];
      $room = "Room_".$codee;
      $sql7  = " SELECT * FROM $room WHERE user_usr = '$a' ";
      $result7 = mysqli_query($connection,$sql7);
      $row7 = mysqli_fetch_assoc($result7);  
      if ($row7['pretest'] == -1) {
        header("location:home/pretest.php");  
      } else {
        header("location:home/index.php");
        }                
      } else {
          $codee = $_SESSION["pincode"];
          $room = "Room_".$codee;
          $sql9  = " SELECT * FROM $room WHERE user_usr = '$a' ";
          $result9 = mysqli_query($connection,$sql9);  
          $row9 = mysqli_fetch_assoc($result9);
          if ($row9['pretest'] == -1) {
            setcookie("user",$a, time()+ 3600*5);
            header("location:home/pretest.php");
          } else {
              setcookie("user",$a, time()+ 3600*5);
              date_default_timezone_set('Asia/Bangkok');
              $day = date("d-m-Y");
              $time = date("H:i:s");
              $_SESSION["time"] = $time;
              $_SESSION["day"] = $day;
              $sql51 = "INSERT INTO ReTim VALUES(NULL,'$a','$codee','$day','$time')";
              $result51 = mysqli_query($connection,$sql51);
              if ($result51 == TRUE) {
                header("location:home/index.php"); 
              } else {
                header("location:login.php");
                ?> 
                  <!-- <br><br><br><br><br>
                  <div class="container" >
                    <div class="card">
                      <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
                      <div class="centeredd">เกิดบางอย่างผิดพลาด </div>
                    </div>
                  </div><br><br>
                  <div class="link">
                    <a href="login.php" class="btn btn-outline-dark">ตกลง</a>
                  </div> -->
                <?php
              }
            }
      } 
  }
}
$sql2= "SELECT user_hr,pass_hr,code
FROM regis_hr
WHERE user_hr = '$a'
AND pass_hr = '$b' ";
$result2 = mysqli_query($connection,$sql2);
$row2 = mysqli_fetch_array($result2);
if($row2){
 $_SESSION["username_hr"] = $row2["user_hr"];
 $_SESSION["pincode"] = $row2["code"];
 
     if(isset($_COOKIE["hr"])){
     header("location:HR/MGRoom_hr.php");
     }else{
         setcookie("hr",$a, time()+ 3600*5);
         header("location:HR/MGRoom_hr.php");
     }
}
include('footer.php'); 
ob_end_flush();
?>
<style>
.centered {
  color: #501C07;
  font-size: 60px;
  letter-spacing: 8px;
}
.center{
  color: #501C07;
  font-size: 45px;
  letter-spacing: 1px;
}
.link{
  text-align: center;
}
.btn-outline-dark{
  width: 120px;
  height: 60px;
  font-size: 29px;
}
.centeredd{
  color: #501C07;
  font-size: 50px;
  letter-spacing: 6px;
}
</style>