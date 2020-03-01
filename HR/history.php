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
   
     
      <div class="text"><p>ประวัติพนักงาน</p></div>
      <div class="container">
      <div class="link">
        <h5><a href="MGRoom_hr.php" class="text-reset">จัดการห้อง</a> > ประวัติพนักงาน</a></h5>
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
  <div class="table-responsive">
    <table class="table">
      <thead class="thead-dark">
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
</div>
   <!-- ปิด cookie -->
   <?php
}else{
   header("location:../logout_hr.php");
}
include('../footer.php'); 
ob_end_flush();?>

<style>
.text {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.table{
  background-color: #F7DAD2;
}
.table-responsive{
  height: 500px;
  overflow: scroll;
}
</style>