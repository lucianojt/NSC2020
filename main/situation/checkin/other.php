
<?php 
session_start();
ob_start();
if(isset($_COOKIE["user"])){
include("../../../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
date_default_timezone_set('Asia/Bangkok');
$ChecSenOther_Din = date("d-m-Y");
$ChecSenOther_Tin = date("H:i:s");

$_SESSION["ChecSenOther_Din"] = $ChecSenOther_Din;
$_SESSION["ChecSenOther_Tin"] = $ChecSenOther_Tin;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ประโยค: อื่นๆ</title>
    <?php include("../headU.php"); ?>   
   <div class="text"><p>ประโยค: อื่นๆ</p></div>
   <div class="container">
  
   <div class="link">
    <h5><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="sentence.php" class="text-reset">รายละเอียดของห้องพัก</a> > อื่นๆ</h5>
  </div>


   </div>
   <br>
   <div class="container w3-row" >
   <?php 
    $sql = "SELECT* FROM ts_topiccheck WHERE tr_id = '4C' ";
    $result = mysqli_query($connection,$sql);
    if(!$result){
        echo'cannot contact database';
    }else{
         $mu = 1;
        while($row = mysqli_fetch_assoc($result)){
            ?> 
            <div class="main">
            <p><?php echo$row['name'];?></p>
            </div> 
            <?php
            $sql2 = "SELECT* FROM test1 WHERE topic = '".$row['name']."'  ";
            $result2 = mysqli_query($connection,$sql2);  
           if(!$result2 ){
               echo 'เกิดข้อผิดพลาดด้าน DB';
             
           }
            echo '<div class="aa">';
           
            while($row2 = mysqli_fetch_assoc($result2)){ 

                $cutthai = explode(";",$row2['sen_th']); 
                $cuten = explode(";",$row2['sen_en']); 

                $colorthai = explode(";",$row2['colo_th']); 
                $coloren = explode(";",$row2['colo_ch']); 

                $nunTHAI = count($cutthai);
                $nunEN = count($cuten);

                $CTHAI = count($colorthai);
                $CEN = count($coloren);
            ?> 
                <div class="card">
                <?php  
                for($i=0;$i<$nunTHAI;$i++){
                    echo  ' <span class="colorWord" style="background-color: '.$colorthai[$i].' ;"> '.$cutthai[$i].'</span>';
                 }   echo '<br>';
                 echo '<p class="chiWord" >'.$row2['sen_ch'].'</p>';
                 for($i=0;$i<$nunEN;$i++){
                    echo  ' <span class="colorWord" style="background-color: '.$coloren[$i].' ;"> '.$cuten[$i].'</span>';
                 } 
                ?><br>
                <?php
                $inpi = $row2['sen_sound'];
                ?>
                <audio id="sound<?php echo $mu; ?>" src="../../../sound/sentence/checkin/other/<?php echo $inpi; ?>"></audio>

                <a onclick="playSound(<?php echo $mu; ?>)" class="ml-auto"><img class="loundSpeaker" src="../../../images/loundspeaker.png" style="width:35px; cursor: pointer;"></a>
                </div>
           
            <?php
          $mu++;
            }
            echo '</div><br>';
        }
        mysqli_close($connection); 
    }
?>
   </div>
  <div class="backLink"><h6><a href="sentence.php" class="text-reset"> << ย้อนกลับไปหน้าที่แล้ว </a> </h6>
  <?php
} else {
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
<script type="text/javascript">
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
.btn {
  color: white;
  background-color: #AE0F0F;
  width: 80%;
  text-align: left;
}  
.word{
  height: 65px;
  padding: 13px; 
  word-spacing: 0.5cm; 
  font-size: 20px;
}    
.aa {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  grid-row-gap: 2rem;
  grid-column-gap: 2rem;
}
.text {
  padding: 16px 0 0;
  letter-spacing: 1px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.main{
  font-size: 27px;
}
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  position: inherit;
  padding: 2rem;
  border: 1px solid rgb(210, 210, 210);
  text-align: center;
  border-radius: 20px;
  display: inline;
  height: fit-content;
}
.colorWord {
  border-radius: 6px;
  padding-left: 4px;
  padding-right: 4px;
}
.loundSpeaker {
  margin-top: 7px;
  margin-left: 86%;
}
.chiWord{
  margin-top: 11px;
  margin-bottom: 11px;
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
    font-size: 28px;
    letter-spacing: 0px;
  }
}
</style>