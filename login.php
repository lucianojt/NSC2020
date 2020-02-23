<?php
if (isset($_COOKIE["user"])) {
  header("location:home/index.php");
}
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Wellcome to Chiny!!</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link href="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.css" rel="stylesheet">
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" href="images/logoPJ.png" >
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>
  <form action="check_Login.php" method="post">
    <div class="card">
      <div class="card_body">
        <div class="row">
          <div class="col-sm card_detail">
            <div class="detail_title">
              <p>เข้าสู่ระบบ</p>
            </div>
            <div class="name">
              <div class="username">
                <i class="material-icons">
                person
                </i>
                <input class="input" type="text" id="username" name="user" placeholder="ชื่อผู้ใช้">
              </div>
            </div>
            <div class="password">
              <div class="username">
                <i class="material-icons">
                lock
                </i>
                <input class="input" type="password" id="username" name="pass" placeholder="รหัสผ่าน">
              </div>
            </div>
            <div class="button">
              <button type="submit" class="btn btn-info">เข้าสู่ระบบ</button>
              <a class="btn btn-danger" href="registration_user.php" role="button">สมัครเข้าใช้งาน</a>
            </div>
          </div>
          <div class="col-sm card_images">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img class="d-block w-100" src="images/receptionist1.jpeg" alt="First slide">
                </div>
              </div>
              <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
              <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
            </div>
            <a href="registration_hr.php" class="text-reset sigin">" สมัครเป็นผู้ดูแลห้อง "</a>
          </div>
        </div>
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

<style>
body {
  background: #F5F5F5;
}
.card {
  position: absolute;
  margin: 0 auto;
  width: 80%;
  height: auto;
  border: none;
  border-radius: 20px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  animation-name: example;
  animation-duration: 1.1s;
}
@keyframes example {
  0% {
    top: 0%;
  }
  75%  {
    top: 60%;
  }
  100%  {
    top: 50%;
  }
}
.card_body {
  margin: 20px 20px 20px 20px;
}
.card_images {
  text-align: center;
}
.card_detail {
  text-align: left;
}
.detail_title {
  font-size: 36px;
  margin: 20px 0;
  cursor: default;
  text-align: center;
}
.name {
  border-bottom: 1px solid black;
}
.username {
  display: flex;
}
.password {
  border-bottom: 1px solid black;
  margin-top: 35px;
}
.input {
  margin-left: 6px;
  width: 100%;
  border-top-style: hidden;
  border-right-style: hidden;
  border-left-style: hidden;
  border-bottom-style: hidden;
  color: #3E3E3E;
  cursor: pointer;
}
input:focus{
  outline: none;
}
.button {
  text-align: left;
  margin: 20px 0;
  text-align: center;
}
.sigin {
  text-decoration: none;
}
.w-100 {
  max-height: 270px;
  margin-bottom: 6px;
  border-radius: 18px;
}
.btn-success {
  background-color: #AF2020;
  border-color: #AF2020;
}
.btn-success:hover {
  background-color: #821B1B;
  border-color: #AF2020;
}
</style>