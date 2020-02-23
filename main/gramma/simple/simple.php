<?php 
ob_start();
if(isset($_COOKIE["user"])){
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ไวยากรณ์ : ประโยคพื้นฐาน</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">
    <link rel="icon" href="../../../images/icon_9.png" >
  </head>
  <body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="../../../home/index.php">
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
        <a class="nav-link" href="../../result.php">ผลสรุป</a>
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
   
   .text{
    text-align: center;
    background-image: url('../../../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px; 
   }
   .ges{
    font-size: 20px;
    color: #1A2A73;
    font-weight: bold;
   }
   .detail{
        width: 100%;
        height: auto;
        background-color: #AE0F0F;
        color: white;
        border-radius: 20px;
        padding: 10px;
    }
    .info{
    font-size: 18px;
    color: #1A2A73;
    font-weight: bold;
    }
    .col-1{
        text-align: center;
        
    }
   
    </style>
   
   <!-- start -->
   
   <div class="text"><h3>ไวยากรณ์ : ประโยคพื้นฐาน</h3></div><br>

   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../gramma.php" class="text-reset">ไวยากรณ์</a> > <a href="simple.php" class="text-reset">ประโยคพื้นฐาน</a></h6>
   </div>
   </div>
    <br>
   <div class="container">
   <div class="ges"><p>ไวยากรณ์ : คำวิเศษณ์</p></div>
   <div class="info">ในภาษาจีน ตำแหน่งของคำวิเศษณ์จะอยู่หน้าภาคแสดง เช่น 很 hěn (มาก) 非常 fēicháng (อย่างยิ่ง) 真 zhēn (จริงๆ) เป็นต้น</div><br>
   <div class="detail">
  <?php 
  include("../../../database/database.php"); 
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');
  $sql = "SELECT* FROM gram_sim ORDER BY id ASC
  LIMIT 3;";
  $result = mysqli_query($connection,$sql);
  if(!$result){
      echo 'ติดต่อไม่ได้';
  }else{
    $num = 1;
    while($row = mysqli_fetch_assoc($result)){
     ?> 
      <div class="row">
            <div class="col-1">
            <?php echo $num;?>
            </div>
            <div class="col-11">
            <div class="yel"><?php echo $row['GS_ch'];?></div>
            <?php echo $row['GS_en'];?>
            <p><?php echo $row['GS_th'];?></p>
                    </div>
            </div>
  
  <?php
      $num++;
    }
    }
  ?>
   </div><br>
   <div class="ges"><p>ไวยากรณ์ : รูปประโยค</p></div>
   <div class="detail">
   <?php
   $sql2 = "SELECT* FROM gram_sim WHERE id>3";
   $result2 = mysqli_query($connection,$sql2);
   if(!$result2){
       echo 'ติดต่อไม่ได้';
   }else{
    $num2 =1;
    while($row2 = mysqli_fetch_assoc($result2)){
        ?> 
        <div class="row">
            <div class="col-1">
            <?php echo $num2;?>
            </div>
            <div class="col-11">
            <div class="yel"><?php echo $row2['GS_ch'];?></div>
            <?php echo $row2['GS_en'];?>
            <p><?php echo $row2['GS_th'];?></p>
                    </div>
            </div>
        <?php
        $num2++;
    }
   }
   ?>
</div>


   
   
   
   
   
   </div>
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