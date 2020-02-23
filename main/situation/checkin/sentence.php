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
    .btn:hover {
  background-color: #941414;
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

   
    </style>
   
   <!-- start -->
   
   <div class="text"><h3>การเช็คอิน</h3></div><br>
   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="checkin.php" class="text-reset">เช็คอิน</a> > ประโยค </h6>
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
    <br><br>
    <a class="btn" href="Payment.php" role="button">
    <div class="word">
    <img src="../../../images/situation/pay.png" style="width: 40px; height: 40px;">
    ชำระเงิน
    </div>
    </a>
    <br><br>
    <a class="btn" href="other.php" role="button">
    <div class="word">
    <img src="../../../images/situation/other.png" style="width: 40px; height: 40px;">
    อื่นๆ
    </div>
    </a>
    <br><br>
    
    
    
    </div>
    </div>
   
    <br>
    <div class="text-center" style="color: red;"><h6><a href="checkin.php" class="text-reset"> << ย้อนกลับไปหน้าที่แล้ว </a> </h6></div>
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