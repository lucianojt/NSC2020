<?php 
ob_start();
date_default_timezone_set('Asia/Bangkok');
include("database/database.php");
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
include('header2.php'); ?>
<div class="container"><br><br>
<?php  
$use_pic =  pathinfo(basename($_FILES['pic_usr']['name']),PATHINFO_EXTENSION);
$new_imgname= 'img_'.uniqid().".".$use_pic;
$img_path = "images/userpic/";
$uploade_path = $img_path.$new_imgname;

$sec = move_uploaded_file($_FILES['pic_usr']['tmp_name'],$uploade_path);
if($sec==FALSE){
?>
<br><br><br><br><br>
  <div class="container" >
  <div class="card">
  <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
  <div class="centered">กรุณาใส่รูปภาพ</div>
  </div>
</div><br>
   <div class="link">
       <a href="registration_user.php" class="btn btn-outline-dark">ตกลง</a>
   </div>
<?php
}else{
$image = $new_imgname;

// $target = "../images/userpic/".basename($_FILES['pic_usr']['name']);
// $image = $_FILES['pic_usr']['name'];
// move_uploaded_file($_FILES['pic_usr']['tmp_name'],$target);
$use_name = $_POST['user'];
$use_lname =  $_POST['luser'];
$use_user =  $_POST['username'];
$use_pass =  $_POST['pass'];
$use_email =  $_POST['email'];

$day = date("j-F-Y ");
$time = date("g:i a");



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

if( in_array($use_user,$FoundUser)){
    ?> 
 <br><br><br><br><br>
      <div class="container" >
      <div class="card">
      <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
      <div class="center">ขออภัยด้วยชื่อ  "<?php echo $use_user;?>" มีคนใช้แล้ว</div>
      </div>
    </div><br>
       <div class="link">
           <a href="registration_user.php" class="btn btn-outline-dark">ตกลง</a>
       </div>

    <?php
  }elseif(in_array($use_user,$FoundHr)){
    ?> 
    <br><br><br><br><br>
      <div class="container" >
      <div class="card">
      <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
      <div class="center">ขออภัยด้วยชื่อ  "<?php echo $use_user;?>" มีคนใช้แล้ว</div>
      </div>
    </div><br>
       <div class="link">
           <a href="registration_user.php" class="btn btn-outline-dark">ตกลง</a>
       </div>
    
        <?php

  }elseif(in_array($use_user,$FoundADMIN)){

    ?> 
<br><br><br><br><br>
  <div class="container" >
  <div class="card">
  <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
  <div class="center">ขออภัยด้วยชื่อ  "<?php echo $use_user;?>" มีคนใช้แล้ว</div>
  </div>
</div><br>
   <div class="link">
       <a href="registration_user.php" class="btn btn-outline-dark">ตกลง</a>
   </div>

    <?php

  }elseif(in_array($use_email,$FoundUserEmail)){

   ?> 
    <br><br><br><br><br>
      <div class="container" >
      <div class="card">
      <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
      <div class="center">ขออภัยด้วยอีเมล  "<?php echo $use_email;?>" มีคนใช้แล้ว</div>
      </div>
    </div><br>
       <div class="link">
           <a href="registration_user.php" class="btn btn-outline-dark">ตกลง</a>
       </div>
    
        <?php

  }elseif(in_array($use_email,$FoundHrEmail)){

    ?> 
    <br><br><br><br><br>
      <div class="container" >
      <div class="card">
      <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
      <div class="center">ขออภัยด้วยอีเมล  "<?php echo $use_email;?>" มีคนใช้แล้ว>
      </div>
    </div><br>
       <div class="link">
           <a href="registration_user.php" class="btn btn-outline-dark">ตกลง</a>
       </div>
    
        <?php

  }else{

    $sql = "INSERT INTO regis_usr VALUES(NULL,'$image','$use_name','$use_lname','$use_user','$use_pass','$use_email','$day','$time','-')";
    // $result = mysqli_query($connection,$sql);
    if($sql ==TRUE){
      ?>
      <div class="success">
        <div class="title">
          <p>สมัครสมาชิกสำเร็จกด "ตกลง" เพื่อเข้าสู่ระบบ</p>
          <div class="anima">
            <a class="btn btn-info" href="login.php" role="button">ตกลง</a>
          </div>
        </div>
      </div>
      <?php        
    }else{
      header("location:logout.php");  
    } 
  }
}
?>
</div>
  <?php 
  ob_end_flush();
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
    left: 10%;
  }
  25% {
    left: -10%;
  }
  50% {
    left: 5%;
  }
  75% {
    left: -5%;
  }
  100% {
    left: 0%;
  }
}
</style>