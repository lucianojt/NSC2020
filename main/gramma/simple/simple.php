<?php 
ob_start();
if (isset($_COOKIE["user"])) {
  include("../../../database/database.php"); 
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ไวยากรณ์ : ประโยคพื้นฐาน</title>
    <?php include("../navbar.php"); ?>
  
   <!-- start -->
   
   <div class="text"><p>ไวยากรณ์ : ประโยคพื้นฐาน<p></div>

   <div class="container">
   <div class="link">
   <h5><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../gramma.php" class="text-reset">ไวยากรณ์</a> > <a href="simple.php" class="text-reset">ประโยคพื้นฐาน</a></h5>
   </div>
   </div>
    <br>
   <div class="container">
   <div class="ges"><p>ไวยากรณ์ : คำวิเศษณ์</p></div>
   <div class="info">ในภาษาจีน ตำแหน่งของคำวิเศษณ์จะอยู่หน้าภาคแสดง เช่น 很 hěn (มาก) 非常 fēicháng (อย่างยิ่ง) 真 zhēn (จริงๆ) เป็นต้น</div><br>
   <div class="detail">
  <?php 
  $sql = "SELECT* FROM gram_sim ORDER BY id ASC
  LIMIT 3;";
  $result = mysqli_query($connection,$sql);
  if(!$result){
      echo 'ติดต่อไม่ได้';
  }else{
    $num = 1;
    while($row = mysqli_fetch_assoc($result)){
     ?> 
      <div class="row">
            <div class="col-1">
            <?php echo $num;?>
            </div>
            <div class="col-11">
            <div class="yel"><?php echo $row['GS_ch'];?></div>
            <?php echo $row['GS_en'];?>
            <p><?php echo $row['GS_th'];?></p>
                    </div>
            </div>
  <?php
      $num++;
    }
    }
  ?>
   </div><br>
   <div class="ges"><p>ไวยากรณ์ : รูปประโยค</p></div>
   <div class="detail">
   <?php
   $sql2 = "SELECT* FROM gram_sim WHERE id>3";
   $result2 = mysqli_query($connection,$sql2);
   if(!$result2){
       echo 'ติดต่อไม่ได้';
   }else{
    $num2 =1;
    while($row2 = mysqli_fetch_assoc($result2)){
        ?> 
        <div class="row">
            <div class="col-1">
            <?php echo $num2;?>
            </div>
            <div class="col-11">
            <div class="yel"><?php echo $row2['GS_ch'];?></div>
            <?php echo $row2['GS_en'];?>
            <p><?php echo $row2['GS_th'];?></p>
                    </div>
            </div>
        <?php
        $num2++;
    }
   }
   ?>
</div>
   </div>
  <div class="backLink"><h6><a href="../../../home/index.php" class="text-reset"> << กลับไปหน้าหลัก </a> </h6>
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
.text {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.ges {
  font-size: 20px;
  color: #1A2A73;
  font-weight: bold;
}
.detail{
  padding: 20px;
  background: #7e1f35;
  color: white;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.info{
  font-size: 18px;
  color: #1A2A73;
  font-weight: bold;
}
.col-1{
  text-align: center;
}
.backLink {
  margin: 20px 0;
  text-align: center;
}
.text-reset {
  font-size: 18px;
}
</style>