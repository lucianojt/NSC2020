<?php 
ob_start();
session_start();
if(isset($_COOKIE["user"])){
  include("../../../database/database.php"); 
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');

date_default_timezone_set('Asia/Bangkok');
$SimConver_Din = date("d-m-Y");
$SimConver_Tin = date("H:i:s");
    
$_SESSION["SimConver_Din"] = $SimConver_Din;
$_SESSION["SimConver_Tin"] = $SimConver_Tin;

?>
<!doctype html>
<html lang="en">
  <head>
    <title>บทสนทนา: ประโยคที่ใช้บ่อย</title>
    <?php include("../headU.php"); ?>   
   <!-- start -->
   
   <div class="text"><h3>บทสนทนา: ประโยคที่ใช้บ่อย</h3></div><br>

   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="simple.php" class="text-reset">ประโยคในชีวิตประจำวัน</a> > บทสนทนา</h6>
   </div>
   </div><br>
    <div class="container">
    <div class="ges">G = Guest แขก<p>R = Receptionist พนักงานต้อนรับ</p></div>
<?php
 $sql = "SELECT* FROM con_Topic WHERE topic = 'sim' ";
 $result = mysqli_query($connection,$sql);
 if(!$result){
   echo 'ไม่สามารถติดต่อ database ได้';
 }else{
    while($row = mysqli_fetch_assoc($result)){
    ?> 
    <div class="main">
    <p><?php echo $row['con_nam'];?></p>  
    </div>

    <div class="card">
    <div class="detail"> 
     <?php
    $sql2 = "SELECT* FROM Colo_con_simDa WHERE con_id = ".$row['con_id']." AND name = 'sim' ";
    $result2 = mysqli_query($connection,$sql2);
    ?> 
    <div class="row">
    <?php
     while($row2 = mysqli_fetch_assoc($result2)){ 
      $cutthai = explode(";",$row2['con_th']); 
      $cuten = explode(";",$row2['con_en']); 

      $colorthai = explode(";",$row2['colo_th']); 
      $coloren = explode(";",$row2['colo_ch']); 

      $nunTHAI = count($cutthai);
      $nunEN = count($cuten);

      $CTHAI = count($colorthai);
      $CEN = count($coloren);

     ?>
      <div class="col-1"><?php echo $row2['con_spe']." :"; ?></div>
      <div class="col-11">
             <?php  
                for($i=0;$i<$nunTHAI;$i++){
                    echo  ' <span class="colorWord" style="background-color: '.$colorthai[$i].' ;"> '.$cutthai[$i].'</span>';
                 }   echo '<br>';
                 echo '<p class="chiWord" >'.$row2['con_ch'].'</p>';
                 for($i=0;$i<$nunEN;$i++){
                    echo  ' <span class="colorWord" style="background-color: '.$coloren[$i].' ;"> '.$cuten[$i].'</span>';
                 } 
                ?>
      </div>
     <?php
     }
     ?> 
    </div>
    </div>
 
  <div class="card-header">
   <audio controls>
           <source src="../../../sound/conver/sim/<?php echo $row['con_sound'];?>" type="audio/mpeg">
       </audio>
  </div>
</div><br>
     <?php
  }
 }
?>    
    </div>
    <div class="container">
    </div><br>
    <div class="text-center" style="color: red;"><h6><a href="simple.php" class="text-reset"> << ย้อนกลับไปหน้าที่แล้ว </a> </h6></div>
     <!-- ปิด cookie -->

  <?php

}else{
   header("location:../../../logout.php");
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
<style>
body {
  background-image: url('../../../images/wall.png');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
.navbar{
  background-color: #660223;
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
.main{
  font-size: 27px;
  color: #AE0F0F;
  font-weight: bold;
}
.col-1{
  margin-top: 15px;
  float: inherit;
  text-align: center;
  font-size: 18px;
  font-weight: bold;
}
.col-11{
  margin-top: 15px;
}
.text{
  text-align: center;
  background-image: url('../../../images/wallpa.jpg');
  color: white;
  height: 80px;
  padding: 21px; 
}
.ges{
  font-size: 20px;
  color: #1A2A73;
  font-weight: bold;
}
.sound{
  text-align: right;
}
.detail{
  width: 100%;
  height: 400px;
  border-radius: 20px;
  padding: 10px;
  overflow: scroll;
}
.colorWord {
  border-radius: 6px;
  padding-left: 4px;
  padding-right: 4px;
}
.chiWord{
  margin-top: 5px;
  margin-bottom: 5px;
}
</style>