<?php 
if(isset($_COOKIE["user"])){
?>
<!doctype html>
<html lang="en">
  <head>
    <title>แบบฝึกหัด: ประโยคในชีวิตประจำวัน</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">


    <script type="text/javascript" src="../../../jquery-3.4.1.min.js"></script>
    <link rel="icon" href="../../../images/icon_9.png" >

    		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<!-- <script src="js/bootstrap.min.js"></script> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="../../../jquery.validation.min.js"></script>

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
   
     
    .word{
        height: 65px;
        padding: 13px; 
        word-spacing: 0.5cm; 
       font-size: 20px;
      
    }
  
   
   .text{
    text-align: center;
    background-image: url('../../../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 50px; 
  margin-top: 30px;
   }
  
   
    </style>
   
   <!-- start -->
   
   <div class="text"><h3>แบบฝึกหัด: ประโยคในชีวิตประจำวัน</h3></div><br>

   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../situation.php" class="text-reset">สถานการณ์</a> > <a href="simple.php" class="text-reset">ประโยคในชีวิตประจำวัน</a> > แบบฝึกหัด</h6>
   </div>
   </div>
   <div class="container question">
<form class="form-horizontal" role="form" id='' method="post" action="exer_re.php">

<?php
//var_dump($_POST);
include("../../../database/database.php"); 
    $connection = mysqli_connect($localhost,$username,$pass,$database);
    mysqli_set_charset($connection,'utf8');
    $sql = "SELECT *
            FROM exercise
            WHERE name = 'sim'
            ORDER BY RAND()
            ";
    
    $result = mysqli_query($connection,$sql);
    $rows = mysqli_num_rows($result);
    
    
    if(!$result){
        echo mysqli_error().'<br>';
        die('Can not connect database');
    }else{ 
      ?>
                       <div class="questiona">
                        <h5 class="text-center">จงเลือกคำตอบที่ถูกต้อง</h5>
                        </div><br>
      
      <?php
      $i=1;
 
      while($row = mysqli_fetch_assoc($result)){
       
    ?>   
    
    <div id='question<?php echo $i;?>' class='cont'>
    <div style="text-align:center;  font-size: 20px; font-weight: bold;">
    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo " ".nl2br($row['que']);?></p></div>
    <?php  $sql2 = "SELECT *
            FROM exercise_ans
            WHERE e_id = ".$row['e_id']."
            AND name = 'sim'
            ORDER BY RAND()
            ";
            

           $result2 = mysqli_query($connection,$sql2);
           ?> <div class="aa"><?php
           while($row2 = mysqli_fetch_assoc($result2)){
               //var_dump($row2);
               //echo 'i='.$i." row=".$rows;
           ?> 
           <label  class="radio" >
            <input type="radio" value="<?php echo $row2['id'];  ?> " id='radio1_<?php echo $row2['id']; ?>' name="answer[<?php echo $i; ?>]"/><p style="color: yellow; font-size: 20px; font-weight: bold;" ><?php  echo $row2['eChi'];?></p><p><?php echo $row2['eEng'];?></p>
             </label>
           <?php
           }  
           
    ?>     
    <label  class="no">
            <input type="radio" value="-200" id='radio1_-200' name="answer[<?php echo $i; ?>]"/>ไม่ทราบ<br><br>
            </label> </div>
            
           <br>
           <?php if($i==1){ 
            ?>
            <div style="text-align:right;">
           <button id='next<?php echo $i;?>' class='next btn btn-success' type='button'>ถัดไป</button></div>
           <?php }elseif($i<1 || $i<$rows){
            ?>
             <div style="text-align:right;">
            <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>ก่อนหน้า</button>                    
           <button id='next<?php echo $i;?>' class='next btn btn-success' type='button' >ถัดไป</button></div>
           <?php }elseif($i==$rows){ 
            ?>
             <div style="text-align:right;">
            <button id='pre<?php echo $i;?>' class='previous btn btn-success' type='button'>ก่อนหน้า</button>                    
            <button id='next<?php echo $i;?>' class='next btn btn-success' type='submit'>เรียบร้อย</button></div>
            <?php }
            $i++;?>


    </div>
   

<?php
        } 
        
        
        ?> </form>
         <script>
        $('.cont').addClass('hide');
        count=$('.questions').length;
        $('#question'+1).removeClass('hide');

        $(document).on('click','.next',function(){
            element=$(this).attr('id');
            if(element.length == 5) last = parseInt(element.substr(element.length - 1));
            else last = parseInt(element.substr(element.length - 2));
            nex=last+1;
            //alert("el:" + element + " last:" + last + " nex:" + nex + " len:" + element.length);
            $('#question'+last).addClass('hide');

            $('#question'+nex).removeClass('hide');
        });

        $(document).on('click','.previous',function(){
                element=$(this).attr('id');

                if(element.length == 4) last = parseInt(element.substr(element.length - 1));
                else last = parseInt(element.substr(element.length - 2));
                pre=last-1;
                $('#question'+last).addClass('hide');

                $('#question'+pre).removeClass('hide');
            });

        </script>

          <?php
    }
    mysqli_close($connection);

?>
<style>

.aa {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(360px, 1fr));
          grid-row-gap: 1rem;
          grid-column-gap: 1rem;
        
        }
       
        .radio:hover{
            color: black;
            
        }
        .questiona{
      background: black;
      padding: 20px;
      color: #fff;
      border-bottom-right-radius: 55px;
      border-top-left-radius: 55px;
      font-size: 18px;
      margin: auto;
  }
  .radio {
        padding: 0.1rem;
        border: 1px solid rgb(210, 210, 210);
        background-color: #AE0F0F;
        text-align: center;
        color: white;
        border-radius: 20px;
        cursor:pointer; 
        display:block;
        }

.no{
  text-align: center;
  border-radius: 20px;
  cursor:pointer; 
  border: 1px solid rgb(210, 210, 210);
  background-color: #AE0F0F;
  padding: 0.5rem;
  color: white;
}
.no:hover{
  background-color: #97570A;
  color: black;
}
.tes{
  text-align: center;
  width: 50%;
}
  .hide{
    display: none;
  }
  .radio:hover {
    background-color: #97570A;
  }
</style>
</div>
    <br>
    <div class="container">
    </div><br>
    <div class="text-center" style="color: red;"><h6><a href="simple.php" class="text-reset"> << ย้อนกลับไปหน้าที่แล้ว </a> </h6></div>
    

 <!-- ปิด cookie -->

 <?php

}else{
   header("location:../../../logout.php");
}

?>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>