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
    <title>ไวยากรณ์ : การสอบถามตำแหน่งสถานที่ และบริการเรียกรถแท็กซี่</title>
    <?php include("../navbar.php"); ?>
   
   
   
   <!-- start -->
   
   <div class="text"><p>ไวยากรณ์ : การสอบถามตำแหน่งสถานที่ และบริการเรียกรถแท็กซี่</p></div>
  
   <div class="container">
   <div class="link">
   <h5><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../gramma.php" class="text-reset">ไวยากรณ์</a> > <a href="location.php" class="text-reset">การสอบถามตำแหน่งสถานที่ และบริการเรียกรถแท็กซี่</a></h5>
   </div>
   </div>
    <br>
    <div class="container">
   <div class="ges"><p>ไวยากรณ์ : การสอบถามตำแหน่งสถานที่ และบริการเรียกรถแท็กซี่</p></div> 
   <br>
   <div class="detail">
  <?php 
  $sql = "SELECT* FROM gram_Topic WHERE name = 'รูปประโยค' AND topic = 'location' ";
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
            <div class="yel"><?php echo $row['Gs_th'];?></div>
            <?php echo $row['Gs_ch'];?>
            <p><?php echo $row['Gs_en'];?></p>
                    </div>
            </div>
  
  <?php
      $num++;
    }
    }
  ?>
   </div>
   <br>
   <div class="ges"><p>ไวยากรณ์ : รูปประโยค 怎么 (ยังไง?, อย่างไร?)</p></div>
   <br>
   <div class="detail">
   <?php
   $sql2 = "SELECT* FROM gram_Topic WHERE name = 'รูปประโยค2' AND topic = 'location' ";
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
            <div class="yel"><?php echo $row2['Gs_th'];?></div>
            <?php echo $row2['Gs_ch'];?>
            <p><?php echo $row2['Gs_en'];?></p>
                    </div>
            </div>
        <?php
        $num2++;
    }
   }
   ?>
</div><br>
   <div class="ges"><p>ไวยากรณ์ : คำบุพบพ 向 xiàng, 往 wǎng  (...ไปยัง...)</p></div>
   <div class="info">[คำบุพบพ + ส่วนขยาย + ภาคแสดง] ในภาษาจีน คำบุพบทและส่วนขยาย มักจะอยู่ด้านหน้าภาคแสดง เช่น</div><br>
   <div class="detail">
   <?php
   $sql2 = "SELECT* FROM gram_Topic WHERE name = 'คำบุพบพ' AND topic = 'location' ";
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
            <div class="yel"><?php echo nl2br($row2['Gs_th']);?></div><br>
            <?php echo $row2['Gs_ch'];?>
            <p><?php echo nl2br($row2['Gs_en']);?></p>
                    </div>
            </div>
        <?php
        $num2++;
    }
   }
   ?>
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
.detail {
  padding: 20px;
  background: #7e1f35;
  color: white;
  border-radius: 5px;
  padding: 10px;
}
.ges{
font-size: 20px;
color: #1A2A73;
font-weight: bold;
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
@media (max-width: 575.98px) {
  .text {
    letter-spacing: 1px;
    font-size: 30px;
  }
}
</style>