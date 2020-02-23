<?php 
session_start();
ob_start();
if(isset($_COOKIE["user"])){
include("../../../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

//var_dump($_SESSION);
date_default_timezone_set('Asia/Bangkok');
$DataWord_Din = date("d-m-Y");
$DataWord_Tin = date("H:i:s");

$_SESSION["DataWord_Din"] = $DataWord_Din;
$_SESSION["DataWord_Tin"] = $DataWord_Tin;
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">
    <link rel="icon" href="../../../images/icon_9.png" >
    <script >
                  
function playSound(pp){
    var audios = document.getElementsByTagName('audio');
    console.log(pp);
    for(var i = 0, len = audios.length; i < len;i++){
        // console.log(audios[i]);
        // console.log("++++++");
        
        //var aud = document.getElementById("sound" + pp);
        //console.log(aud);
        
        
        if(audios[i].id == "sound" + pp){
            audios[i].play();
            if (audios[i].paused) {
           audios[i].play();
           }else{
               audios[i].currentTime = 0
           }
          //console.log(audios[i].src);
        }
        // else {
        //     console.log("else");
            
        // }
    }
}

document.addEventListener('play', function(e){
    var audios = document.getElementsByTagName('audio');
    for(var i = 0, len = audios.length; i < len;i++){
        if(audios[i] != e.target){
            audios[i].pause();
            audios[i].currentTime = 0;
        }
    }
}, true);
           </script>
  </head>
  <body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="../home/index.php">
   <img src="../../../images/icon_9.png" width="40" height="30" class="d-inline-block align-top" alt="">
</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
        <li class="nav-item active">
            <a class="nav-link" href="../../situation.php">สถานการณ์ <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="../../gramma.php">ไวยากรณ์</a>
        </li>
        <li class="nav-item active">
        <a class="nav-link" href="../../conclude.php">ผลสรุป</a>
        </li>
       
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <a  class="nav-link" href="../../../logout.php">ออกจากระบบ </a>
        </form>
    </div>
    </nav>

        <style>
    body {
        background-image: url('../../../images/wall.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
       
        }
    .navbar{
        background-color: #660223;
        overflow: hidden;
        position: fixed;
        top: 0;
        width: 100%;
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
   .colo{
    background-color: #AE0F0F;
   
   }
   .text{
    text-align: center;
    background-image: url('../../../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 50px; 
  margin-top: 30px;
   }
   .ta{
       color: white;
   }
   .yall{
       color: #FAB665;
       font-size: 20px;
       
   }
    </style>
   
   <!-- start -->
   
   <div class="text"><h3>คำศัพท์: การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม</h3></div><br>

   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="data.php" class="text-reset">การให้ข้อมูลบริการด้านต่างๆ ของโรงแรม</a> > คำศัพท์</h6>
   </div>
   </div>
    <br>
    
<?php 
$sql = "SELECT* FROM wordFi WHERE name = 'data'";
$result = mysqli_query($connection,$sql);
if(!$result){
    echo'cannot contact database';
}else{
?> 

<div class="container">
 <div class="colo">
    <table class="table">
    <thead class="thead" style=" background-color:  #660223; color: white;">
        <tr>
        
        <th scope="col">คำภาษาจีน</th>
        <th scope="col">คำภาษาอังกฤษ</th>
        <th scope="col">คำภาษาไทย</th>
        <th scope="col">เสียงอ่าน</th>
        </tr>
    </thead>
    <tbody class="ta">
        <?php 
           $mu = 1;
         while($row = mysqli_fetch_assoc($result)){
             
         ?> 
         <tr>
         <td class="yall"><?php echo $row['wor_ch'];?></td>
         <td><?php echo $row['wor_en'];?></td>
         <td><?php echo $row['wor_th'];?></td>
         <?php
                $inpi = $row['wor_sound'];
                ?>
                <audio id="sound<?php echo $mu; ?>" src="../../../sound/word/data/<?php echo $inpi; ?>"></audio>

         <td><a onclick="playSound(<?php echo $mu; ?>)" class="ml-auto"><img src="../../../images/loundspeaker.png" style="width:35px;"></a></td>
      
        </tr>
      
            <?php
              $mu++;
        }
        ?>
        
       
        <?php

        ?>
    </tbody>
    </table>
 </div>
</div>
<?php
mysqli_close($connection);
}
?>
    

   
   
   


    <div class="container">
    </div><br>
    <div class="text-center" style="color: red;"><h6><a href="../../../home/index.php" class="text-reset"> << กลับไปหน้าหลัก </a> </h6></div>
    

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