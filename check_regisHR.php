<?php 
include("database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>สมัครเป็นผู้ดูแลห้อง</title>
<?php
include('header2.php');
?>
  <?php
  $hr_name = $_POST['user'];
  $hr_lname = $_POST['luser'];
  $hr_username = $_POST['username'];
  $hr_pass = $_POST['pass'];
  $hr_nhotel = $_POST['nhotel'];
  $hr_province = $_POST['province'];
  $hr_district = $_POST['district'];
  $hr_zipcode = $_POST['zipcode'];
  $hr_email = $_POST['email'];
  $codehr = mt_rand(1111, 9999);
  
  $sqlHr = "SELECT user_hr FROM regis_hr";
  $resultHr = mysqli_query($connection,$sqlHr); 
  while($rowHr = mysqli_fetch_assoc($resultHr)){
    $FoundHr[] = $rowHr['user_hr'];
  }
  $sqlHrEmail = "SELECT mail_hr FROM regis_hr";
  $resultHrEmail = mysqli_query($connection,$sqlHrEmail); 
  while($rowHrEmail = mysqli_fetch_assoc($resultHrEmail)){
    $FoundHrEmail[] = $rowHrEmail['mail_hr'];
  }
  
  
  $sqlUser = "SELECT user_usr FROM regis_usr";
  $resultUser = mysqli_query($connection,$sqlUser); 
  while($rowUser = mysqli_fetch_assoc($resultUser)){
    $FoundUser[] = $rowUser['user_usr'];
  }
  
  $sqlUserEmail = "SELECT email_usr FROM regis_usr";
  $resultUserEmail = mysqli_query($connection,$sqlUserEmail); 
  while($rowUserEmail = mysqli_fetch_assoc($resultUserEmail)){
    $FoundUserEmail[] = $rowUserEmail['email_usr'];
  }
  
  $ADMIN = "SELECT user FROM ADMIN";
  $resultADMIN = mysqli_query($connection,$ADMIN); 
  while($rowADMIN = mysqli_fetch_assoc($resultADMIN)){
    $FoundADMIN[] = $rowADMIN['user'];
  }

  if (in_array($hr_username,$FoundUser)) {
    ?>
      <div class="success">
        <div class="title">
          <p>ขออภัยด้วยชื่อ  "<?php echo $hr_username;?>" มีคนใช้แล้ว</p>
          <div class="anima">
            <a class="btn btn-info" href="registration_hr.php" role="button">ตกลง</a>
          </div>
        </div>
      </div>
    <?php
  }elseif (in_array($hr_username,$FoundHr)) {
    ?>
      <div class="success">
        <div class="title">
          <p>ขออภัยด้วยชื่อ  "<?php echo $hr_username;?>" มีคนใช้แล้ว</p>
          <div class="anima">
            <a class="btn btn-info" href="registration_hr.php" role="button">ตกลง</a>
          </div>
        </div>
      </div>
    <?php
  }elseif (in_array($hr_username,$FoundADMIN)) {
    ?>
      <div class="success">
        <div class="title">
          <p>ขออภัยด้วยชื่อ  "<?php echo $hr_username;?>" มีคนใช้แล้ว</p>
          <div class="anima">
            <a class="btn btn-info" href="registration_hr.php" role="button">ตกลง</a>
          </div>
        </div>
      </div>
    <?php
  }elseif (in_array($hr_email,$FoundUserEmail)) {
    ?>
      <div class="success">
        <div class="title">
          <p>ขออภัยด้วยชื่อ  "<?php echo $hr_email;?>" มีคนใช้แล้ว</p>
          <div class="anima">
            <a class="btn btn-info" href="registration_hr.php" role="button">ตกลง</a>
          </div>
        </div>
      </div>
    <?php
  }elseif (in_array($hr_email,$FoundHrEmail)) {
    ?>
      <div class="success">
        <div class="title">
          <p>ขออภัยด้วยชื่อ  "<?php echo $hr_email;?>" มีคนใช้แล้ว</p>
          <div class="anima">
            <a class="btn btn-info" href="registration_hr.php" role="button">ตกลง</a>
          </div>
        </div>
      </div>
    <?php
  } else{
    $sql = 'INSERT INTO regis_hr VALUES(NULL,"'.$hr_name.'","'.$hr_lname.'","'.$hr_username.'", "'.$hr_pass.'","'.$hr_nhotel.'",
                                            "'.$hr_province.'","'.$hr_district.'",
                                            "'.$hr_zipcode.'","'.$hr_email.'","'.$codehr.'")';
    $result = mysqli_query($connection,$sql);
    if ($result==TRUE) {
      $code = "Room_$codehr";
      $sql3 = "CREATE TABLE $code(id int AUTO_INCREMENT,
                                  code varchar(7) COLLATE 'utf8_general_ci',
                                  pic_usr varchar(30) COLLATE 'utf8_general_ci',
                                  name_usr varchar(30) COLLATE 'utf8_general_ci',
                                  lname_usr varchar(40) COLLATE 'utf8_general_ci',
                                  user_usr varchar(30) COLLATE 'utf8_general_ci',
                                  pass_usr varchar(20) COLLATE 'utf8_general_ci',
                                  email_usr varchar(30) COLLATE 'utf8_general_ci',
                                  pretest int(20) COLLATE 'utf8_general_ci',
                                  time_pretest varchar(10) COLLATE 'utf8_general_ci',
                                  posttest int(20) COLLATE 'utf8_general_ci',
                                  time_posttest varchar(10) COLLATE 'utf8_general_ci',
                                  PRIMARY KEY (id)
                                  ) COLLATE='utf8_general_ci' ";
      $result3 = mysqli_query($connection,$sql3);
      if ($result3 == TRUE) {
        ?>
          <div class="success">
            <div class="title">
              <p>PIN CODE ของคุณคือ <span style="color: #AF2020; font-weight: bold; ">"<?php echo $codehr;?>"</span></p>
              <div class="anima">
                <a class="btn btn-info" href="login.php" role="button">ตกลง</a>
              </div>
            </div>
          </div>
        <?php 
      } else {
          ?>
            <div class="success">
              <div class="title">
                <p>เกิดข้อผิดพลาดบางอย่างไม่สร้างมารถสร้างห้องได้</p>
                <div class="anima">
                  <a class="btn btn-info" href="login.php" role="button">ตกลง</a>
                </div>
              </div>
            </div>
          <?php 
        }
      }else{
        ?>
          <div class="success">
            <div class="title">
              <p>เกิดข้อผิดพลาดบางอย่างไม่สร้างมารถสร้างห้องได้</p>
              <div class="anima">
                <a class="btn btn-info" href="login.php" role="button">ตกลง</a>
              </div>
            </div>
          </div>
        <?php 
      }
      $sql4 = "INSERT INTO nameHr VALUEs(NULL,'$hr_name','$hr_username','$codehr')";
      $result4 = mysqli_query($connection,$sql4);
  }
include('footer.php'); ?>
<style>
body {
  background: #F5F5F5;
}
.success {
  position: absolute;
  margin: 0 auto;
  width: 40%;
  height: auto;
  border: none;
  border-radius: 20px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.title {
  margin: 20px;
  text-align: center;
  font-size: 20px;
}
@media (max-width: 575.98px) {
  .success { 
    width: 80%;
  }
}
.anima {
  position: relative;
  animation-name: example;
  animation-duration: 1.2s;
  margin: 0 auto;
}
@keyframes example {
  0% {
    left: 8%;
  }
  25% {
    left: -8%;
  }
  50% {
    left: 3%;
  }
  75% {
    left: -3%;
  }
  100% {
    left: 0%;
  }
}
</style>