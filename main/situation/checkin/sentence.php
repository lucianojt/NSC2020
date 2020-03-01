<?php
session_start();
ob_start();
if(isset($_COOKIE["user"])){
include("../../../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

date_default_timezone_set('Asia/Bangkok');
$checkSen_Dout = date("d-m-Y");
$checkSen_Tout = date("H:i:s");
$_SESSION["checkSen_Dout"] = $checkSen_Dout;
$_SESSION["checkSen_Tout"] = $checkSen_Tout;
$DcheckSen_Dout = $_SESSION["checkSen_Dout"];
$DcheckSen_Tout = $_SESSION["checkSen_Tout"];
$user = $_SESSION["username_user"];
$code = $_SESSION["pincode"];

//เวลาของ CheckinSentenceIn
if(isset($_SESSION["ChecSenIn_Tin"])){
    $DDcheInS_Din = $_SESSION["ChecSenIn_Din"];
    $DDcheInS_Tin = $_SESSION["ChecSenIn_Tin"];
    function DDcheInS($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = DDcheInS("$DDcheInS_Din $DDcheInS_Tin","$DcheckSen_Dout $DcheckSen_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
  
   
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '11'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '11' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ChecSenIn_Din"]);
    unset($_SESSION["ChecSenIn_Tin"]);
    //var_dump($_SESSION);
}
//เวลาของ CheckinSentencePay
if(isset($_SESSION["ChecSenPay_Tin"])){
    $DDchePayS_Din = $_SESSION["ChecSenPay_Din"];
    $DDchePayS_Tin = $_SESSION["ChecSenPay_Tin"];
    function DDchePayS($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = DDchePayS("$DDchePayS_Din $DDchePayS_Tin","$DcheckSen_Dout $DcheckSen_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '11'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '11' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ChecSenPay_Din"]);
    unset($_SESSION["ChecSenPay_Tin"]);
    //var_dump($_SESSION);
}
//เวลาของ CheckinSentenceOther
if(isset($_SESSION["ChecSenOther_Tin"])){
    $DDcheOtheS_Din = $_SESSION["ChecSenOther_Din"];
    $DDcheOtheS_Tin = $_SESSION["ChecSenOther_Tin"];
    function DDcheOtheS($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = DDcheOtheS("$DDcheOtheS_Din $DDcheOtheS_Tin","$DcheckSen_Dout $DcheckSen_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '11'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '11' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ChecSenOther_Din"]);
    unset($_SESSION["ChecSenOther_Tin"]);
    //var_dump($_SESSION);
}

unset($_SESSION["checkSen_Dout"]);
unset($_SESSION["checkSen_Tout"]);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>การเช็คอิน</title>
    <?php include("../headU.php"); ?>
   
   <!-- start -->
   
   <div class="text"><p>การเช็คอิน</p></div>
   <div class="container">
   <div class="link">
   <h5><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="checkin.php" class="text-reset">เช็คอิน</a> > ประโยค </h5>
   </div>
   
   </div>
   
   <div class="gu">
    <br><div class="container">
   
    
    <!-- <br> -->
    <a class="btn" href="Check.php" role="button">
    <div class="word">
    <img src="../../../images/situation/domain.png" style="width: 40px; height: 40px;">
    การลงทะเบียนเข้าพัก
    </div>
    </a>
    <a class="btn" href="Payment.php" role="button">
    <div class="word">
    <img src="../../../images/situation/pay.png" style="width: 40px; height: 40px;">
    ชำระเงิน
    </div>
    </a>
    <a class="btn" href="other.php" role="button">
    <div class="word">
    <img src="../../../images/situation/other.png" style="width: 40px; height: 40px;">
    อื่นๆ
    </div>
    </a>
    </div>
    </div>
   
  <div class="backLink"><h6><a href="checkin.php" class="text-reset"> << ย้อนกลับไปหน้าที่แล้ว </a> </h6>
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
.btn {
  color: white;
  margin: 8px 0;
  background-color: #7e1f35;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  width: 80%;
  text-align: left;
  position: relative;
}
.btn:hover {
  background-color: #551524;
  color: white;
  animation-name: example;
  animation-duration: 0.6s;
}
@keyframes example {
  0% {
    left: 0%;
  }
  50% {
    left: 2%;
  }
  75% {
    left: -2%;
  }
  100% {
    left: 0%;
  }
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
.text {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.backLink {
  margin: 20px 0;
  text-align: center;
}
.text-reset {
  font-size: 18px;
}
@media (max-width: 575.98px) {
  .btn {
    width: 100%;
  }
}
</style>