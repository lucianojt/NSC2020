<?php
ob_start();
session_start();
// include("database/database.php"); 
// $connection = mysqli_connect($localhost,$username,$pass,$database);
// // mysqli_set_charset($connection,'utf8');
// date_default_timezone_set('Asia/Bangkok');
// $day_out = date("d-m-Y");
// $time_out = date("H:i:s");


// $dayIn = $_SESSION["day"];
// $timIn = $_SESSION["time"];
// $namH =  $_SESSION["username_hr"];
// $room = $_SESSION["code"] ;

// echo $dayIn."  ".$timIn;

// $sql = "UPDATE ReTim 
// SET dayOut = '$day_out' , TmeOut = '$time_out'
// WHERE user_usr = '$namH' 
// AND code = '$room' 
// AND dayIn = '$dayIn'
// AND timeIn = '$timIn'";
// $result = mysqli_query($connection,$sql);
//     if($result==TRUE){
//         echo 'บันทึกเวลาออกได้';
        // unset($namH);
        // unset($room);
        // unset($dayIn);
        // unset($timIn);
        // session_destroy();
       
    // }else{
    //     echo 'บันทึกเวลาออกไม่ได้';
    // }


setcookie("minny","",time()-3600*5);
setcookie("hr","",time()-3600*5);
session_destroy();
header("location:login.php"); 
ob_end_flush();
?>