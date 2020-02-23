<?php
session_start();
ob_start();
if(isset($_COOKIE["user"])){
include("../../../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

date_default_timezone_set('Asia/Bangkok');
$Topic_Dout = date("d-m-Y");
$Topic_Tout = date("H:i:s");
$_SESSION["Topic_Dout"] = $Topic_Dout;
$_SESSION["Topic_Tout"] = $Topic_Tout;
$DTopic_Dout = $_SESSION["Topic_Dout"];
$DTopic_Tout = $_SESSION["Topic_Tout"];
$user = $_SESSION["username_user"];
$code = $_SESSION["pincode"];



//เวลาของ DetailSentenceRoom
if(isset($_SESSION["DetailSenDe_Tin"])){
    $DeSeDe_Din = $_SESSION["DetailSenDe_Din"];
    $DeSeDe_Tin = $_SESSION["DetailSenDe_Tin"];
    function DeSeDe($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = DeSeDe("$DeSeDe_Din $DeSeDe_Tin","$DTopic_Dout $DTopic_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '8'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '8' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["DetailSenDe_Din"]);
    unset($_SESSION["DetailSenDe_Tin"]);
    //var_dump($_SESSION);
}
//เวลาของ DetailSentenceRate
if(isset($_SESSION["DetailSenRate_Tin"])){
    $DeSeRate_Din = $_SESSION["DetailSenRate_Din"];
    $DeSeRate_Tin = $_SESSION["DetailSenRate_Tin"];
    function DeSeRate($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = DeSeRate("$DeSeRate_Din $DeSeRate_Tin","$DTopic_Dout $DTopic_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '8'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '8' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["DetailSenRate_Din"]);
    unset($_SESSION["DetailSenRate_Tin"]);
    //var_dump($_SESSION);
}
//เวลาของ DetailSentenceDay
if(isset($_SESSION["DetailSenDay_Tin"])){
    $DeSeDay_Din = $_SESSION["DetailSenDay_Din"];
    $DeSeDay_Tin = $_SESSION["DetailSenDay_Tin"];
    function DeSeDay($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = DeSeDay("$DeSeDay_Din $DeSeDay_Tin","$DTopic_Dout $DTopic_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '8'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '8' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["DetailSenDay_Din"]);
    unset($_SESSION["DetailSenDay_Tin"]);
    //var_dump($_SESSION);
}
//เวลาของ DetailSentenceSugge
if(isset($_SESSION["DetailSenSugge_Tin"])){
    $DeSeSugge_Din = $_SESSION["DetailSenSugge_Din"];
    $DeSeSugge_Tin = $_SESSION["DetailSenSugge_Tin"];
    function DeSeSugge($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = DeSeSugge("$DeSeSugge_Din $DeSeSugge_Tin","$DTopic_Dout $DTopic_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '8'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '8' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["DetailSenSugge_Din"]);
    unset($_SESSION["DetailSenSugge_Tin"]);
    //var_dump($_SESSION);
}

unset($_SESSION["Topic_Dout"]);
unset($_SESSION["Topic_Tout"]);

//var_dump($_SESSION);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>แนะนำโรงแรม</title>
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
    .btn:hover {
  background-color: #941414;
   }
    .word{
        height: 65px;
        padding: 13px; 
        word-spacing: 0.5cm; 
       font-size: 20px;
      
    }
    .btn:hover {
  background-color: #941414;
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
   
   <div class="text"><h3>แนะนำโรงแรม</h3></div><br>

   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="detail.php" class="text-reset">รายละเอียดของห้องพัก</a> > แนะนำโรงแรม </h6>
   </div>
   
   </div>
   
   <div class="gu">
    <br><div class="container">
   
    
    <!-- <br> -->
    <a class="btn" href="Room_details.php" role="button">
    <div class="word">
    <img src="../../../images/situation/suite.png" style="width: 40px; height: 40px;"> 
    รายละเอียดห้องพัก
    </div>
    </a>
    <br><br>
    <a class="btn" href="Room_rates.php" role="button">
    <div class="word">
     <img src="../../../images/situation/discount.png" style="width: 40px; height: 40px;"> 
    ราคาห้องพัก
    </div>
    </a>
    <br><br>
    <a class="btn" href="Stay.php" role="button">
    <div class="word">
     <img src="../../../images/situation/busi.png" style="width: 40px; height: 40px;"> 
    จำนวนวันที่เข้าพัก
    </div>
    </a>
    <br><br>
    <a class="btn" href="Recommend.php" role="button">
    <div class="word">
    <img src="../../../images/situation/network.png" style="width: 40px; height: 40px;">
    แนะนำโรงแรม
    </div>
    </a>
    
    
    
    </div>
    </div>
   
    <br>
    <div class="text-center" style="color: red;"><h6><a href="detail.php" class="text-reset"> << ย้อนกลับไปหน้าที่แล้ว </a> </h6></div>
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