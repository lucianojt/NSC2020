<?php 
session_start();
ob_start();
if(isset($_COOKIE["user"])){
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

$room = $_SESSION["pincode"];
$name = $_SESSION["username_user"];

// var_dump($_SESSION);



// เวลาออก
date_default_timezone_set('Asia/Bangkok');
$Conclude_Dout = date("d-m-Y");
$Conclude_Tout = date("H:i:s");
$_SESSION["Conclude_Dout"] = $Conclude_Dout;
$_SESSION["Conclude_Tout"] = $Conclude_Tout;
$Con_Dout = $_SESSION["Conclude_Dout"];
$Con_Tout = $_SESSION["Conclude_Tout"];

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
    $sum = Word("$Word_Din $Word_Tin","$Con_Dout $Con_Tout");
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
    $sum = Word("$Sentence_Din $Sentence_Tin","$Con_Dout $Con_Tout");
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
    $sum = Word("$Conver_Din $Conver_Tin","$Con_Dout $Con_Tout");
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
    $sum = ReWor("$ReWor_Din $ReWor_Tin","$Con_Dout $Con_Tout");
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
    $sum = ReSen("$ReSen_Din $ReSen_Tin","$Con_Dout $Con_Tout");
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
    $sum = ReCon("$ReCon_Din $ReCon_Tin","$Con_Dout $Con_Tout");
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
    $sum = DetaiWor("$DetaiWor_Din $DetaiWor_Tin","$Con_Dout $Con_Tout");
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
    $sum = DeSeDe("$DeSeDe_Din $DeSeDe_Tin","$Con_Dout $Con_Tout");
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
    $sum = DeSeRate("$DeSeRate_Din $DeSeRate_Tin","$Con_Dout $Con_Tout");
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
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DeSeDay("$DeSeDay_Din $DeSeDay_Tin","$Con_Dout $Con_Tout");
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
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DeSeSugge("$DeSeSugge_Din $DeSeSugge_Tin","$Con_Dout $Con_Tout");
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
    $sum = DetaiCon("$DetaiCon_Din $DetaiCon_Tin","$Con_Dout $Con_Tout");
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
    $sum = InWor("$InWor_Din $InWor_Tin","$Con_Dout $Con_Tout");
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
    $sum = DDcheInS("$DDcheInS_Din $DDcheInS_Tin","$Con_Dout $Con_Tout");
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
    $sum = DDchePayS("$DDchePayS_Din $DDchePayS_Tin","$Con_Dout $Con_Tout");
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
    $sum = DDcheOtheS("$DDcheOtheS_Din $DDcheOtheS_Tin","$Con_Dout $Con_Tout");
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
    $sum = InCon("$InCon_Din $InCon_Tin","$Con_Dout $Con_Tout");
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
    $sum = ProWor("$ProWor_Din $ProWor_Tin","$Con_Dout $Con_Tout");
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
    $sum = ProSen("$ProSen_Din $ProSen_Tin","$Con_Dout $Con_Tout");
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
    $sum = ProCon("$ProCon_Din $ProCon_Tin","$Con_Dout $Con_Tout");
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
    $sum = DaWor("$DaWor_Din $DaWor_Tin","$Con_Dout $Con_Tout");
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
    $sum = DaSen("$DaSen_Din $DaSen_Tin","$Con_Dout $Con_Tout");
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
    $sum = DaCon("$DaCon_Din $DaCon_Tin","$Con_Dout $Con_Tout");
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
    $sum = loWor("$loWor_Din $loWor_Tin","$Con_Dout $Con_Tout");
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
    $sum = loSen("$loSen_Din $loSen_Tin","$Con_Dout $Con_Tout");
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
    $sum = loCon("$loCon_Din $loCon_Tin","$Con_Dout $Con_Tout");
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
    $sum = OWor("$OWor_Din $OWor_Tin","$Con_Dout $Con_Tout");
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
    $sum = OSen("$OSen_Din $OSen_Tin","$Con_Dout $Con_Tout");
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
    $sum = OCon("$OCon_Din $OCon_Tin","$Con_Dout $Con_Tout");
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

 
  
unset($_SESSION["Conclude_Dout"]);
unset($_SESSION["Conclude_Tout"]);
//var_dump($_SESSION);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>ผลสรุป</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="../style.css">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="icon" href="../images/icon_9.png" >  
  </head>
  <body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="../home/index.php">
   <img src="../images/icon_9.png" width="40" height="30" class="d-inline-block align-top" alt="">
</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="situation.php">สถานการณ์ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="gramma.php">ไวยากรณ์</a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="conclude.php">ผลสรุป</a>
        </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <a  class="nav-link" href="../logout.php">ออกจากระบบ </a>
        </form>
    </div>
    </nav>

        <style>
    body {
        background-image: url('../images/wall.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
       
        }
    .navbar{
        background-color: #660223;
        /* overflow: hidden;
        position: fixed;
        top: 0;
        width: 100%; */
    }
   
  .nav-link {
        color: white;
    }
    .navbar-toggler{
        border-color: rgb(255,102,203);
    }
    .navbar-toggler-icon{
        background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 32 32' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba(255,102,203, 0.7)' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 8h24M4 16h24M4 24h24'/%3E%3C/svg%3E");
    }
    .main {
        text-align: center;
    background-image: url('../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px; 
    }
  .pic{
    
    color: white;
    background-color: #AE0F0F;
    height: 140px;
    border-radius: 15px;
    padding: 25px;
    float: inherit;
    text-align: center;
    font-weight: bold;
  }

    .word{
    color: white;
    background-color: #AE0F0F;
    height: 140px;
    border-radius: 15px;
    text-align: center;
    padding: 30px;
    }
    .test{
    color: white;
    background-color: #AE0F0F;
    border-radius: 15px;
    height: auto;
    text-align: center;
    padding: 20px;
    }
.col-8{
    text-align: left;
}
    </style>
   

   <div class="main">
    <h3>ผลสรุป</h3>
    </div><br>
    <div class="container">
    <div class="link">
        <h6><a href="../home/index.php" class="text-reset">หน้าหลัก</a> > ผลสรุป</a></h6>
   </div><br>



   
    <div class="test">
    <?php 
 $code = 'Room_'.$room;

//  echo $code."<br>";
//  echo $name;
 $sql = "SELECT pic_usr ,name_usr, lname_usr , regis_hr.code , regis_hr.NHo_hr ,regis_hr.pro_hr
         FROM $code , regis_hr
         WHERE $code.code = regis_hr.code
         AND user_usr = '$name' ";
 $result = mysqli_query($connection,$sql); 
 if(!$result){
     echo 'ไม่สามารถเรียกได้';
 }else{
    $row = mysqli_fetch_assoc($result);
    ?> 
     <div class="row">
           <div class="col-4">
             <img src="../images/userpic/<?php echo $row['pic_usr'];?>" style="width: 130px; height: 130px; border-radius: 50%;">
           </div>
         <div class="col-8">
           <h4><?php echo $row['name_usr']." ".$row['lname_usr'];?></h4>
           <?php echo $row['NHo_hr']." ".$row['pro_hr'];?>
           <p>Room: <?php echo $row['code'];?></p>
         </div>
        </div>

    <?php
     mysqli_close($connection);
 }

?>
    </div>
    <br>

<div class="row">
    <div class="col">

         
    <a href="result.php" role="button">
         <div class="pic">
         <img src="../images/ranking.png" alt="user" width="61" height="61">
    <p>คะแนนการทดสอบ</p>

         </div>
    </a>

    </div>
    <div class="col">
        <a href="history.php" role="button">
        <div class="word">
        <img src="../images/break-time.png" style="width: 61px; height: 61px;">
        <p>การเรียนรู้</p>
        </div>
        </a>
    </div>
</div>
<br>

<div class="row">
    <div class="col">

         
    <a href="LevelSti.php" role="button">
         <div class="pic">
         <img src="../images/home/situation.png" alt="user" width="61" height="61">
    <p>ระดับสถานการณ์</p>

         </div>
    </a>

    </div>
    <div class="col">
        <a href="setting.php" role="button">
        <div class="word">
        <img src="../images/home/settings.png" style="width: 61px; height: 61px;">
        <p>แก้ไขข้อมูล</p>
        </div>
        </a>
    </div>
</div>

   

    
<br>
    <div class="text-center" style="color: red;"><h6><a href="../home/index.php" class="text-reset"> << กลับไปหน้าหลัก </a> </h6></div>
    
    <!-- close container -->
   </div>
</div>



<?php

}else{
   header("location:../logout.php");
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