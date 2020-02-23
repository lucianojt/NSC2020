<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <style>
    .card {
        
       
      display: inline;
       
        
        }
  </style>
  <br><br>
      <div class="container">
      <?php
      $color = ['#A3E7D8','#BACAB3','#FDB4BF','#D0B3E1','#B3B3D9'];
        $thai = "ฉัน;ต้อง;การ;กิน;ผัก";
        $chi = "我;必;须;吃;蔬菜";
        $en = "Wǒ;bìxū;chī;shū;cài";
        $cutthai = explode(";",$thai);
        $cutchi = explode(";",$chi);
        $cuten = explode(";",$en);
    
        $nunTHAI = count($cutthai);
        $nunCHI = count($cutchi);
        $nunEN = count($cutthai);
        //echo $nun."<br>";
        //var_dump($cutthai);
        //var_dump($cutchi);
       // var_dump($cuten);
        //var_dump($color);
        for($i=0;$i<$nunTHAI;$i++){
           ?> <span style="background-color: <?php echo $color[$i];?>"><?php echo $cutthai[$i];?></span><?php
           
        }
        echo '<br>';
        for($i=0;$i<$nunCHI;$i++){
            ?> <span style="background-color: <?php echo $color[$i];?>"><?php echo $cutchi[$i];?></span><?php
         }
         echo '<br>';
         for($i=0;$i<$nunEN;$i++){
            ?> <span style="background-color: <?php echo $color[$i];?>"><?php echo $cuten[$i];?></span><?php
         }
      ?>
     
     <div class = "card">
     <span style="background-color: #A3E7D8 ;"> ได้</span> <span style="background-color: #BACAB3 ;"> จองแล้ว</span> <span style="background-color: #FDB4BF ;"> ไหม?</span>   
     </div>
      </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>