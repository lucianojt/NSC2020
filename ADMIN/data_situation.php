<?php session_start(); 
if(isset($_COOKIE["minny"])){
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
$room = $_SESSION["code"] ;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ข้อมูลสถานการณ์</title>
    <?php include("head.php"); ?>
   
     
      <div class="text"><p>ข้อมูลสถานการณ์</p></div>
      <div class="container">
      <div class="link">
        <h5><a href="index.php" class="text-reset">ADMIN</a> > <a href="MGRoom_ADMIN.php?code=<?php echo  $room;?>" class="text-reset">จัดการห้อง</a> > ข้อมูลสถานการณ์</a></h5>
      </div>

<!-- close container -->
      </div><br>
<div class="container">
<?php 

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
    <form action="detail_situation.php" method="get">
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
.table{
  background-color: #F7DAD2;
}
.table-responsive{
  height: 500px;
  overflow: scroll;
}
</style>