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
    <link rel="icon" href="../images/logoPJ.png" >

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
      <div class="text"><p>ADMIN</p></div>
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
body {
  background: #FFEEEB;
}
.nav-link {
  color: black;
}
.navbar{
  background-color: #e4cbd3 !important;
  font-size: 18px;
  position: sticky;
  top: 0;
}
.text {
  padding: 16px 0 0;
  letter-spacing: 2px;
  font-size: 40px;
  text-align: center;
  color: #551524; 
}
.word {
  padding: 20px;
  background: #7e1f35;
  text-align: center;
  color: white;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
</style>