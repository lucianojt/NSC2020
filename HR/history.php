<?php 
ob_start();
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
 
        
    </style>
     
      <div class="text"><h3>ประวัติพนักงาน</h3></div><br>
      <div class="container">
      <div class="link">
        <h6><a href="MGRoom_hr.php" class="text-reset">จัดการห้อง</a> > ประวัติพนักงาน</a></h6>
      </div>

<!-- close container -->
      </div><br>
<div class="container">
<?php 
$room = $_SESSION["code"] ;
$aaaa = "Room_".$room;
$sql = "SELECT * FROM $aaaa ORDER BY  name_usr ASC";
$result = mysqli_query($connection,$sql);
$num =1;
?>
  <table class="table table-striped table-dark">
    <thead>
      <tr>
        <th scope="col" style="text-align: center;">ลำดับที่</th>
        <th scope="col">ชื่อจริง</th>
        <th scope="col">นามสกุล</th>
        <th scope="col"></th>
      </tr>
    </thead>
    <tbody>
    <!-- วนลูปตรงนี้ -->
    <?php  
     while($row = mysqli_fetch_assoc($result)){
    ?>
    <form action="infoHisto.php" method="get">
      <tr>
        <th scope="row" style="text-align: center;"><?php echo $num;?></th>
        <td><?php echo $row['name_usr'];?></td>
        <td><?php echo $row['lname_usr'];?></td>
        <td><button type="submit" class="btn btn-info" name="name" value="<?php echo $row['name_usr'];?> ">รายละเอียด</button></td>
      </tr>
      </form>
    <?php 
  $num++;
  } ?>
    <!-- สิ้นสุดวนลูป -->
    </tbody>
  </table>
</div>
   <!-- ปิด cookie -->

   <?php

}else{
   header("location:../logout_hr.php");
}
include('../footer.php'); 
ob_end_flush();?>