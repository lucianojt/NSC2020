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
    <title>แก้ไขข้อมูล</title>
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
    .main {
        text-align: center;
    background-image: url('../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px; 
    }

    .table{
        background-color: #DEDADB;
    }

   
    </style>
   

   <div class="main">
    <h3>แก้ไขข้อมูล</h3>
    </div><br>
  
  
    <div class="container">
    <div class="link">
        <h6><a href="../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="conclude.php" class="text-reset">ผลสรุป</a> > แก้ไขข้อมูล</h6>
   </div><br>
<!-- close container -->
   </div>

   <?php 
$use =  $_SESSION["username_user"];
$code =  $_SESSION["pincode"];
$aa = 'Room_'.$code;
$sql = "SELECT * from $aa WHERE user_usr = '$use' ";
$result = mysqli_query($connection,$sql);
if(!$result){
    echo 'เกิดข้อผิดพลาดบางอย่าง';
}else{
    $row = mysqli_fetch_assoc($result);
?>
<div class="container">

<div class="jumbotron jumbotron-fluid" style="background-color:#ECDEE3">

            <div class="container">
               <form action="update_data.php" method="get">
                 <div class="form-row">
                            <div class="form-group col-md-6">
                            <label for="inputEmail4">ชื่อจริง</label>
                            <input type="text" class="form-control" name="name_usr" value="<?php echo $row['name_usr'];?>" >
                            </div>
                            <div class="form-group col-md-6">
                            <label >นามสกุล</label>
                            <input type="text" class="form-control" name="lname_usr" value="<?php echo $row['lname_usr'];?>">
                            </div>
                           
                 </div>
                 <div class="form-row">
                 <div class="form-group col-md-4">
                            <label for="inputEmail4">ชื่อผู้ใช้ (อ่านได้อย่างเดียว)</label>
                            <input type="text" class="form-control" name="user_usr" value="<?php echo $row['user_usr'];?>" readonly="" >
                            </div>
                            <div class="form-group col-md-4">
                            <label >รหัสผ่านใหม่</label>
                            <input id="password" type="password" class="form-control" name="pass_usr"  placeholder="xxxxxxxxx" required>
                            </div>
                            <div class="form-group col-md-4">
                            <label >ยืนยันรหัสผ่าน</label>
                            <input id="confirm_password" type="password" class="form-control" name="Cpass_usr"  placeholder="xxxxxxxxx" required>
                            </div>
                           
                 </div>
                 <div class="form-row">
                            <div class="form-group col-md-12">
                            <label for="inputEmail4">อีเมล</label>
                            <input type="text" class="form-control" name="email_usr" value="<?php echo $row['email_usr'];?>" >
                            </div>
                 </div>
                 <button type="submit" class="btn btn-danger">อัปเดต</button>
               </form>
            </div>
</div>
</div>
<?php
}
?>

    <div class="text-center" style="color: red;"><h6><a href="../home/index.php" class="text-reset"> << กลับไปหน้าหลัก </a> </h6></div>
    
    
</div>



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