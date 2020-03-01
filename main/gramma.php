<?php 
ob_start();
session_start();
if(isset($_COOKIE["user"])){

include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

// เวลาออก
date_default_timezone_set('Asia/Bangkok');
$Gramma_Dout = date("d-m-Y");
$Gramma_Tout = date("H:i:s");
$_SESSION["Gramma_Dout"] = $Gramma_Dout;
$_SESSION["Gramma_Tout"] = $Gramma_Tout;
$Ma_Dout = $_SESSION["Gramma_Dout"];
$Ma_Tout = $_SESSION["Gramma_Tout"];

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
  $sum = Word("$Word_Din $Word_Tin","$Ma_Dout $Ma_Tout");
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
  $sum = Word("$Sentence_Din $Sentence_Tin","$Ma_Dout $Ma_Tout");
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
  $sum = Word("$Conver_Din $Conver_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = ReWor("$ReWor_Din $ReWor_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = ReSen("$ReSen_Din $ReSen_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = ReCon("$ReCon_Din $ReCon_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DetaiWor("$DetaiWor_Din $DetaiWor_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DeSeDe("$DeSeDe_Din $DeSeDe_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DeSeRate("$DeSeRate_Din $DeSeRate_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DeSeDay("$DeSeDay_Din $DeSeDay_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DeSeSugge("$DeSeSugge_Din $DeSeSugge_Tin","$Ma_Dout $Ma_Tout");
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
    function DetaiCon_Din($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = DetaiCon_Din("$DetaiCon_Din $DetaiCon_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = InWor("$InWor_Din $InWor_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DDcheInS("$DDcheInS_Din $DDcheInS_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DDchePayS("$DDchePayS_Din $DDchePayS_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DDcheOtheS("$DDcheOtheS_Din $DDcheOtheS_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = InCon("$InCon_Din $InCon_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = ProWor("$ProWor_Din $ProWor_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = ProSen("$ProSen_Din $ProSen_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = ProCon("$ProCon_Din $ProCon_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DaWor("$DaWor_Din $DaWor_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DaSen("$DaSen_Din $DaSen_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = DaCon("$DaCon_Din $DaCon_Tin","$Ma_Dout $Ma_Tout");
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
    unset($_SESSION["DataSenten_Din"]);
    unset($_SESSION["DataSenten_Tin"]);
  
   //var_dump($_SESSION);
}
//เวลาของ LocationWord
if(isset($_SESSION["LocaWord_Tin"])){
    $loWor_Din = $_SESSION["LocaWord_Din"];
    $loWor_Tin = $_SESSION["LocaWord_Tin"];
    function loWor($strDateTime1,$strDateTime2){
    return strtotime($strDateTime2) - strtotime($strDateTime1) ; 
    }   
    $sum = loWor("$loWor_Din $loWor_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = loSen("$loSen_Din $loSen_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = loCon("$loCon_Din $loCon_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = OWor("$OWor_Din $OWor_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = OSen("$OSen_Din $OSen_Tin","$Ma_Dout $Ma_Tout");
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
    $sum = OCon("$OCon_Din $OCon_Tin","$Ma_Dout $Ma_Tout");
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
unset($_SESSION["Gramma_Dout"]);
unset($_SESSION["Gramma_Tout"]);

?>
<!doctype html>
<html lang="en">
  <head>
    <title>ไวยากรณ์</title>
    <?php include("headU.php"); ?>
   <!-- start -->
   
   <div class="text"><p>ไวยากรณ์</p></div>
   <div class="container">
   <div class="link">
   <h5><a href="../home/index.php" class="text-reset">หน้าหลัก</a> > ไวยากรณ์</a></h5>
   </div>
   <br>
  <div class="aa">

  <a href='gramma/pinyin/pinyin.php' class='cardF'>
    <div>
    <img src='../images/yin-yang.png' height='60' width='60' >
    </div><br>
    การสะกดเสียงภาษาจีน
    </a>
          <?php 
           $sql = 'select * from main';
           $result = mysqli_query($connection,$sql);
           if(!$result){
            echo mysqli_error().'<br>';
            die('Can not connect database');
           }else{ 
            while($row = mysqli_fetch_assoc($result)){
            ?> 
             <?php echo "<a href='gramma/".$row['eng']."/".$row['eng'].".php' class='card'>";?>
             <div>
             <?php  echo "<img src='../images/".$row['pic']."' height='60' width='60' >";?>
            </div><br> 
             <?php echo $row['name'];?>
             </a>
            <?php
            }
           mysqli_close($connection);
           }
          
          ?>   
    <a href='gramma/time_date/time_date.php' class='card'>
    <div>
    <img src='../images/time.png' height='60' width='60' >
    </div><br>
    ตัวเลข และ เวลา
    </a>

   
             
</div>
   </div>
  <div class="backLink"><h6><a href="../home/index.php" class="text-reset"> << กลับไปหน้าหลัก </a> </h6>
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
<style>
.text {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524;
}
.aa {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
  grid-row-gap: 2rem;
  grid-column-gap: 2rem;
}
.cardF {
  position: static;
  padding: 20px;
  background: #7e1f35;
  text-align: center;
  color: white;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.cardF:hover {
  background-color: #551524;
}
a:hover {
  color: white;
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
}
.backLink {
  margin: 20px 0;
  text-align: center;
}
.text-reset {
  font-size: 18px;
}
</style>