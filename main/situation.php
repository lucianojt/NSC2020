<?php 
session_start();
ob_start();
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

if(isset($_COOKIE["user"])){
// เวลาออก
date_default_timezone_set('Asia/Bangkok');
$Situa_Dout = date("d-m-Y");
$Situa_Tout = date("H:i:s");


$_SESSION["Situa_Dout"] = $Situa_Dout;
$_SESSION["Situa_Tout"] = $Situa_Tout;

$Sit_Dout = $_SESSION["Situa_Dout"];
$Sit_Tout = $_SESSION["Situa_Tout"];

$user = $_SESSION["username_user"];
$code = $_SESSION["pincode"];

//สิ้นสุดเวลาออก
//เวลาของ wordSim
if(isset($_SESSION["SimWord_Tin"])){
    $Word_Din = $_SESSION["SimWord_Din"];
    $Word_Tin = $_SESSION["SimWord_Tin"];
    function Word($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = Word("$Word_Din $Word_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}

//เวลาของ SimSentence
if(isset($_SESSION["SimSentence_Tin"])){
    $Sentence_Din = $_SESSION["SimSentence_Din"];
    $Sentence_Tin = $_SESSION["SimSentence_Tin"];
    function Word($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = Word("$Sentence_Din $Sentence_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}
//เวลาของ SimConver
if(isset($_SESSION["SimConver_Tin"])){
    $Conver_Din = $_SESSION["SimConver_Din"];
    $Conver_Tin = $_SESSION["SimConver_Tin"];
    function Word($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = Word("$Conver_Din $Conver_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}

//เวลาของ ReserveWord
if(isset($_SESSION["ReserveWord_Tin"])){
    $ReWor_Din = $_SESSION["ReserveWord_Din"];
    $ReWor_Tin = $_SESSION["ReserveWord_Tin"];
    function ReWor($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = ReWor("$ReWor_Din $ReWor_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '4'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '4' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ReserveWord_Din"]);
    unset($_SESSION["ReserveWord_Tin"]);

   // var_dump($_SESSION);
}

//เวลาของ ReserveSentence
if(isset($_SESSION["ReserveSentence_Tin"])){
    $ReSen_Din = $_SESSION["ReserveSentence_Din"];
    $ReSen_Tin = $_SESSION["ReserveSentence_Tin"];
    function ReSen($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = ReSen("$ReSen_Din $ReSen_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '5'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '5' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ReserveSentence_Din"]);
    unset($_SESSION["ReserveSentence_Tin"]);

   // var_dump($_SESSION);
}

//เวลาของ ReserveConver
if(isset($_SESSION["ReserveCon_Tin"])){
    $ReCon_Din = $_SESSION["ReserveCon_Din"];
    $ReCon_Tin = $_SESSION["ReserveCon_Tin"];
    function ReCon($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = ReCon("$ReCon_Din $ReCon_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '6'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '6' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ReserveCon_Din"]);
    unset($_SESSION["ReserveCon_Tin"]);

   // var_dump($_SESSION);
}

//เวลาของ DetailWord
if(isset($_SESSION["DetailWord_Tin"])){
    $DetaiWor_Din = $_SESSION["DetailWord_Din"];
    $DetaiWor_Tin = $_SESSION["DetailWord_Tin"];
    function DetaiWor($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DetaiWor("$DetaiWor_Din $DetaiWor_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '7'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '7' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["DetailWord_Din"]);
    unset($_SESSION["DetailWord_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ DetailSentenceRoom
if(isset($_SESSION["DetailSenDe_Tin"])){
    $DeSeDe_Din = $_SESSION["DetailSenDe_Din"];
    $DeSeDe_Tin = $_SESSION["DetailSenDe_Tin"];
    function DeSeDe($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DeSeDe("$DeSeDe_Din $DeSeDe_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}
//เวลาของ DetailSentenceRate
if(isset($_SESSION["DetailSenRate_Tin"])){
    $DeSeRate_Din = $_SESSION["DetailSenRate_Din"];
    $DeSeRate_Tin = $_SESSION["DetailSenRate_Tin"];
    function DeSeRate($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DeSeRate("$DeSeRate_Din $DeSeRate_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}
//เวลาของ DetailSentenceDay
if(isset($_SESSION["DetailSenDay_Tin"])){
    $DeSeDay_Din = $_SESSION["DetailSenDay_Din"];
    $DeSeDay_Tin = $_SESSION["DetailSenDay_Tin"];
    function DeSeDay($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1); 
    }   
    $sum = DeSeDay("$DeSeDay_Din $DeSeDay_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}
//เวลาของ DetailSentenceSugge
if(isset($_SESSION["DetailSenSugge_Tin"])){
    $DeSeSugge_Din = $_SESSION["DetailSenSugge_Din"];
    $DeSeSugge_Tin = $_SESSION["DetailSenSugge_Tin"];
    function DeSeSugge($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1); 
    }   
    $sum = DeSeSugge("$DeSeSugge_Din $DeSeSugge_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}

//เวลาของ DetailConver
if(isset($_SESSION["DetailCon_Tin"])){
    $DetaiCon_Din = $_SESSION["DetailCon_Din"];
    $DetaiCon_Tin = $_SESSION["DetailCon_Tin"];
    function DetaiCon($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DetaiCon("$DetaiCon_Din $DetaiCon_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '9'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '9' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["DetailCon_Din"]);
    unset($_SESSION["DetailCon_Tin"]);

   // var_dump($_SESSION);
}

//เวลาของ CheckinWord
if(isset($_SESSION["ChecInWord_Tin"])){
    $InWor_Din = $_SESSION["ChecInWord_Din"];
    $InWor_Tin = $_SESSION["ChecInWord_Tin"];
    function InWor($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = InWor("$InWor_Din $InWor_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '10'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '10' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ChecInWord_Din"]);
    unset($_SESSION["ChecInWord_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ CheckinSentenceIn
if(isset($_SESSION["ChecSenIn_Tin"])){
    $DDcheInS_Din = $_SESSION["ChecSenIn_Din"];
    $DDcheInS_Tin = $_SESSION["ChecSenIn_Tin"];
    function DDcheInS($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DDcheInS("$DDcheInS_Din $DDcheInS_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}
//เวลาของ CheckinSentencePay
if(isset($_SESSION["ChecSenPay_Tin"])){
    $DDchePayS_Din = $_SESSION["ChecSenPay_Din"];
    $DDchePayS_Tin = $_SESSION["ChecSenPay_Tin"];
    function DDchePayS($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DDchePayS("$DDchePayS_Din $DDchePayS_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}
//เวลาของ CheckinSentenceOther
if(isset($_SESSION["ChecSenOther_Tin"])){
    $DDcheOtheS_Din = $_SESSION["ChecSenOther_Din"];
    $DDcheOtheS_Tin = $_SESSION["ChecSenOther_Tin"];
    function DDcheOtheS($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DDcheOtheS("$DDcheOtheS_Din $DDcheOtheS_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}
//เวลาของ CheckinConver
if(isset($_SESSION["ChecInCon_Tin"])){
    $InCon_Din = $_SESSION["ChecInCon_Din"];
    $InCon_Tin = $_SESSION["ChecInCon_Tin"];
    function InCon($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = InCon("$InCon_Din $InCon_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '12'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '12' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ChecInCon_Din"]);
    unset($_SESSION["ChecInCon_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ ProblemWord
if(isset($_SESSION["ProblemWord_Tin"])){
    $ProWor_Din = $_SESSION["ProblemWord_Din"];
    $ProWor_Tin = $_SESSION["ProblemWord_Tin"];
    function ProWor($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = ProWor("$ProWor_Din $ProWor_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '13'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '13' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ProblemWord_Din"]);
    unset($_SESSION["ProblemWord_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ ProblemSentence
if(isset($_SESSION["ProblemSenten_Tin"])){
    $ProSen_Din = $_SESSION["ProblemSenten_Din"];
    $ProSen_Tin = $_SESSION["ProblemSenten_Tin"];
    function ProSen($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = ProSen("$ProSen_Din $ProSen_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '14'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '14' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ProblemSenten_Din"]);
    unset($_SESSION["ProblemSenten_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ ProblemConver
if(isset($_SESSION["ProblemCon_Tin"])){
    $ProCon_Din = $_SESSION["ProblemCon_Din"];
    $ProCon_Tin = $_SESSION["ProblemCon_Tin"];
    function ProCon($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = ProCon("$ProCon_Din $ProCon_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '15'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '15' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["ProblemCon_Din"]);
    unset($_SESSION["ProblemCon_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ DataWord
if(isset($_SESSION["DataWord_Tin"])){
    $DaWor_Din = $_SESSION["DataWord_Din"];
    $DaWor_Tin = $_SESSION["DataWord_Tin"];
    function DaWor($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DaWor("$DaWor_Din $DaWor_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '16'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '16' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["DataWord_Din"]);
    unset($_SESSION["DataWord_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ DataSentenced
if(isset($_SESSION["DataSenten_Tin"])){
    $DaSen_Din = $_SESSION["DataSenten_Din"];
    $DaSen_Tin = $_SESSION["DataSenten_Tin"];
    function DaSen($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DaSen("$DaSen_Din $DaSen_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '17'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '17' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["DataSenten_Din"]);
    unset($_SESSION["DataSenten_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ DataConver
if(isset($_SESSION["DataCon_Tin"])){
    $DaCon_Din = $_SESSION["DataCon_Din"];
    $DaCon_Tin = $_SESSION["DataCon_Tin"];
    function DaCon($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DaCon("$DaCon_Din $DaCon_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '18'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '18' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["DataCon_Din"]);
    unset($_SESSION["DataCon_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ LocationWord
if(isset($_SESSION["LocaWord_Tin"])){
    $loWor_Din = $_SESSION["LocaWord_Din"];
    $loWor_Tin = $_SESSION["LocaWord_Tin"];
    function loWor($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = loWor("$loWor_Din $loWor_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}
//เวลาของ LocationSentence
if(isset($_SESSION["LocationSenten_Tin"])){
    $loSen_Din = $_SESSION["LocationSenten_Din"];
    $loSen_Tin = $_SESSION["LocationSenten_Tin"];
    function loSen($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = loSen("$loSen_Din $loSen_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}
//เวลาของ LocationConver
if(isset($_SESSION["LocationCon_Tin"])){
    $loCon_Din = $_SESSION["LocationCon_Din"];
    $loCon_Tin = $_SESSION["LocationCon_Tin"];
    function loCon($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = loCon("$loCon_Din $loCon_Tin","$Sit_Dout $Sit_Tout");
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

   // var_dump($_SESSION);
}
//เวลาของ OutWord
if(isset($_SESSION["OutWord_Tin"])){
    $OWor_Din = $_SESSION["OutWord_Din"];
    $OWor_Tin = $_SESSION["OutWord_Tin"];
    function OWor($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = OWor("$OWor_Din $OWor_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '22'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '22' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["OutWord_Din"]);
    unset($_SESSION["OutWord_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ OutSentence
if(isset($_SESSION["OutSenten_Tin"])){
    $OSen_Din = $_SESSION["OutSenten_Din"];
    $OSen_Tin = $_SESSION["OutSenten_Tin"];
    function OSen($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = OSen("$OSen_Din $OSen_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '23'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '23' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["OutSenten_Din"]);
    unset($_SESSION["OutSenten_Tin"]);

   // var_dump($_SESSION);
}
//เวลาของ OutConver
if(isset($_SESSION["OutCon_Tin"])){
    $OCon_Din = $_SESSION["OutCon_Din"];
    $OCon_Tin = $_SESSION["OutCon_Tin"];
    function OCon($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = OCon("$OCon_Din $OCon_Tin","$Sit_Dout $Sit_Tout");
    if($sum >= 3600){
        $sum = 3600;
    }    
    $sqlSele = "SELECT time FROM LessonTimeNew WHERE code = '$code' AND user_usr = '$user' AND id_detail = '24'";
    $resultSele = mysqli_query($connection,$sqlSele);
    if( $resultSele == TRUE){
       
         $rowSele = mysqli_fetch_assoc($resultSele);  
         $rowSele['time'] = $rowSele['time'] +  $sum ;

         $ti =  $rowSele['time'];
         $sqlSele = "UPDATE LessonTimeNew SET time = '$ti' WHERE id_detail = '24' AND code = '$code' AND user_usr = '$user'  ";
         $resultSele = mysqli_query($connection,$sqlSele);
    }
    unset($_SESSION["OutCon_Din"]);
    unset($_SESSION["OutCon_Tin"]);

   // var_dump($_SESSION);
}


unset($_SESSION["Situa_Dout"]);
unset($_SESSION["Situa_Tout"]);

//var_dump($_SESSION);
?>
<?php

?>
<!doctype html>
<html lang="en">
  <head>
    <title>สถานการณ์</title>
    <?php include("headU.php"); ?>
<div class="text"><p>สถานการณ์</p></div>
  <div class="container" >
    <p class="linkPage" style="margin: 20px 0"><a href="../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="situation.php" class="text-reset">สถานการณ์ </a></p>
  </div>
<div class="container">
 </div>
<?php 
$use =  $_SESSION["username_user"];
?>
<div class="container">
  <p class="fisrtT">สถานการณ์เริ่มต้น</p>
  <div class="aa"> 
    <a href="situation/checkin/checkin.php" class="card">
    <div>
      <img src="../images/checkin.png" height="60" width="60" >
    </div><br>
    เช็คอิน
    </a>
    
    <?php 
    $sql2 = "SELECT * FROM scoreCheckin WHERE user_usr = '$use' AND code = '$code' AND score_checkin >= 8 ";
    $result2 = mysqli_query($connection,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    if(!$row2){
        ?>
            <button type="button" style="cursor: no-drop;" data-toggle="modal" data-target="#myModal" class="bb">
            <div>
            <img src="../images/check-in.png" height="60" width="60" >
            </div><br>
            การแจ้งออกจากโรงแรม (เช็คเอาท์)
            </button>
        <?php
    }else{
        ?>
            <a href="situation/out/out.php" class="card">
            <div>
            <img src="../images/check-in.png" height="60" width="60" >
            </div><br>
            การแจ้งออกจากโรงแรม (เช็คเอาท์)
            </a>
        <?php
    }
    ?>
  </div>
  <p class="fisrtT">สถานการณ์ถัดไป</p>
  <div class="aa">     
      
      <button type="button" style="cursor: no-drop;" data-toggle="modal" data-target="#myModal" class="bb">
      <div>
      <img src="../images/basic.png" height="60" width="60" >
      </div><br>
      ประโยคที่ใช้ในชีวิตประจำวัน
      </button>

      <button type="button" style="cursor: no-drop;" data-toggle="modal" data-target="#myModal"  class="bb">
          <div>
          <img src="../images/resev.png" height="60" width="60" >
          </div><br>
          การจองห้องพัก
          </button>

          <button type="button" style="cursor: no-drop;" data-toggle="modal" data-target="#myModal"  class="bb">
          <div>
          <img src="../images/room.png" height="60" width="60" >
          </div><br>
          รายละเอียดของห้องพัก
          </button>
          <button type="button" style="cursor: no-drop;" data-toggle="modal" data-target="#myModal"  class="bb">
          <div>
          <img src="../images/hotel.png" height="60" width="60" >
          </div><br>
          แนะนำบริการต่างๆ ของโรงแรม
          </button>


          <button type="button" style="cursor: no-drop;" data-toggle="modal" data-target="#myModal" class="bb">
          <div>
          <img src="../images/problem.png" height="60" width="60" >
          </div><br>
          ปัญหาระหว่างการเข้าพัก
          </button>

          <button type="button" style="cursor: no-drop;" data-toggle="modal" data-target="#myModal" class="bb">
          <div>
          <img src="../images/data.png" height="60" width="60" >
          </div><br>
          การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม
          </button>

          <button type="button" style="cursor: no-drop;" data-toggle="modal" data-target="#myModal" class="bb">
          <div>
          <img src="../images/question.png" height="60" width="60" >
          </div><br>
          การสอบถามตำแหน่งสถานที่ และ บริการเรียกรถแท็กซี่
          </button>
  </div>
</div>

  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header">
            <p class="warnmimg">คำเตือน !</p>
        <h4 class="modal-title"></h4>
        </div>
          <p class="stuation" >ขออภัยสถานการณ์นี้ยังไม่เปิด</p>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="javascript:window.close()">ปิด</button>
        </div>
      </div>
    </div>
  </div>


</div>
<!-- ปิด cookie -->

<?php
 } else{
    header("location:../logout.php");
}

include('../footer.php');
ob_end_flush();
?>
<style>
@media (max-width: 575.98px) {
  .card {
   padding: 14px 0;
  }
}
.material-icons {
  position: absolute;
}
@media (max-width: 575.98px) {
  .text-reset {
    font-size: 17px;
  }
  .text {
    letter-spacing: 2px;
    font-size: 30px;
  }
}
.fisrtT {
  margin: 20px 0;
  padding: 4px 0;
  font-size: 22px;
  text-align: left;
}
.text {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.aa {
  font-size: 18px;
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  grid-row-gap: 1rem;
  grid-column-gap: 2rem;
}
.card {
  position: static;
  padding: 20px;
  background: #7e1f35;
  text-align: center;
  color: white;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.card:hover {
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
.bb {
  color: white;
  border: none;
  cursor: no-drop;
  background-color: #824D5A;
  padding: 20px 9px;
  border-radius: 4px;
  text-align: center;
  cursor: pointer;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.modal-content {
  margin-top: 50%;
  text-align: center;
}
.modal-header {
  text-align: center;
}
.modal-content {
  border-radius: 8px;
}
.warnmimg {
  border-top-left-radius: 8px;
  border-top-right-radius: 8px;
  background: #562535;
  color: white;
  padding: 12px 0;
  font-size: 30px;
}
.modal-footer {
  padding: 10px;
}
.btn-warning {
  width: 82px;
}
.stuation {
  font-size: 20px;
  padding: 12px 0;
}
.linkPage {
  font-size: 20px;
}
</style>