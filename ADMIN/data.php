<?php 
session_start(); 
if(isset($_COOKIE["minny"])){
  include("../database/database.php"); 
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');
  $room = $_SESSION["code"] ;
  
  
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ข้อมูลห้อง</title>
    <?php include("head.php"); ?>
      <div class="text"><p>ข้อมูลห้อง</p></div>
      <div class="container">
      <div class="link">
        <h5><a href="index.php" class="text-reset">ADMIN</a> > <a href="MGRoom_ADMIN.php?code=<?php echo  $room;?>" class="text-reset">จัดการห้อง</a> > ข้อมูลห้อง</a></h5>
   </div>
      </div><br>
      
      <?php 
    //   echo $_SESSION["code"] ;
   
      $sql = "SELECT * FROM regis_hr WHERE code =  '$room'  ";
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
                <form  method="get">
                         <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">ชื่อจริง</label>
                            <input type="text" class="form-control" name="name_hr" value="<?php echo $row['name_hr'];?>"  readonly="">
                            </div>
                            <div class="form-group col-md-6">
                            <label >นามสกุล</label>
                            <input type="text" class="form-control" name="lname_hr" value="<?php echo $row['lname_hr'];?>" readonly="">
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="inputEmail4">ชื่อผู้ใช้</label>
                            <input type="text" class="form-control" name="user_hr" value="<?php echo $row['user_hr'];?>"  readonly="" >
                            </div>
                           
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="inputEmail4">ชื่อโรงแรม</label>
                            <input type="text" class="form-control" name="NHo_hr" value="<?php echo $row['NHo_hr'];?>"  readonly="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <label for="inputEmail4">จังหวัด</label>
                            <input type="text" class="form-control" name="pro_hr" value="<?php echo $row['pro_hr'];?>"  readonly="">
                            </div>
                            <div class="form-group col-md-4">
                            <label >อำเภอ</label>
                            <input type="text" class="form-control" name="dt_hr" value="<?php echo $row['dt_hr'];?>" readonly="">
                            </div>
                            <div class="form-group col-md-4">
                            <label >รหัสไปรษณีย์</label>
                            <input type="text" class="form-control" name="zip_hr" value="<?php echo $row['zip_hr'];?>" readonly="">
                            </div>
                           
                        </div>
                        <div class="form-group">
                            <label for="inputAddress">อีเมล</label>
                            <input type="text" class="form-control" name="mail_hr" value="<?php echo $row['mail_hr'];?>" readonly="">
                        </div> 
                      
                    </form>
                </div>
            </div>
        </div>
        <?php
         mysqli_close($connection);
        }
      ?>

  <?php 
    }else{
    
        header("location:../logout_hr.php");
      }
      include('../footer.php'); ?>
<style>
.text {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}

</style>