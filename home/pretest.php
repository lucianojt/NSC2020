<?php 
ob_start();
session_start(); 
include("../database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');
date_default_timezone_set('Asia/Bangkok');
$time = date("H:i:s");
$today = date("Y-m-d");
$_SESSION["time_start"] = $time;
$_SESSION["today_start"] = $today;
if (isset($_COOKIE["user"])) {
?>
<!doctype html>
<html lang="en">
  <head>
    <title>ทดสอบก่อนเรียน</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" href="../images/logoPJ.png" >
    <script type="text/javascript" src="../jquery-3.4.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<script src="../jquery.validation.min.js"></script>
    
  </head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">CHINY</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
      </ul>
        <a class="nav-link" href="../logout.php">ออกจากระบบ</a>
    </div>
  </nav>
<br>
<div class="container question">
<form class="form-horizontal" role="form" id='' method="post" action="pre_re.php">
<?php
    $sql = "SELECT *
            FROM pretest
            ORDER BY RAND()";
    $result = mysqli_query($connection,$sql);
    $rows = mysqli_num_rows($result);
    if (!$result) {
        echo mysqli_error().'<br>';
        die('Can not connect database');
    } else {
    ?>
      <div class="questiona ">
        <h5 class="text-center">เลือกประโยคที่ถูกต้อง</h5>
      </div>
    <?php
      $i=1;
      while($row = mysqli_fetch_assoc($result)){
    ?>   
    <div id='question<?php echo $i;?>' class='cont'>
      <div class="questions" style="text-align:center;  font-size: 20px; font-weight: bold;">
        <p id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo " ".nl2br($row['que']);?></p>
      </div>
      <?php
        $sql2 = " SELECT *
              FROM pretest_ans
              WHERE p_id = ".$row['p_id']."
              ORDER BY RAND()";
        $result2 = mysqli_query($connection,$sql2);
      ?> 
      <div class="buttom">
        <?php
        while($row2 = mysqli_fetch_assoc($result2)){
        ?>
          <label class="radio" >
            <div class="test">
              <div class="choice" >
                <input type="radio" value="<?php echo $row2['as_id'];?> " id='radio1_<?php echo $row2['as_id']; ?>' name="answer[<?php echo $i; ?>]"/>
              </div>
              <div>
                <p style="color: yellow; font-size: 20px; font-weight: bold;" ><?php  echo $row2['ConChi'];?></p><p><?php echo $row2['ConEng'];?></p>
              </div>
            </div>
          </label>
        <?php
        }
        ?>
        <label  class="radio" >
          <div class="test">
            <div class="choice" >
              <input type="radio" value="-200" id='radio1_-200' name="answer[<?php echo $i; ?>]"/>
            </div>
            <div class="texts" >
              <p>ไม่ทราบ</p>
            </div>
          </div>
         </label>
        </div>
           <?php if($i==1){ 
            ?>
          <button id='next<?php echo $i;?>' class='next btn btn-info' type='button'>
             ถัดไป
            <i class="material-icons">
              keyboard_arrow_right
            </i>
          </button>
            <?php }elseif($i<1 || $i<$rows){?>
          <div class="buttom">
            <button id='pre<?php echo $i;?>' class='previous btn btn-warning' type='button'>
              <div class="mat">
                <i class="material-icons">
                  keyboard_arrow_left
                </i>
              </div>
              <div class="before">
                ก่อนหน้า
              </div>
            </button>
            <button id='next<?php echo $i;?>' class='next btn btn-info' type='button'>
              ถัดไป
              <i class="material-icons">
                keyboard_arrow_right
              </i>
            </button>
          </div>
            <?php }elseif($i==$rows){?>
          <div class="buttoms">
            <button id='next<?php echo $i;?>' class='next btn btn-info' type='submit'>เรียบร้อย</button>
          </div>
            <?php }
            $i++;?>
          </div>
        <?php
      }?>
      </form>
    <?php
  }
  mysqli_close($connection);
?>
</div>
<?php
}else{
  header("location:../logout.php");
}
include('../footer.php');
ob_end_flush();
?>
<script>
$('.cont').addClass('hide');
count=$('.questions').length;
$('#question'+1).removeClass('hide');
$(document).on('click','.next',function(){
    element=$(this).attr('id');
    if(element.length == 5) last = parseInt(element.substr(element.length - 1));
    else last = parseInt(element.substr(element.length - 2));
    nex=last+1;
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
<style>
body {
  background: #F5F5F5;
}
.bg-light {
  background-color: #F5F5F5!important;
}
.material-icons {
  position: absolute;
}
.nav-link {
  color: black;
}
.navbar{
  background-color: #F5F5F5;
}
.questiona {
  background: black;
  padding: 10px;
  color: #fff;
  border-bottom-right-radius: 55px;
  border-top-left-radius: 55px;
  font-size: 18px;
  margin: auto;
}
.radio {
  width: 100%;
  background-color: #AF2020;
  padding: 16px 0;
  color: white;
  border-radius: 10px;
  cursor:pointer; 
  display: flow-root;
}
.test {
  display: flex;
  padding-left: 20px;
}
.text-center {
  margin: 8px 0;
}
.btn-info {
 width: 30%;
 float:right;
}
.mat {
  margin-right: 100%;
}
.btn-warning {
  float: left;
  width: 30%;
}
@media (max-width: 575.98px) {
  .btn-warning {
    width: 35%;
  }
  .before {
    margin-left: 18%;
  }
  .radio { 
    width: 100%;
    padding: 10px 0;
  }
  .test {
    padding-left: 20px;
  }
  .questiona {
    padding: 6px;
  }
  .text-center {
    margin: 4px 0;
  }
  .questions {
    font-size: 20px;
  }
}
input[type=radio] {
  height: 20px;
  width: 20px;
}
p {
  margin: 0;
}
.hide{
  display: none;
}
.radio:hover {
  background-color: #97570A;
  color: black;
}
.container {
  width: 65%;
}
@media (max-width: 575.98px) {
  .container { 
    width: 100%;
  }
}
.questions {
  margin: 20px 0;
}
.choice {
  padding: 14px 0;
  padding-right: 14px;
}
.texts {
  margin-top: 12px;
}
</style>