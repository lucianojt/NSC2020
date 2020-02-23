<!DOCTYPE html>
<html lang="en">
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href='https://fonts.googleapis.com/css?family=Kanit:400,300&subset=thai,latin' rel='stylesheet' type='text/css'>
    <title>regis</title>
</head>
<body>
<?php
//echo $_COOKIE["user"];
?>
   <div class="container register">
<form action="check_pincode.php" method="post">
                <div class="row">
                    <div class="col-md-3 register-left">
                    <div class="imga">
                        <img src="images/Logo-PSU.png" style="width:150px;"  alt=""/>
                        <h3>ยินดีต้อนรับเข้าสู่</h3>
                        <h2>Chiny</h2>
                        </div>
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">กรุณาใส่ Pin Code</h3>
                                <div class=" register-form">
                                    <div class="col-md-6">
                                        <div class="form-group" style="text-align: center;">
                                            <input type="text" class="form-control"  name="pincode" placeholder="Pin Code *" value="" required  />
                                            <input type="submit" class="btnRegister"  value="ตกลง" />
                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <div class="row register-form">
                               </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div> 
</body>
</html>
<script>
        
</script>
<style>
body{
    font-family: 'Kanit', sans-serif;
    background-image: url('images/wall.png');
    background-size: cover;
    background-repeat: no-repeat;
    background-attachment: fixed;
}

.imga{
    background: #fff;
    border-radius: 1.5rem;
    width: cover;
    text-align: center;
    color: #000000;
    padding: 3%;
}
.register{
    /* background: linear-gradient(to right, #FF0000, #FF0033); */
    margin-top: 4%;
    padding: 3%;
    border-radius: 1.5rem;
    background-image: url('images/BG.gif');
    
    
}
.register-left{
    text-align: center;
    color: #fff;
    margin-top: 4%;
}
.register-left input{
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    width: 20%;
    background: #f8f9fa;
    font-weight: bold;
    color: #383d41;
    margin-top: 30%;
    margin-bottom: 3%;
    cursor: pointer;
}
.register-right{
    background: #E6E6FA;
    border-top-left-radius: 10% 50%;
    border-bottom-left-radius: 10% 50%;
}
.register-left img{
    margin-top: 15%;
    margin-bottom: 5%;
    width: 25%;
    -webkit-animation: mover 2s infinite  alternate;
    animation: mover 1s infinite  alternate;
}
@-webkit-keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
@keyframes mover {
    0% { transform: translateY(0); }
    100% { transform: translateY(-20px); }
}
.register-left p{
    font-weight: lighter;
    padding: 12%;
    margin-top: -9%;
}
.register .register-form{
    padding: 10%;
    margin-top: 10%;
}
.btnRegister{
    
    margin-top: 10%;
    border: none;
    border-radius: 1.5rem;
    padding: 2%;
    background: #FF0000;
    color: #fff;
    font-weight: 600;
    height: 40%;
    width: 50%;
    cursor: pointer;
    font-size: 22px;
    text-align: center;
}
.register .nav-tabs{
    margin-top: 3%;
    border: none;
    background: #0062cc;
    border-radius: 1.5rem;
    width: 28%;
    float: right;
}
.register .nav-tabs .nav-link{
    padding: 2%;
    height: 34px;
    font-weight: 600;
    color: #fff;
    border-top-right-radius: 1.5rem;
    border-bottom-right-radius: 1.5rem;
}
.register .nav-tabs .nav-link:hover{
    border: none;
}
.register .nav-tabs .nav-link.active{
    width: 100px;
    color: #0062cc;
    border: 2px solid #0062cc;
    border-top-left-radius: 1.5rem;
    border-bottom-left-radius: 1.5rem;
}
.register-heading{
    text-align: center;
    margin-top: 8%;
    margin-bottom: -15%;
    color: #495057;
}
</style>