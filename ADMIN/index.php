<?php 
session_start(); 
//var_dump($_COOKIE);
if(isset($_COOKIE["minny"])){
  include("../database/database.php"); 
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ADMIN</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="../style.css">
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
       
        </ul>
        <form class="form-inline my-2 my-lg-0">
        <a  class="nav-link" href="../logout_hr.php">ออกจากระบบ </a>
        </form>
    </div>
    </nav>
      <div class="container">
    
      </div>
      <div class="text"><h3>ADMIN</h3></div>
<div class="container"><br>
<?php 

?>

<?php 
$sql = "SELECT code,NHo_hr FROM regis_hr ORDER BY id_hr ASC"  ; 
$result = mysqli_query($connection,$sql);

if(!$result){
    echo 'เกิดข้อผิดผลาดบางอย่าง';
}else{
?>
<form action="MGRoom_ADMIN.php" method="get" style="text-align: center;">
<?php 
while($row = mysqli_fetch_assoc($result)){
    // echo $row['code'];
?>
<button  type="submit" name = "code" value="<?php echo $row['code']; ?>" class="btn">
    <div class="">
      <div class="word">
      <img src="../images/hotel2.png" style="width: 61px; height: 61px;">
      <p>ห้อง: <?php echo $row['code']; ?></p>
      <p>โรงแรม: <?php echo $row['NHo_hr']; ?></p>
      </div>
    </div>
    </button>  
<?php
}
?>
</form>
<?php
  mysqli_close($connection);
}
?>
</div>
  <?php 
  }else{
    
    header("location:../logout_hr.php");
  }
  include('../footer.php'); ?>
<style>
.navbar{
  background-color: #660223;
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
body{
  background-image: url('../images/wall.png');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
}
.text{
  text-align: center;
  background-image: url('../images/wallpa.jpg');
  color: white;
  height: 80px;
  padding: 21px; 
}
.word{
  color: white;
  background-color: #AE0F0F;
  height: 164px;
  border-radius: 15px;
  text-align: center;
  padding: 23px;
  width: 350px;
}
</style>