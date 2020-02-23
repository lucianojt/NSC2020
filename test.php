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
 </head>
  <body>
  <style>
  body{
    background-image: url('images/wall.png');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
    font-family: 'Kanit', sans-serif;
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
    height: 80px;
    padding: 21px; 
   }
   .main{
    font-size: 27px;
    color: #AE0F0F;
    font-weight: bold;
   }
 
   .first{
   /* color: #FFFF00; */
   font-size: 18px;
   }
   .card {
        padding: 2rem;
        border: 1px solid rgb(210, 210, 210);
        border-color: #AE0F0F;
        border-width: 2px;    
        background-color: #AE0F0F;
        text-align: center;
        /* color: white; */
        border-radius: 20px;
        display: inline;
        
        }
  </style><br><br>
      <div class="container">
      <div class="container w3-row" >
      <?php 
//    $num = 1;
    include("database/database.php"); 
    $connection = mysqli_connect($localhost,$username,$pass,$database);
    mysqli_set_charset($connection,'utf8');
    $sql = "SELECT* FROM test ";
    $result = mysqli_query($connection,$sql);
    if(!$result){
        echo'cannot contact database';
    }else{
        
            ?> 
            <div class="main">
            <p>ถามการจองห้องล่วงหน้า</p>
            </div> 
            <?php
            echo '<div class="aa">';
            $color = ['#A3E7D8','#BACAB3','#FDB4BF','#D0B3E1','#B3B3D9'];
            while($row2 = mysqli_fetch_assoc($result)){
                
                
                $cutthai = explode(";",$row2['sen_th']); 
                $cutchi = explode(";",$row2['sen_ch']); 
                $cuten = explode(";",$row2['sen_en']); 
                $nunTHAI = count($cutthai);
                $nunCHI = count($cutchi);
                $nunEN = count($cuten);
                //var_dump($nunTHAI);
            ?> 
                <div class="card">
                <?php  
                for($i=0;$i<$nunTHAI;$i++){
                    echo  ' <span style="background-color: '.$color[$i].' ;"> '.$cutthai[$i].'</span>';
                 }   echo '<br>';
                 for($i=0;$i<$nunTHAI;$i++){
                    echo  "<p style= 'display: inline; color: white;' >".$cutchi[$i]."</p>";
                 }   echo '<br>';
                 for($i=0;$i<$nunTHAI;$i++){
                    echo  ' <span style="background-color: '.$color[$i].' ;"> '.$cuten[$i].'</span>';
                 } 
                ?><br>
                <a onmousedown="sound.play();" class="ml-auto"><img src="images/loundspeaker.png" style="width:35px;"></a>
                </div>
           
            <?php
            }
            echo '</div><br>';
            // $num =  $num+1;
        
        mysqli_close($connection); 
    }

?>
</div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>