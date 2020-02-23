<?php session_start(); 
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

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
    <link rel="stylesheet" href="../style.css">
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
       
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <a  class="nav-link" href="../logout_hr.php">ออกจากระบบ </a>
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
        position: fixed; */
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
    .text{
      /* margin-top: 56px; */
    text-align: center;
    background-image: url('../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px;


   }
   .card {
        text-align: center;   
        }
    .card:hover{
        color: #257171;
    }
    .aa {
          display: grid;
          grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
          grid-row-gap: 2rem;
          grid-column-gap: 2rem;
        
        }

.btn{
    width: 224px;
    height: 310px;
        }  
        
    </style>
     
      <div class="text"><h3>ประวัติพนักงาน</h3></div><br>
      <div class="container">
      <div class="link">
        <h6><a href="MGRoom_hr.php" class="text-reset">จัดการห้อง</a> > ประวัติพนักงาน</a></h6>
      </div>

<!-- close container -->
      </div><br>





      <div class="container">
      
      <form method="get">
<p>
ข้อมูลเรียงตาม
<select name="data">
  <option value="user">ชื่อผู้ใช้</option>
  <option value="time">วันที่สมัครใช้งาน</option>
</select>

<button type= "submit" class="geem btn-info" name="choose"> ตกลง </button>
</p>

</form>

      
      </div>


<?php 
if(isset($_GET['data'])){
  if($_GET['data'] == "user"){
    ?>
    <div class="container">
    <p>เรียงตามชื่อผู้ใช้</p>
    </div>
    <?php
    $room2 = $_SESSION["code"] ;
$aaaa2 = "Room_".$room2;
$sql2 = "SELECT * FROM $aaaa2 ORDER BY  user_usr ASC";
$result2 = mysqli_query($connection,$sql2);
if(!$result2){
  echo 'ต่อไม่ได้';
}else{
  ?> 


  <div class="container">
     <div class="aa" >
 
 
     <?php  
      while($row2 = mysqli_fetch_assoc($result2)){
     ?>
    <!-- วนตรงนี้ -->
    <form action="infoHisto.php" method="get">
     <button class="btn" name="name" value="<?php echo $row2['user_usr'];?> "   >
     <div class="card" style="width: 18rem;">
     <img class="card-img-top" src="../images/userpic/<?php echo $row2["pic_usr"];?>" alt="Card image cap" style="  width: 286px;
     height: 150px;">
     <div class="card-body">
         <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
     </div>
     </div>
     </button>
     </form>
 
 
      <?php } ?>
      <!-- สิ้นสุด -->
 
     </div>
     </div>
 
 
 
   <?php



}
?> 
<?php
  }else{
    ?>
    <div class="container">
    <p>เรียงตามวันที่สมัครใช้งาน</p>
    </div>
    <?php

    $room3 = $_SESSION["code"] ;
    $aaaa3 = "Room_".$room3;
    $sql3 = "SELECT * FROM $aaaa3 ORDER BY  id ASC";
    $result3 = mysqli_query($connection,$sql3);
    if(!$result3){
      echo 'ต่อไม่ได้';
    }else{
      ?> 


      <div class="container">
         <div class="aa" >
     
     
         <?php  
          while($row3 = mysqli_fetch_assoc($result3)){
         ?>
        <!-- วนตรงนี้ -->
        <form action="infoHisto.php" method="get">
         <button class="btn" name="name" value="<?php echo $row3['user_usr'];?> "   >
         <div class="card" style="width: 18rem;">
         <img class="card-img-top" src="../images/userpic/<?php echo $row3["pic_usr"];?>" alt="Card image cap" style="  width: 286px;
         height: 150px;">
         <div class="card-body">
             <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
         </div>
         </div>
         </button>
         </form>
     
     
          <?php } ?>
          <!-- สิ้นสุด -->
     
         </div>
         </div>
     
     
     
       <?php

    }
  }
}else{
$room = $_SESSION["code"] ;
$aaaa = "Room_".$room;
$sql = "SELECT * FROM $aaaa ORDER BY  user_usr ASC";
$result = mysqli_query($connection,$sql);
if(!$result){
    echo 'ต่อไม่ได้';
}else{
  ?> 


 <div class="container">
    <div class="aa" >


    <?php  
     while($row = mysqli_fetch_assoc($result)){
    ?>
   <!-- วนตรงนี้ -->
   <form action="infoHisto.php" method="get">
    <button class="btn" name="name" value="<?php echo $row['user_usr'];?> "   >
    <div class="card" style="width: 18rem;">
    <img class="card-img-top" src="../images/userpic/<?php echo $row["pic_usr"];?>" alt="Card image cap" style="  width: 286px;
    height: 150px;">
    <div class="card-body">
        <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
    </div>
    </button>
    </form>


     <?php } ?>
     <!-- สิ้นสุด -->

    </div>
    </div>



  <?php
}
}
?>

   






  <?php include('../footer.php'); ?>