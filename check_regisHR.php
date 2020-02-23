<?php 

include("database/database.php"); 
$connection = mysqli_connect($localhost,$username,$pass,$database);
mysqli_set_charset($connection,'utf8');

include('header2.php');

?>
  <style>
body{
  background-image: url('images/wallpaperP.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        background-attachment: fixed;
}
.mm{
  letter-spacing: 7px;
  text-align: center; 
  font-size: 80px;
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
      <?php
    
   //isset($_REQUEST['user'])
   
    $hr_name = $_POST['user'];
    $hr_lname = $_POST['luser'];
    $hr_username = $_POST['username'];
    $hr_pass = $_POST['pass'];
    $hr_nhotel = $_POST['nhotel'];
    $hr_province = $_POST['province'];
    $hr_district = $_POST['district'];
    $hr_zipcode = $_POST['zipcode'];
    $hr_email = $_POST['email'];
    $codehr = mt_rand(1111, 9999);
   
    
    $sqlHr = "SELECT user_hr FROM regis_hr";
    $resultHr = mysqli_query($connection,$sqlHr); 
    while($rowHr = mysqli_fetch_assoc($resultHr)){
        $FoundHr[] = $rowHr['user_hr'];
    }
    
    $sqlHrEmail = "SELECT mail_hr FROM regis_hr";
    $resultHrEmail = mysqli_query($connection,$sqlHrEmail); 
    while($rowHrEmail = mysqli_fetch_assoc($resultHrEmail)){
        $FoundHrEmail[] = $rowHrEmail['mail_hr'];
    }
    
    
    $sqlUser = "SELECT user_usr FROM regis_usr";
    $resultUser = mysqli_query($connection,$sqlUser); 
    while($rowUser = mysqli_fetch_assoc($resultUser)){
        $FoundUser[] = $rowUser['user_usr'];
    }
    
    $sqlUserEmail = "SELECT email_usr FROM regis_usr";
    $resultUserEmail = mysqli_query($connection,$sqlUserEmail); 
    while($rowUserEmail = mysqli_fetch_assoc($resultUserEmail)){
        $FoundUserEmail[] = $rowUserEmail['email_usr'];
    }
    
    $ADMIN = "SELECT user FROM ADMIN";
    $resultADMIN = mysqli_query($connection,$ADMIN); 
    while($rowADMIN = mysqli_fetch_assoc($resultADMIN)){
        $FoundADMIN[] = $rowADMIN['user'];
    }

    if( in_array($hr_username,$FoundUser)){
       ?>
      <br><br><br><br><br>
    <div class="container"  >
    <div class="card">
    <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
    <div class="center">ขออภัยด้วยชื่อ  "<?php echo $hr_username;?>" มีคนใช้แล้ว</div>
    </div>
  </div><br>
     <div class="link">
         <a href="registration_hr.php" class="btn btn-outline-dark">ตกลง</a>
     </div>

       <?php
    
      }elseif(in_array($hr_username,$FoundHr)){
    
        ?>
      <br><br><br><br><br>
    <div class="container" >
    <div class="card">
    <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
    <div class="center">ขออภัยด้วยชื่อ  "<?php echo $hr_username;?>" มีคนใช้แล้ว</div>
    </div>
  </div><br>
     <div class="link">
         <a href="registration_hr.php" class="btn btn-outline-dark">ตกลง</a>
     </div>

       <?php
    
      }elseif(in_array($hr_username,$FoundADMIN)){
    
        ?>
      <br><br><br><br><br>
    <div class="container" >
    <div class="card">
    <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
    <div class="center">ขออภัยด้วยชื่อ  "<?php echo $hr_username;?>" มีคนใช้แล้ว</div>
    </div>
  </div><br>
     <div class="link">
         <a href="registration_hr.php" class="btn btn-outline-dark">ตกลง</a>
     </div>

       <?php
    
      }elseif(in_array($hr_email,$FoundUserEmail)){
    
        ?>
      <br><br><br><br><br>
    <div class="container" >
    <div class="card">
    <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
    <div class="center">ขออภัยด้วยอีเมล  "<?php echo $hr_email;?>" มีคนใช้แล้ว</div>
    </div>
  </div><br>
     <div class="link">
         <a href="registration_hr.php" class="btn btn-outline-dark">ตกลง</a>
     </div>

       <?php
    
      }elseif(in_array($hr_email,$FoundHrEmail)){
    
        ?>
        <br><br><br><br><br>
      <div class="container" >
      <div class="card">
      <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
      <div class="center">ขออภัยด้วยอีเมล  "<?php echo $hr_email;?>" มีคนใช้แล้ว</div>
      </div>
    </div><br>
       <div class="link">
           <a href="registration_hr.php" class="btn btn-outline-dark">ตกลง</a>
       </div>
  
         <?php
    
      }else{
      $sql = 'INSERT INTO regis_hr VALUES(NULL,"'.$hr_name.'","'.$hr_lname.'","'.$hr_username.'", "'.$hr_pass.'","'.$hr_nhotel.'",
                                            "'.$hr_province.'","'.$hr_district.'",
                                            "'.$hr_zipcode.'","'.$hr_email.'","'.$codehr.'")';
       $result = mysqli_query($connection,$sql); 

        if($sql==TRUE){
            $code = "Room_$codehr";
            $sql3 = "CREATE TABLE $code(id int AUTO_INCREMENT,
                                                code varchar(7) COLLATE 'utf8_general_ci',
                                                 pic_usr varchar(30) COLLATE 'utf8_general_ci',
                                                 name_usr varchar(30) COLLATE 'utf8_general_ci',
                                                 lname_usr varchar(40) COLLATE 'utf8_general_ci',
                                                 user_usr varchar(30) COLLATE 'utf8_general_ci',
                                                 pass_usr varchar(20) COLLATE 'utf8_general_ci',
                                                 email_usr varchar(30) COLLATE 'utf8_general_ci',
                                                 pretest int(20) COLLATE 'utf8_general_ci',
                                                 time_pretest varchar(10) COLLATE 'utf8_general_ci',
                                                 posttest int(20) COLLATE 'utf8_general_ci',
                                                 time_posttest varchar(10) COLLATE 'utf8_general_ci',
                                                 PRIMARY KEY (id)
                                                 ) COLLATE='utf8_general_ci' ";
            $result3 = mysqli_query($connection,$sql3); 
            if($sql3==TRUE){
                ?>

            <br><br><br><br><br>
                <div class="container"  >
                <div class="card" >
                <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
                <div class="centeredd">PINCODE</div>
                </div>
              </div><br>
            
              
              <p class="mm" ><?php echo $codehr; ?></p>
                  <br>
                <div class="link">
                    <a href="login.php" class="btn btn-outline-dark">ตกลง</a>
                </div>

                <?php 
            }else{
              ?>

              <br><br><br><br><br>
                  <div class="container"  >
                  <div class="card" >
                  <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
                  <div class="center">เกิดข้อผิดพลาดไม่สามารถสร้างห้องได้</div>
                  </div>
                </div><br>
              
                  <div class="link">
                      <a href="login.php" class="btn btn-outline-dark">ตกลง</a>
                  </div>
  
                  <?php 
            }
        }else{
          ?>

          <br><br><br><br><br>
              <div class="container"  >
              <div class="card" >
              <div class="card-body "  style="text-align: center; background-color: #FECCCC;"  >
              <div class="center">เกิดข้อผิดพลาดบางอย่าง</div>
              </div>
            </div><br>
          
              <div class="link">
                  <a href="login.php" class="btn btn-outline-dark">ตกลง</a>
              </div>

              <?php 
        }

        $sql4 = "INSERT INTO nameHr VALUEs(NULL,'$hr_name','$hr_username','$codehr')";
        $result4 = mysqli_query($connection,$sql4); 
   
    }
      ?>
  <?php include('footer.php'); ?>
  