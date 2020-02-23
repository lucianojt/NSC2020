<!doctype html>
<html lang="en">
  <head>
    <title>ใส่ pincode</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="images/logoPJ.png" >
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
  <form action="check_pincode.php" method="post">
    <div class="bodyDetail">
      <div class="title">
        <p style="font-size: 30px; margin: 0">PIN CODE</p>
        <small style="margin: 0 0 14px" class="form-text text-muted">pincode ที่ได้มาจากผู้ดูแลห้อง</small>
      </div>
      <div class="pincode">
        <input type="text" name="pincode" class="form-control" placeholder="xxxx">
        <button type="submit" class="btn btn-info">ตกลง</button>
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
.bodyDetail {
  border: none;
  position: absolute;
  margin: 0 auto;
  width: 50%;
  height: auto;
  border-radius: 20px;
  top: 6%;
  left: 50%;
  transform: translate(-50%, 0%);
  background-color: #FFFFFF;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  animation-name: example;
  animation-duration: 1.1s;
}
@media (max-width: 575.98px) {
  .bodyDetail { 
    width: 80%;
  }
}
@keyframes example {
  0% {
    top: 0%;
  }
  25% {
    top: 20%;
  }
  50% {
    top: 4%;
  }
  75% {
    top: 10%;
  }
  100% {
    top: 6%;
  }
}
.title {
  text-align: center;
  margin: 20px 0;
}
.pincode {
  margin: 0 20px 20px;
  text-align: center;
}
input { 
  text-align: center;
  cursor: pointer;
}
.form-control {
  margin: 14px 0;
}
</style>