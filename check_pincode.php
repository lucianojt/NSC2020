
<?php 
ob_start();
include("database/database.php");
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ใส่ pincode</title>
<?php
  include('header2.php');
  if ($_POST['pincode'] === '') {
    header("location:login_pin.php");
  }
  if (isset($_COOKIE["user"])) {
    header("location:home/pretest.php");
  } else {
    date_default_timezone_set('Asia/Bangkok');
    $day = date("d-m-Y");
    $time = date("H:i:s");
    $logpin = $_POST['pincode'];
    $sql = "SELECT * FROM regis_hr WHERE code = '$logpin'";
    $result = mysqli_query($connection,$sql);
    $row = mysqli_fetch_array($result);
    if (!$row) {
    ?> 
    <div class="detail">
      <div class="text">
        <p>ไม่มี pincode หมายเลข <span style="color: #AF2020; font-weight: bold;">"<?php echo $logpin;?>"</span></p>
      </div>
      <div class="button">
        <a class="btn btn-info" href="login_pin.php" role="button">ตกลง</a>
      </div>
    </div>
    <?php
    } else {
      if ( session_start()) {
        setcookie(session_name(), NULL, '/');
        $_SESSION["pincode"] = $logpin;
        $nam3 = $_SESSION["username_user"];
        setcookie("user",$nam3, time()+ 3600*5);
        $sql2 = "SELECT * FROM regis_usr WHERE user_usr = '$nam3'";
        $result2 = mysqli_query($connection,$sql2);
        $row2 = mysqli_fetch_array($result2);

        $picture = $row2['pic_usr'];
        $fullname = $row2['name_usr'];
        $lasname = $row2['lname_usr'];
        $username = $row2['user_usr'];
        $password = $row2['pass_usr'];
        $email = $row2['email_usr'];
        $room = 'Room_'.$logpin;
        $code = $_SESSION["pincode"];
        $_SESSION["time"] = $time;
        $_SESSION["day"] = $day;
        $sql5 = "INSERT INTO ReTim VALUES(NULL,'$username','$code','$day','$time')";
        $result5 = mysqli_query($connection,$sql5);
        if($result5 == FALSE){
        ?> 
        <div class="detail">
          <div class="text">
            <p>ไม่สามารถบันทึกเวลาได้</p>
          </div>
          <div class="button">
            <a class="btn btn-info" href="login_pin.php" role="button">ตกลง</a>
          </div>
        </div>
        <?php
      }
      $sql4 = "SELECT * FROM $room WHERE user_usr = '$nam3' ";
      $result4 = mysqli_query($connection,$sql4);
      $row4 = mysqli_fetch_array($result4);
      if($row4['pretest'] > 0){
        header("location:home/index.php"); 
      } else{
        $sql6 = "UPDATE regis_usr 
                 SET code = '$logpin'
                 WHERE `user_usr` = '$username'";
        $result6 = mysqli_query($connection,$sql6);
        if(! $result6){
        ?> 
          <div class="detail">
            <div class="text">
              <p>เกิดบางอย่างผิดพลาด</p>
            </div>
            <div class="button">
              <a class="btn btn-info" href="login_pin.php" role="button">ตกลง</a>
            </div>
          </div>
        <?php
        }
        $sql3 = "INSERT INTO $room VALUES(NULL,'$logpin','$picture','$fullname','$lasname','$username','$password','$email',-1,'-',-1,'-')";
        $result3 = mysqli_query($connection,$sql3);
        if ($result3==TRUE) {
          header("location:home/pretest.php"); 
        }else {
          ?> 
            <div class="detail">
              <div class="text">
                <p>เกิดบางอย่างผิดพลาด</p>
              </div>
              <div class="button">
                <a class="btn btn-info" href="login_pin.php" role="button">ตกลง</a>
              </div>
            </div>
          <?php
        }
        $i = 1;
        while($i<=24){
          $sqlInsTi = "INSERT INTO LessonTimeNew VALUES(NULL,'$i','$username','$logpin',0)";
          $resultInsTi = mysqli_query($connection,$sqlInsTi);
          $i++;
        } 
      }
    }
  }
}
ob_end_flush();
include('footer.php');
?>
<style>
body {
  background: #F5F5F5;
}
.detail {
  position: absolute;
  margin: 0 auto;
  width: 30%;
  height: auto;
  border: none;
  border-radius: 20px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.text {
  text-align: center;
  margin: 20px 0;
  font-size: 20px;
}
@media (max-width: 575.98px) {
  .detail { 
    width: 80%;
  }
}
.button {
  text-align: center;
  margin: 20px 0;
}
</style>