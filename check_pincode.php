
<?php 
ob_start();
include('header2.php'); ?>
<style>
body{
  background-image: url('images/wallpaperP.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
}
.centered {
  color: #501C07;
  font-size: 60px;
  letter-spacing: 8px;
}
.center{
  color: #501C07;
  font-size: 45px;
  letter-spacing: 1px;
}
.link{
  text-align: center;
  
}
.btn-outline-dark{
  width: 120px;
  height: 60px;
  font-size: 29px;
}
.centeredd{
  color: #501C07;
  font-size: 50px;
  letter-spacing: 6px;
}

</style>
  <div class="container">
  <?php 
  

  if(isset($_COOKIE["user"])){
    header("location:home/pretest.php"); 
  }else{
  date_default_timezone_set('Asia/Bangkok');
  $day = date("d-m-Y");
  $time = date("H:i:s");
  
  
  $logpin = $_POST['pincode'];
  include("database/database.php");
  $connection = mysqli_connect($localhost,$username,$pass,$database);
  mysqli_set_charset($connection,'utf8');
  $sql = "SELECT * FROM regis_hr WHERE code = '$logpin'";
  $result = mysqli_query($connection,$sql);
  $row = mysqli_fetch_array($result);

  if(!$row){

    ?> 
    <br><br><br><br><br>
      <div class="container" >
      <div class="card">
      <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
      <div class="center">ไม่มี PINCODE นี้</div>
      </div>
    </div><br>
       <div class="link">
           <a href="login_pin.php" class="btn btn-outline-dark">ตกลง</a>
       </div>
    
        <?php
    }else{
    if(session_start()){
      setcookie(session_name(), NULL, '/');
      $_SESSION["pincode"] = $logpin;
    
      
      $nam3 = $_SESSION["username_user"];
      setcookie("user",$nam3, time()+ 3600*5);
      $sql2 = "SELECT * FROM regis_usr WHERE user_usr = '$nam3'";
      $result2 = mysqli_query($connection,$sql2);
      $row2 = mysqli_fetch_array($result2);

      $picture = $row2['pic_usr'];
      $fullname = $row2['name_usr'];
      $lasname = $row2['lname_usr'];
      $username = $row2['user_usr'];
      $password = $row2['pass_usr'];
      $email = $row2['email_usr'];

      $room = 'Room_'.$logpin;

      $code = $_SESSION["pincode"];
     // echo  $room."<br>" ;
     
     $_SESSION["time"] = $time;
     $_SESSION["day"] = $day;

      $sql5 = "INSERT INTO ReTim VALUES(NULL,'$username','$code','$day','$time')";
      $result5 = mysqli_query($connection,$sql5);
      if($result5 == TRUE){
       // echo 'บันทึกเวลาได้';
      }else{
        ?> 
        <br><br><br><br><br>
          <div class="container" >
          <div class="card">
          <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
          <div class="center">ไม่สามารถบันทึกเวลาได้</div>
          </div>
        </div><br>
           <div class="link">
               <a href="login.php" class="btn btn-outline-dark">ตกลง</a>
           </div>
        
            <?php
      }

  

      $sql4 = "SELECT * FROM $room WHERE user_usr = '$nam3' ";
      $result4 = mysqli_query($connection,$sql4);
      $row4 = mysqli_fetch_array($result4);
    //  // echo $row4['pretest'];
      
      if($row4['pretest'] > 0){
        header("location:home/index.php"); 

      }else{
         $sql6 = "UPDATE regis_usr 
         SET code = '$logpin'
         WHERE `user_usr` = '$username'";
          $result6 = mysqli_query($connection,$sql6);

          if(! $result6){
            ?> 
            <br><br><br><br><br>
              <div class="container" >
              <div class="card">
              <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
              <div class="center">เกิดบางอย่างผิดพลาด</div>
              </div>
            </div><br>
               <div class="link">
                   <a href="login.php" class="btn btn-outline-dark">ตกลง</a>
               </div>
            
                <?php
          }else{
            //echo $nam3."<br>";
            //echo 'เพิ่มได้';
          }
        $sql3 = "INSERT INTO $room VALUES(NULL,'$logpin','$picture','$fullname','$lasname','$username','$password','$email',-1,'-',-1,'-')";
            $result3 = mysqli_query($connection,$sql3);
            if($result3==TRUE){
              header("location:home/pretest.php"); 
            }else{
              ?> 
              <br><br><br><br><br>
                <div class="container" >
                <div class="card">
                <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
                <div class="center">เกิดบางอย่างผิดพลาด</div>
                </div>
              </div><br>
                 <div class="link">
                     <a href="login.php" class="btn btn-outline-dark">ตกลง</a>
                 </div>
              
                  <?php
            }

            $i = 1;
            while($i<=24){
              $sqlInsTi = "INSERT INTO LessonTimeNew VALUES(NULL,'$i','$username','$logpin',0)";
              $resultInsTi = mysqli_query($connection,$sqlInsTi);
             $i++;
           } 
        
           
      }
   
    }
    }
    
  }//cookie
  ?>
  </div>
  <?php
  ob_end_flush();
        include('footer.php');
    ?>