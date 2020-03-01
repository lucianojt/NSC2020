<?php 
session_start();
ob_start();
if(isset($_COOKIE["user"])){
include("../../../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
date_default_timezone_set('Asia/Bangkok');
$ChecInWord_Din = date("d-m-Y");
$ChecInWord_Tin = date("H:i:s");
$_SESSION["ChecInWord_Din"] = $ChecInWord_Din;
$_SESSION["ChecInWord_Tin"] = $ChecInWord_Tin;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>คำศัพท์: การเช็คอิน</title>
    <?php include("../headU.php"); ?>
   <!-- start -->
   <div class="text"><p>คำศัพท์: การเช็คอิน</p></div>
    <div class="container">
    <div class="link">
    <p><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="checkin.php" class="text-reset">การเช็คอิน</a> > คำศัพท์</p>
    </div>
   </div>
<?php 
$sql = "SELECT* FROM word WHERE name = 'checkin'";
$result = mysqli_query($connection,$sql);
if (!$result) {
    echo'cannot contact database';
} else {
?> 
<div class="container">
  <div class="colo">
    <div class="table-responsive">
      <table class="table">
        <thead class="thead">
            <tr>
            <th scope="col">คำภาษาจีน</th>
            <th scope="col">คำภาษาอังกฤษ</th>
            <th scope="col">คำภาษาไทย</th>
            <th scope="col">เสียงอ่าน</th>
            </tr>
        </thead>
        <tbody class="ta">
            <?php 
            $mu = 1;
            while($row = mysqli_fetch_assoc($result)){
            ?> 
            <tr>
            <td class="yall"><?php echo $row['wor_ch'];?></td>
            <td><?php echo $row['wor_en'];?></td>
            <td><?php echo $row['wor_th'];?></td>
            <?php
                    $inpi = $row['wor_sound'];
                    ?>
                    <audio id="sound<?php echo $mu; ?>" src="../../../sound/word/chackin/<?php echo $inpi; ?>"></audio>
            <td><a onclick="playSound(<?php echo $mu; ?>)" class="ml-auto"><img src="../../../images/loundspeaker.png" style="width:35px; cursor: pointer;"></a></td>
            </tr>
                <?php
                $mu++;
            }
            ?>
            <?php

            ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php
mysqli_close($connection);
}
?>
  </div>
  <div class="backLink"><h6><a href="checkin.php" class="text-reset"> << ย้อนกลับไปหน้าที่แล้ว </a> </h6>
 <?php
} else{
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

<script >
function clo(pp) {
  var music = pp;
  var sound = new Audio();
  sound.src = '../../../sound/word/chackin/' + music;
  if (sound.paused) {
    sound.play();
  } else {
    sound.currentTime = 0
  }
}
function playSound(pp){
  var audios = document.getElementsByTagName('audio');
  for(var i = 0, len = audios.length; i < len;i++){
    if(audios[i].id == "sound" + pp){
        audios[i].play();
        if (audios[i].paused) {
        audios[i].play();
        }else{
            audios[i].currentTime = 0
        }
    }
  }
}
document.addEventListener('play', function(e){
    var audios = document.getElementsByTagName('audio');
    for(var i = 0, len = audios.length; i < len;i++){
        if(audios[i] != e.target){
            audios[i].pause();
            audios[i].currentTime = 0;
        }
    }
}, true);

</script>

<style>
.table {
  font-size: 18px;
}
.link {
  font-size: 18px;
}
.btn {
  color: white;
  background-color: #AE0F0F;
  width: 80%;
  text-align: left;
}  
.word {
  height: 65px;
  padding: 13px; 
  word-spacing: 0.5cm; 
  font-size: 20px;
}
.gu {
  text-align: center;
}
.table-responsive {
  height: 800px;
  overflow: scroll;
}
.colo {
  background-color: #7e1f35;
}
.text {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
@media (max-width: 575.98px) {
  .text {
    letter-spacing: 1px;
  }
  .table {
    font-size: 16px;
  }
}
.thead {
  background-color:  #660223;
  color: white;
}
.ta {
  color: white;
}
.yall{
  color: #FAB665;
  font-size: 20px;
}
.backLink {
  margin: 20px 0;
  text-align: center;
}
.text-reset {
  font-size: 18px;
}
</style>