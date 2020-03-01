<?php 
ob_start();
if(isset($_COOKIE["hr"])) {
session_start(); 
  include("../database/database.php"); 
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ข้อมูลห้อง</title>
    <?php include("head.php"); ?>  
      <div class="text"><p>ข้อมูลห้อง</p></div>
      <div class="container">
      <div class="link">
        <h5><a href="MGRoom_hr.php" class="text-reset">จัดการห้อง</a> > ข้อมูลห้อง</a></h5>
   </div>
      </div><br>
      
      <?php 
    //   echo $_SESSION["code"] ;
      $room = $_SESSION["code"] ;
      $user=  $_SESSION["username_hr"];
      $sql = "SELECT * FROM regis_hr WHERE code =  '$room' AND user_hr = '$user' ";
      $result = mysqli_query($connection,$sql);
      $row = mysqli_fetch_assoc($result);
      if(!$result){
          echo 'เกิดข้อผิดพลาดบางอย่าง!!';
      }else{
        ?>
        <div class="container" style="text-align: center;">
            <div class="jumbotron jumbotron-fluid" style="background-color:#ECDEE3">
                <div class="container">
                    <h1 class="display-4"><?php echo $row['code'];?></h1>
                    <p class="lead">PIN CODE</p>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="jumbotron jumbotron-fluid" style="background-color:#ECDEE3">
                <div class="container">
                <h3>โรงแรม: <?php echo $row['NHo_hr']; ?></h3><br>
                <form action="update_data.php" method="get">
                         <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">ชื่อจริง</label>
                            <input type="text" class="form-control" name="name_hr" value="<?php echo $row['name_hr'];?>" >
                            </div>
                            <div class="form-group col-md-6">
                            <label >นามสกุล</label>
                            <input type="text" class="form-control" name="lname_hr" value="<?php echo $row['lname_hr'];?>">
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="inputEmail4">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" name="user_hr" value="<?php echo $row['user_hr'];?>"  readonly="" >
                            </div>
                            <div class="form-group col-md-4">
                            <label >รหัสผ่านใหม่</label>
                            <input id="password"  type="password" class="form-control" name="pass_hr" placeholder="xxxxxxxxx" required>
                            </div>
                            <div class="form-group col-md-4">
                            <label >ยืนยันรหัสผ่าน</label>
                            <input id="confirm_password" type="password" class="form-control" placeholder="xxxxxxxxx" required>
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="inputEmail4">ชื่อโรงแรม</label>
                            <input type="text" class="form-control" name="NHo_hr" value="<?php echo $row['NHo_hr'];?>" >
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="inputEmail4">จังหวัด</label>
                            <input type="text" class="form-control" name="pro_hr" value="<?php echo $row['pro_hr'];?>" >
                            </div>
                            <div class="form-group col-md-4">
                            <label >อำเภอ</label>
                            <input type="text" class="form-control" name="dt_hr" value="<?php echo $row['dt_hr'];?>">
                            </div>
                            <div class="form-group col-md-4">
                            <label >รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" name="zip_hr" value="<?php echo $row['zip_hr'];?>">
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">อีเมล</label>
                            <input type="text" class="form-control" name="mail_hr" value="<?php echo $row['mail_hr'];?>">
                        </div> 
                        <button type="submit" class="btn btn-danger">อัปเดต</button>
                    </form>
                </div>
            </div>
        </div>
        <?php
         mysqli_close($connection);
        }
      ?>

   <!-- ปิด cookie -->
   <script>
        var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");
        function validatePassword(){
            if(password.value != confirm_password.value) {
                confirm_password.setCustomValidity("รหัสผ่านไม่ตรง");
            } else {
                confirm_password.setCustomValidity('');
            }
        }
        password.onchange = validatePassword;
        confirm_password.onkeyup = validatePassword;
</script>

   <?php

}else{
   header("location:../logout_hr.php");
} include('../footer.php'); 
ob_end_flush();?>

<style>
.text{
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}

</style>