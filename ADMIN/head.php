<?php 
echo ' 
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
<a class="navbar-brand" href="index.php">
<img src="../images/icon_9.png" width="40" height="30" class="d-inline-block align-top" alt="">
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarTogglerDemo03">
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
    <li class="nav-item active">
    <a class="nav-link" href="acce_info.php">เวลาเข้าใช้งาน <span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="history.php">ประวัติพนักงาน</a>
    </li>
    <li class="nav-item active">
    <a class="nav-link" href="score_chart.php">คะแนนการทดสอบ</a>
    </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
    <a  class="nav-link" href="../logout_hr.php">ออกจากระบบ </a>
    </form>
</div>
</nav>';
?>