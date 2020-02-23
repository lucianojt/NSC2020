<?php 
ob_start();
session_start();
include("../../../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
// if(!isset($_SESSION["SimWord_Tin"])){
//     $_SESSION["SimWord_Tin"] = 0;    
// }
// else {
//     var_dump($_SESSION["SimWord_Tin"]);
// }
if(isset($_COOKIE["user"])){
date_default_timezone_set('Asia/Bangkok');
$Sim_Dout = date("d-m-Y");
$Sim_Tout = date("H:i:s");
$_SESSION["Sim_Dout"] = $Sim_Dout;
$_SESSION["Sim_Tout"] = $Sim_Tout;
$S_Dout = $_SESSION["Sim_Dout"];
$S_Tout = $_SESSION["Sim_Tout"];
$user = $_SESSION["username_user"];
$code = $_SESSION["pincode"];

//เวลาของ wordSim
if(isset($_SESSION["SimWord_Tin"])){
$Word_Din = $_SESSION["SimWord_Din"];
$Word_Tin = $_SESSION["SimWord_Tin"];
function Word($strDateTime1,$strDateTime2){
return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
}      
$sum = Word("$Word_Din $Word_Tin","$S_Dout $S_Tout");
if($sum >= 3600){
    $sum = 3600;
}
$sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '1'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '1' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
unset($_SESSION["SimWord_Din"]);
unset($_SESSION["SimWord_Tin"]);
//var_dump($_SESSION);
}

//เวลาของ SimSentence
if(isset($_SESSION["SimSentence_Tin"])){
    $Sentence_Din = $_SESSION["SimSentence_Din"];
    $Sentence_Tin = $_SESSION["SimSentence_Tin"];
    function Word($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = Word("$Sentence_Din $Sentence_Tin","$S_Dout $S_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '2'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '2' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["SimSentence_Din"]);
    unset($_SESSION["SimSentence_Tin"]);
    //var_dump($_SESSION);
}

//เวลาของ SimConver
if(isset($_SESSION["SimConver_Tin"])){
    $Conver_Din = $_SESSION["SimConver_Din"];
    $Conver_Tin = $_SESSION["SimConver_Tin"];
    function Word($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }      
    $sum = Word("$Conver_Din $Conver_Tin","$S_Dout $S_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '3'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '3' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["SimConver_Din"]);
    unset($_SESSION["SimConver_Tin"]);
    //var_dump($_SESSION);
}
unset($_SESSION["Sim_Dout"]);
unset($_SESSION["Sim_Tout"]);

//var_dump($_SESSION);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>ประโยคในชีวิตประจำวัน</title>
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
   
   <div class="text"><h3>ประโยคในชีวิตประจำวัน</h3></div><br>

   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > ประโยคในชีวิตประจำวัน</h6>
   </div>
   
   </div>
   
   <div class="gu">
    <br><div class="container">
   
    <?php 
    ?>
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
    <a class="btn" href="exer_sim.php" role="button">
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