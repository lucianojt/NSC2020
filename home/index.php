<?php 
session_start();
ob_start();
if(isset($_COOKIE["user"])){
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
$user = $_SESSION["username_user"];
$code = $_SESSION["pincode"];

$s = "Room_".$code;
$sqlPre = "SELECT pretest from $s WHERE user_usr = '$user' AND pretest = -1";
$resultPre = mysqli_query($connection,$sqlPre);
$rowPre = mysqli_fetch_assoc($resultPre);
if($rowPre){
    header("location:pretest.php");
}
// เวลาออก
date_default_timezone_set('Asia/Bangkok');
$Index_Dout = date("d-m-Y");
$Index_Tout = date("H:i:s");
$_SESSION["Index_Dout"] = $Index_Dout;
$_SESSION["Index_Tout"] = $Index_Tout;
$dex_Dout = $_SESSION["Index_Dout"];
$dex_Tout = $_SESSION["Index_Tout"];

//สิ้นสุดเวลาออก

//เวลาของ wordSim
if(isset($_SESSION["SimWord_Tin"])){
  $Word_Din = $_SESSION["SimWord_Din"];
  $Word_Tin = $_SESSION["SimWord_Tin"];
  function Word($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = Word("$Word_Din $Word_Tin","$dex_Dout $Index_Tout");
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
  $sum = Word("$Sentence_Din $Sentence_Tin","$dex_Dout $Index_Tout");
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
  $sum = Word("$Conver_Din $Conver_Tin","$dex_Dout $Index_Tout");
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

//เวลาของ ReserveWord
if(isset($_SESSION["ReserveWord_Tin"])){
  $ReWor_Din = $_SESSION["ReserveWord_Din"];
  $ReWor_Tin = $_SESSION["ReserveWord_Tin"];
  function ReWor($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = ReWor("$ReWor_Din $ReWor_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}

//เวลาของ ReserveSentence
if(isset($_SESSION["ReserveSentence_Tin"])){
  $ReSen_Din = $_SESSION["ReserveSentence_Din"];
  $ReSen_Tin = $_SESSION["ReserveSentence_Tin"];
  function ReSen($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = ReSen("$ReSen_Din $ReSen_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}

//เวลาของ ReserveConver
if(isset($_SESSION["ReserveCon_Tin"])){
  $ReCon_Din = $_SESSION["ReserveCon_Din"];
  $ReCon_Tin = $_SESSION["ReserveCon_Tin"];
  function ReCon($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = ReCon("$ReCon_Din $ReCon_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}

 //เวลาของ DetailWord
 if(isset($_SESSION["DetailWord_Tin"])){
  $DetaiWor_Din = $_SESSION["DetailWord_Din"];
  $DetaiWor_Tin = $_SESSION["DetailWord_Tin"];
  function DetaiWor($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = DetaiWor("$DetaiWor_Din $DetaiWor_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ DetailSentenceRoom
if(isset($_SESSION["DetailSenDe_Tin"])){
  $DeSeDe_Din = $_SESSION["DetailSenDe_Din"];
  $DeSeDe_Tin = $_SESSION["DetailSenDe_Tin"];
  function DeSeDe($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = DeSeDe("$DeSeDe_Din $DeSeDe_Tin","$dex_Dout $Index_Tout");
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
  $sum = DeSeRate("$DeSeRate_Din $DeSeRate_Tin","$dex_Dout $Index_Tout");
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
  $sum = DeSeDay("$DeSeDay_Din $DeSeDay_Tin","$dex_Dout $Index_Tout");
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
  $sum = DeSeSugge("$DeSeSugge_Din $DeSeSugge_Tin","$dex_Dout $Index_Tout");
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

//เวลาของ DetailConver
if(isset($_SESSION["DetailCon_Tin"])){
  $DetaiCon_Din = $_SESSION["DetailCon_Din"];
  $DetaiCon_Tin = $_SESSION["DetailCon_Tin"];
  function DetaiCon($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = DetaiCon("$DetaiCon_Din $DetaiCon_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ CheckinWord
if(isset($_SESSION["ChecInWord_Tin"])){
  $InWor_Din = $_SESSION["ChecInWord_Din"];
  $InWor_Tin = $_SESSION["ChecInWord_Tin"];
  function InWor($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = InWor("$InWor_Din $InWor_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ CheckinSentenceIn
if(isset($_SESSION["ChecSenIn_Tin"])){
    $DDcheInS_Din = $_SESSION["ChecSenIn_Din"];
    $DDcheInS_Tin = $_SESSION["ChecSenIn_Tin"];
    function DDcheInS($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DDcheInS("$DDcheInS_Din $DDcheInS_Tin","$dex_Dout $Index_Tout");
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
    $sum = DDchePayS("$DDchePayS_Din $DDchePayS_Tin","$dex_Dout $Index_Tout");
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
    $sum = DDcheOtheS("$DDcheOtheS_Din $DDcheOtheS_Tin","$dex_Dout $Index_Tout");
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
//เวลาของ CheckinConver
if(isset($_SESSION["ChecInCon_Tin"])){
  $InCon_Din = $_SESSION["ChecInCon_Din"];
  $InCon_Tin = $_SESSION["ChecInCon_Tin"];
  function InCon($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = InCon("$InCon_Din $InCon_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}

//เวลาของ ProblemWord
if(isset($_SESSION["ProblemWord_Tin"])){
  $ProWor_Din = $_SESSION["ProblemWord_Din"];
  $ProWor_Tin = $_SESSION["ProblemWord_Tin"];
  function ProWor($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = ProWor("$ProWor_Din $ProWor_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ ProblemSentence
if(isset($_SESSION["ProblemSenten_Tin"])){
  $ProSen_Din = $_SESSION["ProblemSenten_Din"];
  $ProSen_Tin = $_SESSION["ProblemSenten_Tin"];
  function ProSen($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = ProSen("$ProSen_Din $ProSen_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ ProblemConver
if(isset($_SESSION["ProblemCon_Tin"])){
  $ProCon_Din = $_SESSION["ProblemCon_Din"];
  $ProCon_Tin = $_SESSION["ProblemCon_Tin"];
  function ProCon($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = ProCon("$ProCon_Din $ProCon_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ DataWord
if(isset($_SESSION["DataWord_Tin"])){
  $DaWor_Din = $_SESSION["DataWord_Din"];
  $DaWor_Tin = $_SESSION["DataWord_Tin"];
  function DaWor($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = DaWor("$DaWor_Din $DaWor_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ DataSentenced
if(isset($_SESSION["DataSenten_Tin"])){
  $DaSen_Din = $_SESSION["DataSenten_Din"];
  $DaSen_Tin = $_SESSION["DataSenten_Tin"];
  function DaSen($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = DaSen("$DaSen_Din $DaSen_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ DataConver
if(isset($_SESSION["DataCon_Tin"])){
  $DaCon_Din = $_SESSION["DataCon_Din"];
  $DaCon_Tin = $_SESSION["DataCon_Tin"];
  function DaCon($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = DaCon("$DaCon_Din $DaCon_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ LocationWord
if(isset($_SESSION["LocaWord_Tin"])){
  $loWor_Din = $_SESSION["LocaWord_Din"];
  $loWor_Tin = $_SESSION["LocaWord_Tin"];
  function loWor($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = loWor("$loWor_Din $loWor_Tin","$dex_Dout $Index_Tout");
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
  $sum = loSen("$loSen_Din $loSen_Tin","$dex_Dout $Index_Tout");
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
  $sum = loCon("$loCon_Din $loCon_Tin","$dex_Dout $Index_Tout");
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
//เวลาของ OutWord
if(isset($_SESSION["OutWord_Tin"])){
  $OWor_Din = $_SESSION["OutWord_Din"];
  $OWor_Tin = $_SESSION["OutWord_Tin"];
  function OWor($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = OWor("$OWor_Din $OWor_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ OutSentence
if(isset($_SESSION["OutSenten_Tin"])){
  $OSen_Din = $_SESSION["OutSenten_Din"];
  $OSen_Tin = $_SESSION["OutSenten_Tin"];
  function OSen($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = OSen("$OSen_Din $OSen_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}
//เวลาของ OutConver
if(isset($_SESSION["OutCon_Tin"])){
  $OCon_Din = $_SESSION["OutCon_Din"];
  $OCon_Tin = $_SESSION["OutCon_Tin"];
  function OCon($strDateTime1,$strDateTime2){
  return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
  }   
  $sum = OCon("$OCon_Din $OCon_Tin","$dex_Dout $Index_Tout");
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

 //var_dump($_SESSION);
}


unset($_SESSION["Index_Dout"]);
unset($_SESSION["Index_Tout"]);

?>
<!-- เปิดcookie -->
<!doctype html>
<html lang="en">
  <head>
    <title>หน้าหลัก</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="icon" href="../images/logoPJ.png" >
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">CHINY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" style="color: #092E41; font-weight: bold;">
      <li class="nav-item active">
          <a class="nav-link" href="../main/situation.php">สถานการณ์ <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../main/gramma.php">ไวยากรณ์</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="../main/conclude.php">ผลสรุป</a>
      </li>
      </ul>
      <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
    </div>
  </nav>
 
<div class="textMain"><p>หน้าหลัก</p></div>
<?php
  if ($_SESSION["username_user"]=="") {
    header("location:../logout.php"); 
    exit();
  } else {
    $sqlData = "SELECT * FROM regis_usr WHERE user_usr = '$user'";
    $resultData = mysqli_query($connection,$sqlData);
    $rowData = mysqli_fetch_assoc($resultData);
    $FistName =  $rowData['name_usr'];
    $LastName =  $rowData['lname_usr'];
    $imgName =  $rowData['pic_usr'];
    $sqlHotel = "SELECT * FROM regis_hr WHERE code = '$code'";
    $resultHotel = mysqli_query($connection,$sqlHotel);
    $rowHotel = mysqli_fetch_assoc($resultHotel);
    $nameHotel = $rowHotel['NHo_hr'];
    $ProHotel = $rowHotel['pro_hr'];
    $dHotel = $rowHotel['dt_hr'];
?>
<div class="container">
  <div class="roomDetail">
    <div class="img">
      <img class="picUser" src="../images/userpic/<?php echo $imgName;?>" alt="">
      <div class="nameUser">
        <p class="nameUserDetail"><?php echo $FistName.'  '.$LastName; ?></p>
        <p class="nameUserDetail" >ห้อง: <?php echo $code." ชื่อผู้ใช้: ".$user ;?></p>
      </div>
    </div>
    <div class="detailhotel">
      <!-- <p style="margin: 0 20px 0 0">โรงแรม</p> -->
      <p class="detailhotels"><?php echo $nameHotel.' จังหวัด '.$ProHotel.' อำเภอ '.$dHotel;?></p>
    </div>
  </div>
</div>

<div class="container">
  <div class="rowOne">
    <div class="situation">
      <a href="../main/situation.php" role="button">
        <div class="word">
        <img src="../images/home/situation.png" style="width: 61px; height: 61px;">
        <p class="textWords">สถานการณ์</p>
        </div>
        </a>
      <br>
    </div>
    <div class="situation">
        <a href="../main/gramma.php" role="button">
          <div class="word">
          <img src="../images/home/gramma1.png" style="width: 61px; height: 61px;">
          <p class="textWords">ไวยากรณ์</p>
          </div>
          </a>
        <br>
    </div>
  </div>
  <div class="rowTwo">
    <div class="situation">
      <a href="../main/conclude.php" role="button">
        <div class="word">
        <img src="../images/home/Picture1.png" style="width: 61px; height: 61px;">
        <p class="textWords">ผลสรุป</p>
        </div>
        </a>
      <br>
    </div>
    <div class="situation">
    <?php
    $sql2 = "SELECT * FROM scoreOut WHERE user_usr = '$user' AND code = '$code' AND score_out >= 6";
    $result2 = mysqli_query($connection,$sql2);
    $row2 = mysqli_fetch_assoc($result2);
    if(!$row2){
      
      ?>
      <div class="bb" style="cursor: no-drop;" data-toggle="modal" data-target="#myModal" >
            <div >
            <img src="../images/home/test.png" style="width: 61px; height: 61px;">
              <p class="textWords">แบบทดสอบ</p>
            </div>
      </div>
      <?php
    }else {
      ?>
        <a href="../main/posttest.php" role="button">
          <div class="word">
          <img src="../images/home/test.png" style="width: 61px; height: 61px;">
            <p class="textWords">แบบทดสอบ</p>
          </div>
          </a>
      <?php
    }
    ?>
        <br>
    </div>

  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="header">
            <p class="warnmimg">คำเตือน !</p>
        <h4 class="modal-title"></h4>
        </div>
          <p class="stuation">ขออภัยแบบทดสอบยังไม่เปิด</p>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal" onclick="javascript:window.close()">ปิด</button>
        </div>
      </div>
    </div>
  </div>

  </div>
</div>
<?php
  mysqli_close($connection);
  }
?>
<!-- ปิด cookie -->
<?php
 }else{
  header("location:../logout.php");
}
include('../footer.php');
ob_end_flush();
?>
<style>
body {
  /* background: #e4cbd3; */
  background: #FFEEEB;
}
.material-icons {
  position: absolute;
}
.nav-link {
  color: black;
}
.navbar {
  background-color: #e4cbd3 !important;
  font-size: 18px;
  position: sticky;
  top: 0;
}
.active {
  transition: opacity 0.2s;
}
.navbar-collapse:hover .active:not(:hover) {
  opacity: 0.5;
}
.textMain {
  padding: 16px 0 0;
  letter-spacing: 2px;
  color: #551524;
  font-size: 45px;
  width: 200px;
  margin: 0 auto;
}
.rowOne {
  display: flex;
  width: 100%;
}
.rowTwo {
  display: flex;
  width: 100%;
}
.situation {
  width: 50%;
  margin: 0 20px 0 0;
  font-size: 18px;
}
.roomDetail {
  background: #ba748b;
  border-radius: 6px;
  padding: 20px 20px;
  margin: 20px 0 20px;
  color: #2C1404;
  font-size: 20px;
}
.img {
  display: flex;
}
.detailhotel {
  border-top: 1.5px solid #CBCBCB;
  display: flex;
  margin: 20px 0 0;
  padding: 20px 0 0;
}
.detailhotels {
  background: #e4cbd3;
  margin: 3px 0;
  padding: 9px;
  border-radius: 7px;
}
.textWords {
  margin: 10px 0 0;
}
.picUser {
  width: 13%;
  height: auto;
  border-radius: 12%;
  margin: 0 17px 0 0;
}
@media (max-width: 575.98px) {
  .picUser {
    width: 26%;
  }
  .textMain {
    letter-spacing: 2px;
    font-size: 40px;
  }
}
.nameUserDetail {
  border-radius: 7px;
  background: #e4cbd3;
  margin: 6px 0;
  padding: 9px;
}
.word {
  color: white;
  background: #7e1f35;
  height: 140px;
  border-radius: 5px;
  text-align: center;
  padding: 23px;
  position: relative;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.word:hover {
  background: #551524;
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
  opacity: 0.7;
  background-color: #551524;
  height: 140px;
  border-radius: 4px;
  text-align: center;
  padding: 23px 0 0;
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
</style>