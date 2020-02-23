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
        position: fixed;
        top: 0; */
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
   
    </style>
     
      <div class="text"><h3>ข้อมูลห้อง</h3></div><br>
      <div class="container">
      <div class="link">
        <h6><a href="index.php" class="text-reset">ADMIN</a> > <a href="MGRoom_ADMIN.php?code=<?php echo  $room;?>" class="text-reset">จัดการห้อง</a> > ข้อมูลห้อง</a></h6>
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