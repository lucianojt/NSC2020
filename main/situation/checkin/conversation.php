<?php 
session_start();
ob_start();
if(isset($_COOKIE["user"])){
include("../../../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
date_default_timezone_set('Asia/Bangkok');
$ChecInCon_Din = date("d-m-Y");
$ChecInCon_Tin = date("H:i:s");

$_SESSION["ChecInCon_Din"] = $ChecInCon_Din;
$_SESSION["ChecInCon_Tin"] = $ChecInCon_Tin;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>บทสนทนา: การเช็คอิน</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">
    <script type="text/javascript" src="../../../jquery-3.4.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <link rel="icon" href="../../../images/logoPJ.png" >
  </head>
  <body>
 <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="../../../home/index.php">CHINY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
          <a class="nav-link" href="../../../main/situation.php">สถานการณ์ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../../../main/gramma.php">ไวยากรณ์</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../../../main/conclude.php">ผลสรุป</a>
      </li>
      </ul>
      <a class="nav-link" href="../../../logout.php">ออกจากระบบ</a>
    </div>
  </nav>
   <div class="text"><p>บทสนทนา: การเช็คอิน</p></div>

   <div class="container">
   <div class="link">
   <h5><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="checkin.php" class="text-reset">การเช็คอิน</a> > บทสนทนา</h5>
   </div>
   </div><br>
    <div class="container">
    <div class="ges">G = Guest แขก<p>R = Receptionist พนักงานต้อนรับ</p></div>

<?php
 $sql = "SELECT* FROM con_Topic WHERE topic = 'checkin' ";
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
      <?php
      $sql2 = "SELECT* FROM Colo_con_simDa WHERE con_id = ".$row['con_id']." AND name = 'checkin' ";
      $result2 = mysqli_query($connection,$sql2);
      ?> 
      <div class="detail">
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
            <div class="col-1">
              <?php echo $row2['con_spe']." :"; ?>
              </div>
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
              <source src="../../../sound/conver/checkin/<?php echo $row['con_sound'];?>" type="audio/mpeg">
          </audio>
      </div>
    </div>
<br>
     <?php
  }
 }
?>
</div>
  <div class="backLink"><h6><a href="checkin.php" class="text-reset"> << ย้อนกลับไปหน้าที่แล้ว </a> </h6>

<!-- ปิด cookie -->
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

<style>
body {
  background: #FFEEEB;
}
.nav-link {
  color: black;
}
.navbar{
  background-color: #e4cbd3 !important;
  font-size: 18px;
}
.active {
  transition: opacity 0.2s;
}
.navbar-collapse:hover .active:not(:hover) {
  opacity: 0.5;
}
.detail{
  width: 100%;
  height: 400px;
  border-radius: 20px;
  padding: 10px;
  overflow: scroll;
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
.crop {

}
.text {
  padding: 16px 0 0;
  letter-spacing: 1px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.ges{
  font-size: 20px;
  color: #1A2A73;
  font-weight: bold;
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
.backLink {
  margin: 20px 0;
  text-align: center;
}
.text-reset {
  font-size: 18px;
}
</style>