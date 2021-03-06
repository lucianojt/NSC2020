<!doctype html>
<html lang="en">
  <head>
    <title>สมัครสมาชิก</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="images/logoPJ.png" >

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <form action="check_regisUS.php" method="post" enctype="multipart/form-data">
    <div class="bodyDetail">
      <p class="titleName">สมัครสมาชิก</p>
      <div class="images">
        <input type="file" id="file" name="pic_usr" accept="image/*">
        <label class="label" for="file">
          <i class="material-icons"> add_photo_alternate </i> &nbsp; เลือกรูปภาพ
        </label>
      </div>
      <div class="information">
        <p class="text" >ชื่อจริง*</p>
        <input type="text" class="form-control" name="user" id="user" placeholder="Aekburut" required>
      </div>
      <div class="information">
        <p class="text" >นามสกุล*</p>
        <input type="text" class="form-control" name="luser" id="luser" placeholder="Rawangngan" required>
      </div>
      <div class="information">
        <p class="text" >ชื่อผู้ใช้*</p>
        <input type="text" class="form-control" name="username" id="username" placeholder="geem" required>
      </div>
      <div class="information">
        <p class="text" >รหัสผ่าน*</p>
        <input type="password" class="form-control" name="pass" id="password" placeholder="xxxxxxxxxxx" required>
      </div>
      <div class="information">
        <p class="text" >ยืนยันรหัสผ่าน*</p>
        <input type="password" class="form-control" name="conpass" id="confirm_password" placeholder="xxxxxxxxxxx" required>
      </div>
      <div class="information">
        <p class="text" >อีเมล*</p>
        <input type="email" class="form-control" name="email" id="email" placeholder="geem@gmail.com" required>
      </div>
      <div class="buttom">
        <button type="submit" name="submit"  class="btn btn-info">ตกลง</button>
        <!-- <a class="btn btn-danger" href="login.php" role="button">ยกเลิก</a> -->
      </div>
    </div>
  </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<script>
var password = document.getElementById("password")
, confirm_password = document.getElementById("confirm_password");
function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("รหัสผ่านไม่ตรงกัน");
    } else {
        confirm_password.setCustomValidity('');
    }
}
password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>
<style>
body {
  background: #F5F5F5;
}
.bodyDetail {
  border: none;
  position: absolute;
  margin: 0 auto;
  width: 60%;
  height: auto;
  border-radius: 20px;
  top: 6%;
  left: 50%;
  transform: translate(-50%, 0%);
  background-color: #FFFFFF;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
@media (max-width: 575.98px) {
  .bodyDetail { 
    width: 80%;
  }
}
.images {
  display: flex;
  align-items: center;
  justify-content: center;
}
input[type="file"]{
  display: none;
}
.label{
  background-color: #DC143C;
  cursor: pointer;
  border-radius: 20px;
  width: 150px;
  height: 50px;
  color: white;
  text-align: center;
  padding: 10px;
  align-items: center;
  display: flex;
  justify-content: center;
}
.label:hover {
  background-color: #B01131;
}
.titleName {
  text-align: center;
  margin: 20px 12px;
  font-size: 36px;
}
.information {
  margin: 12px 20px 18px;
  color: #5A5454;
}
.text {
  margin-bottom: 6px;
}
.buttom {
  margin: 12px 20px 18px;
  text-align: center;
}
.btn-info {
  width: 45%
}
.btn-danger {
  width: 45%
}
</style>