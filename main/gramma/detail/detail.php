<?php 
ob_start();
if(isset($_COOKIE["user"])){
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ไวยากรณ์ : รายละเอียดของห้องพัก</title>
    <?php include("../navbar.php"); ?>
   <!-- start -->
   
   <div class="text"><p>ไวยากรณ์ : รายละเอียดของห้องพัก</p></div>

   <div class="container">
   <div class="link">
   <h5><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../gramma.php" class="text-reset">ไวยากรณ์</a> > <a href="simple.php" class="text-reset">ประโยคพื้นฐาน</a></h5>
   </div>
   </div>
    <br>
   <div class="container">
   <div class="ges"><p>ไวยากรณ์ : รูปประโยค</p></div>
   <div class="info">ในภาษาจีน ตำแหน่งของคำวิเศษณ์จะอยู่หน้าภาคแสดง เช่น 很 hěn (มาก) 非常 fēicháng (อย่างยิ่ง) 真 zhēn (จริงๆ) เป็นต้น</div><br>
   <div class="detail">
  <?php 
  include("../../../database/database.php"); 
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');
  $sql = "SELECT* FROM gram_detail
  LIMIT 10;";
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
            <div class="yel"><?php echo $row['Gs_ch'];?></div>
            <?php echo $row['Gs_en'];?>
            <p><?php echo $row['Gs_th'];?></p>
                    </div>
            </div>
  
  <?php
      $num++;
    }
    }
  ?>
   </div><br>
   <div class="ges"><p>ไวยากรณ์ : คำบอกตำแหน่ง</p></div>
   <div class="info">คำบอกตำแหน่ง” ในภาษาจีนเป็น “คำนาม” เวลาใช้ถือเป็น “คำหลัก” โดยส่วนขยายจะอยู่หน้าคำบอกตำแหน่ง เช่น</div><br>
   <div class="detail">
   <?php
   $sql2 = "SELECT* FROM gram_detail WHERE id>11 LIMIT 2;";
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
            <div class="yel"><?php echo $row2['Gs_ch'];?></div>
            <?php echo $row2['Gs_en'];?>
            <p><?php echo $row2['Gs_th'];?></p>
                    </div>
            </div>
        <?php
        $num2++;
    }
   }
   ?>
   </div><br>
   <div class="ges"><p>ไวยากรณ์ : คำบุพบพ</p></div>
   <div class="info">[คำบุพบพ + ส่วนขยาย + ภาคแสดง]</div><br>
   <div class="info">房间里 fángjiān lǐ (ในห้อง) เป็นส่วนขยาย 抽烟 chōuyān (สูบบุหรี่) เป็นภาคแสดง</div><br>
   <div class="detail">
   <?php
   $sql2 = "SELECT* FROM gram_detail WHERE id>14 LIMIT 3;";
   $result2 = mysqli_query($connection,$sql2);
   if(!$result2){
       echo 'ติดต่อไม่ได้';
   }else{
    $num3 =1;
    while($row2 = mysqli_fetch_assoc($result2)){
        ?> 
        <div class="row">
            <div class="col-1">
            <?php echo $num3;?>
            </div>
            <div class="col-11">
            <div class="yel"><?php echo $row2['Gs_ch'];?></div>
            <?php echo $row2['Gs_en'];?>
            <p><?php echo $row2['Gs_th'];?></p>
                    </div>
            </div>
            <?php
        $num3++;
    }
   }
   ?>
</div><br>
   <div class="ges"><p>ไวยากรณ์ : การอ่านร้อยละ (เปอร์เซ็นต์ %)</p></div>
   <div class="info">百分之 …...  = …… % (หรือ …… ของร้อยส่วน) เช่น bǎi fēn zhī  …… ร้อย ส่วน ของ ……</div><br>
   <div class="detail">
   <?php
   $sql2 = "SELECT* FROM gram_detail WHERE id>18 LIMIT 3;";
   $result2 = mysqli_query($connection,$sql2);
   if(!$result2){
       echo 'ติดต่อไม่ได้';
   }else{
    $num4 =1;
    while($row2 = mysqli_fetch_assoc($result2)){
        ?> 
        <div class="row">
            <div class="col-1">
            <?php echo $num4;?>
            </div>
            <div class="col-11">
            <div class="yel"><?php echo $row2['Gs_ch'];?></div>
            <?php echo $row2['Gs_en'];?>
            <p><?php echo $row2['Gs_th'];?></p>
                    </div>
            </div>
            <?php
        $num4++;
    }
   }
   ?>

</div><br>
   <div class="ges"><p>ไวยากรณ์ : คำวิเศษณ์</p></div>
   <div class="info">คำวิเศษณ์ + ภาคแสดง</div>
   <div class="info">ในภาษาจีน ตำแหน่งของคำวิเศษณ์จะอยู่หน้าภาคแสดง เช่น 一起 yìqǐ (ด้วยกัน)</div>
   <div class="info">已经 yǐjīng หรือ 已 yǐ (เรียบร้อยแล้ว) 只 zhǐ (แค่ เพียง) 先 xiān (ก่อน)</div><br>
   <div class="detail">
   <?php
   $sql2 = "SELECT* FROM gram_detail WHERE id>22 LIMIT 4;";
   $result2 = mysqli_query($connection,$sql2);
   if(!$result2){
       echo 'ติดต่อไม่ได้';
   }else{
    $num5 =1;
    while($row2 = mysqli_fetch_assoc($result2)){
        ?> 
        <div class="row">
            <div class="col-1">
            <?php echo $num5;?>
            </div>
            <div class="col-11">
            <div class="yel"><?php echo $row2['Gs_ch'];?></div>
            <?php echo $row2['Gs_en'];?>
            <p><?php echo $row2['Gs_th'];?></p>
                    </div>
            </div>
            <?php
        $num5++;
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
.detail {
  padding: 20px;
  background: #7e1f35;
  color: white;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.info {
  font-size: 18px;
  color: #1A2A73;
  font-weight: bold;
}
.col-1 {
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
    font-size: 36px;
  }
}
</style>