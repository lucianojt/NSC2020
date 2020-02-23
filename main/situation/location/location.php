<?php 
session_start();
ob_start();
if(isset($_COOKIE["user"])){
include("../../../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
$user = $_SESSION["username_user"];
$code = $_SESSION["pincode"];

// check score ของ score_data ถ้ามีการทำแบบทดสอบจะเข้า Problem ได้
$sql11 = "SELECT * FROM scoreData WHERE user_usr = '$user' AND code = '$code' AND score_data >=6 ";
$result11 = mysqli_query($connection,$sql11);
$row11 = mysqli_fetch_assoc($result11);    
if(!$row11){ 
    header("location:../../situation.php"); 
}else{
date_default_timezone_set('Asia/Bangkok');
$location_Dout = date("d-m-Y");
$location_Tout = date("H:i:s");
$_SESSION["location_Dout"] = $location_Dout;
$_SESSION["location_Tout"] = $location_Tout;
$Dlocation_Dout = $_SESSION["location_Dout"];
$Dlocation_Tout = $_SESSION["location_Tout"];

//เวลาของ LocationWord
if(isset($_SESSION["LocaWord_Tin"])){
    $loWor_Din = $_SESSION["LocaWord_Din"];
    $loWor_Tin = $_SESSION["LocaWord_Tin"];
    function loWor($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = loWor("$loWor_Din $loWor_Tin","$Dlocation_Dout $Dlocation_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '19'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '19' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["LocaWord_Din"]);
    unset($_SESSION["LocaWord_Tin"]);
    //var_dump($_SESSION);
}
//เวลาของ LocationSentence
if(isset($_SESSION["LocationSenten_Tin"])){
    $loSen_Din = $_SESSION["LocationSenten_Din"];
    $loSen_Tin = $_SESSION["LocationSenten_Tin"];
    function loSen($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = loSen("$loSen_Din $loSen_Tin","$Dlocation_Dout $Dlocation_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '20'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '20' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["LocationSenten_Din"]);
    unset($_SESSION["LocationSenten_Tin"]);
    //var_dump($_SESSION);
}
//เวลาของ LocationConver
if(isset($_SESSION["LocationCon_Tin"])){
    $loCon_Din = $_SESSION["LocationCon_Din"];
    $loCon_Tin = $_SESSION["LocationCon_Tin"];
    function loCon($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = loCon("$loCon_Din $loCon_Tin","$Dlocation_Dout $Dlocation_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '21'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '21' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["LocationCon_Din"]);
    unset($_SESSION["LocationCon_Tin"]);
    //var_dump($_SESSION);
}




unset($_SESSION["location_Dout"]);
unset($_SESSION["location_Tout"]);


?>
<!doctype html>
<html lang="en">
  <head>
    <title>การสอบถามตำแหน่งสถานที่ </title>
    <?php include("../headU.php"); ?>

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
  .nav-link{
        color: white;
    }
    .navbar-toggler{
        border-color: rgb(255,102,203);
    }
    .navbar-toggler-icon{
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,102,203, 0.7)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }
   
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
   .gu{
    text-align: center;
    /* padding-left: 10px; */
   }
   .text{
    text-align: center;
    background-image: url('../../../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px; 
   } 

   .btn:hover {
  background-color: #941414;
   }
    </style>
   
   <!-- start -->
   
   <div class="text"><h3>การสอบถามตำแหน่งสถานที่ และบริการเรียกรถแท็กซี่</h3></div><br>

   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > การสอบถามตำแหน่งสถานที่ และบริการเรียกรถแท็กซี่</h6>
   </div>
   
   </div>
   
   <div class="gu">
    <br><div class="container">
   
    
    <!-- <br> -->
    <a class="btn" href="word.php" role="button">
    <div class="word">
    <img src="../../../images/situation/word.png" style="width: 40px; height: 40px;">
    คำศัพท์
    </div>
    </a>
    <br><br>
    <a class="btn" href="sentence.php" role="button">
    <div class="word">
    <img src="../../../images/situation/senten.png" style="width: 40px; height: 40px;">
    ประโยค
    </div>
    </a>
    <br><br>
    <a class="btn" href="conversation.php" role="button">
    <div class="word">
    <img src="../../../images/situation/conver.png" style="width: 40px; height: 40px;">
    บทสนทนา
    </div>
    </a>
    <br><br>
    <a class="btn" href="exer_location.php" role="button">
    <div class="word">
    <img src="../../../images/situation/test.png" style="width: 40px; height: 40px;">
    แบบฝึกหัด
    </div>
    </a>
    
    
    
    </div>
    </div>
   
    <br>
    <div class="text-center" style="color: red;"><h6><a href="../../situation.php" class="text-reset"> << กลับไปหน้าสถานการณ์ </a> </h6></div>
    <!-- ปิด cookie -->

<?php
// check คะแนน
}
// check $_COOKIE["user"]
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