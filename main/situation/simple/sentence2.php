<?php 
session_start();
ob_start();
if(isset($_COOKIE["user"])){
    include("../../../database/database.php"); 
    $connection = mysqli_connect($localhost,$username,$pass,$database);
    mysqli_set_charset($connection,'utf8');


date_default_timezone_set('Asia/Bangkok');
$SimSentence_Din = date("d-m-Y");
$SimSentence_Tin = date("H:i:s");
    
$_SESSION["SimSentence_Din"] = $SimSentence_Din;
$_SESSION["SimSentence_Tin"] = $SimSentence_Tin;
    
//var_dump($_SESSION);
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ประโยค: ประโยคที่ใช้ในชีวิตประจำวัน</title>
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
   
    /* .btn {
    color: white;
    background-color: #AE0F0F;
    width: 80%;
    text-align: left;
    }   */
    .word{
        height: 65px;
        padding: 13px; 
        word-spacing: 0.5cm; 
       font-size: 20px;
    }

    .show{
    margin-top: 20px;
    padding: 1%;
    text-align: center;
    font-size: 20px;
}
    .aa {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
          grid-row-gap: 2rem;
          grid-column-gap: 2rem;
        
        }
  
   .text{
    text-align: center;
    background-image: url('../../../images/wallpa.jpg');
    color: white;
    height: 90px;
    padding: 21px; 
   }
   .main{
    font-size: 27px;
    color: #AE0F0F;
    font-weight: bold;
   }
 
   .first{
   color: #FFFF00;
   font-size: 18px;
   }
   .card {
        padding: 2rem;
        border: 1px solid rgb(210, 210, 210);
        background-color: #AE0F0F;
        text-align: center;
        color: white;
        border-radius: 20px;
        
        }
        .textt{
        background-color: #07666A;
    }
    .modal-content{
    margin-top: 50%;
    text-align: center;

}
.modal-header{
    text-align: center;
}
.modal-content{
    border-radius: 20px;
}
.bg-danger {
    padding: 0.8rem;
}
    </style>
   
   <!-- start -->
   
   <div class="text"><h3>ประโยค: ประโยคที่ใช้ในชีวิตประจำวัน</h3></div><br>
   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="simple.php" class="text-reset">ประโยคในชีวิตประจำวัน</a> > ประโยค</h6>
   </div>
   
   </div>
   <br>
   <!-- open container -->
   <div class="container w3-row" >


   <?php 
//    $num = 1;
    
$sql3 = "SELECT* FROM sentence WHERE  name= 'sim' ";
$result3 = mysqli_query($connection,$sql3);


$old = array("ช่วยเหลือ","โรงแรมของเรา") ;
$new = array("ช่วยเหลือ","โรงแรมของเรา");
$countNew = count($new);

for($io = 0 ; $io < $countNew ; $io++){
    // $lightNEW[]  = "<font class='text' data-toggle='modal' data-target='#myModal '>".$new[$io]."</font>";

   $input = $new[$io];
   $escapedString = json_encode($input);
   $lightNEW[]  = "<font class='textt'  onmousedown='clo($escapedString)' data-toggle='modal' data-target='#myModal' >".$new[$io]."</font>";
 
   
}

while($row3 = mysqli_fetch_assoc($result3)){
    $text[] = $row3['sen_th'];
}


$countextTH = count($text);
for($xxx=0; $xxx<$countextTH ; $xxx++){
    $showLIGHT[] = str_replace($old,$lightNEW, $text[$xxx]); 
}

$geen = count($showLIGHT);


// for($pen=0; $pen<$geen ; $pen++){
//     echo $showLIGHT[$pen]."<br>";
// }

    $sql = "SELECT* FROM TS_Topic WHERE topic = 'sim' ";
    $result = mysqli_query($connection,$sql);
    if(!$result){
        echo'cannot contact database';
    }else{
        $pen=0;
        while($row = mysqli_fetch_assoc($result)){
            ?> 
            <div class="main">
            <p><?php echo$row['name'];?></p>
            </div> 
            <?php
            $sql2 = "SELECT* FROM sentence WHERE id_sen = ".$row['ts_id']."  AND  name= 'sim' ";
            $result2 = mysqli_query($connection,$sql2);  
           
            echo '<div class="aa">';
            while($row2 = mysqli_fetch_assoc($result2)){ 
            ?> 
                <div class="card">
                <p class="first"><?php echo nl2br($showLIGHT[$pen]);?></p>
                <p><?php echo$row2['sen_ch'];?></p>
                <p><?php echo$row2['sen_en'];?></p>
                <a onmousedown="sounn('<?php echo $row2['sen_sound']; ?>')" class="ml-auto"><img src="../../../images/loundspeaker.png" style="width:35px;"></a>
                </div>
           
            <?php
            $pen++;
            }
            echo '</div><br>';
            // $num =  $num+1;
            ?>
            <div class="container">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="header bg-danger">
        <script>
    // function clo(b){
    //     console.log(b);
    // }
    function clo(k){
        console.log(k);
        document.getElementById("kk").innerHTML = k;
        var music = k+".mp3";
               var sound = new Audio();
               sound.src = '../../../sound/sentence/' + music;
           if (sound.paused) {
        //  console.log(k);
           sound.play();
           }else{
               sound.currentTime = 0
           }
    }
    function sounn(pp){
              //console.log("hi");
              var music = pp;
               var sound = new Audio();
               sound.src = '../../../sound/sentence/sim/' + music;
           if (sound.paused) {
        //  console.log(pp);
           sound.play();
           }else{
               sound.currentTime = 0
           }
    }
    function soun(oo){
        console.log(oo);
        
    }
    </script>
            <p></p>
        <h4 class="modal-title"></h4>
        </div>
        
        <!-- Modal body -->
        
        <p id="kk"></p>
           
        <!-- Modal footer -->
          <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="javascript:window.close()">ปิด</button>
        </div>
        </div>
        
      </div>
    </div>
  </div>
            
            <?php
            
        }
        mysqli_close($connection); 
    }

?>
  <!-- close container -->
   </div>
    <div class="container">
    </div><br>
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