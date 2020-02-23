<?php
if(isset($_COOKIE["user"])){
session_start();
include("../../../database/database.php"); 
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
    <link rel="stylesheet" href="../../../style.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="icon" href="../../../images/icon_9.png" >  
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
    .container{
        background-color: #FFFFCC;
        width: 400px;
        height: 400px;
        margin: 7em auto;
        border-radius: 1.5em;
        box-shadow: 0px 11px 35px 2px rgba(0, 0, 0, 0.14);
        text-align: center;
        padding-top: 50px;
        font-size : 20px;
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
</style>
<br><br><br>
<div class="container"><br><br>
<?php
//var_dump($_POST["answer"]);


$score =0;

if(isset($_POST["answer"])){
 //echo 'เลือกคำตอบ'; 
 foreach ($_POST["answer"] as $value) {
  
    //  echo  'hi!! '.$value."<br>" ; 
    $sql = "SELECT * FROM exercise_ans WHERE name = 'problem' AND id= '".$value."'  ";

  $result = mysqli_query($connection,$sql);
  if(!$result){
    echo mysqli_error().'<br>';
    die('Can not connect database');
  }else{ 
  $row = mysqli_fetch_assoc($result);

//  echo $row['mark']; 
  $score += $row['mark'];
    }
 
  } 

}else{
   echo 'คุณไม่ได้เลือกคำตอบ<br>';
   $score = 0;
}
//echo 'คุณต้องได้ 8 คะแนนขึ้นไป<br>';
echo "คุณได้ ".$score." คะแนน<br>";

$use =  $_SESSION["username_user"];
$code =  $_SESSION["pincode"];

$sql3 = "SELECT * FROM scoreExercise 
        WHERE code = '$code' 
        AND user_usr = '$use' 
        AND score_problem >= 0 ";
$result3 = mysqli_query($connection,$sql3);
$row3 = mysqli_fetch_assoc($result3);

if(!$row3 ){
  //เพิ่มคะแนนคนที่เล่นครั้งแรก scoreExercise เก็บเฉพาะครั้งแรก
  $sql2 = "UPDATE scoreExercise SET score_problem = '$score' WHERE user_usr = '$use' AND code = '$code' ";
  $result2 = mysqli_query($connection,$sql2);
 
   
  //เพิ่มคะแนนครั้งแรกใน scoreProblem เพิ่อเก็บจำนวนครั้งที่เล่น
  $sql5 = "INSERT INTO scoreProblem VALUES(NULL,'$use','$code',$score)";
  $result5 = mysqli_query($connection,$sql5);

  //echo 'เล่นครั้งแรก';
}else{
  //เพิ่มคะแนนคนที่เล่นครั้งที่ 2,3,4,5,....... เพิ่มใน scoreProblem
  $sql4 = "INSERT INTO scoreProblem VALUES(NULL,'$use','$code',$score)";
  $result4 = mysqli_query($connection,$sql4);
  //echo 'เคยเล่นแล้ว';
}

mysqli_close($connection);
//while($row = mysqli_fetch_assoc($result)){


?>
<br><br>
<a class="btn btn-primary" href="problem.php" role="button">กลับ</a>
</div>


 <!-- ปิด cookie -->

 <?php

}else{
   header("location:../../../logout.php");
}

?>

</body>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>