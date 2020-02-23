<?php 
ob_start();
if(isset($_COOKIE["user"])){
?>
<!doctype html>
<html lang="en">
  <head>
    <title>การสะกดเสียงภาษาจีน (พินอิน)</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Kanit" rel="stylesheet">
    <link rel="stylesheet" href="../../../style.css">
    <link rel="icon" href="../../../images/icon_9.png" >
  </head>
  <body>
  <nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="../../../home/index.php">
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
        <a class="nav-link" href="../../result.php">ผลสรุป</a>
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
        /* overflow: hidden;
        position: fixed;
        top: 0;
        width: 100%; */
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
   
   .text{
    text-align: center;
    background-image: url('../../../images/wallpa.jpg');
    color: white;
    height: 80px;
    padding: 21px; 
   }
  .head{
    font-weight: bold;
    color: #660223;
  }
  .colo{
    background-color: #FFFDFD;
  }
  .bb{
    text-align: left; 
    width: 13%;
    color: #0A3073;
    font-size: 18px;
  }
  .cc{
    text-align: center;
  }
  /* .btn-secondary{
      color: black;
  } */
  .btn-primary{
    background-color: #FEF9D3;
    color: #FEF9D3;
  }
    </style>
   
   <!-- start -->
   
   <div class="text"><h3>การสะกดเสียงภาษาจีน (พินอิน)</h3></div><br>

   <div class="container">
   <div class="link">
   <h6><a href="../../../home/index.php" class="text-reset">หน้าหลัก</a> > <a href="../../gramma.php" class="text-reset">ไวยากรณ์</a> > <a href="pinyin.php" class="text-reset">การสะกดเสียงภาษาจีน (พินอิน)</a></h6>
   </div>
   </div>
    <br>
    <script>
        function playSound(pp){
    var audios = document.getElementsByTagName('audio');
    console.log(pp);
    for(var i = 0, len = audios.length; i < len;i++){
        if(audios[i].id == "sound" + pp){
           // console.log(audios[i]);
            audios[i].play();
            if (audios[i].paused) {
           audios[i].play();
           }else{
               audios[i].currentTime = 0
           }
          
        }
    }
}

document.addEventListener('play', function(e){
    var audios = document.getElementsByTagName('audio');
    for(var i = 0, len = audios.length; i < len;i++){
        if(audios[i] != e.target){
            audios[i].pause();
            audios[i].currentTime = 0;
        }
    }
}, true);
        
    
    </script>
<div class="container">
<div class="head">
<h5>1. พยัญชนะ 声母 Shēngmǔ</h5>
</div><br>
<div class="table-responsive">
<div class="colo">
<table class="table">
    <tr>
      <th class="bb" >ริมฝีปาก</th>
      <td class="cc">
      <audio id="sound1" src="../../../sound/consonant/b.mp3"></audio>
        <button onclick="playSound(1)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary k"> 
            b (โปะ) 
        </button>
      </td>
      <td class="cc" >
       <audio id="sound2" src="../../../sound/consonant/p.mp3"></audio>
       <button onclick="playSound(2)" type="button" class="btn btn-light ">p (โพะ)</button></td>
      <td class="cc" >
       <audio id="sound3" src="../../../sound/consonant/m.mp3"></audio>
       <button onclick="playSound(3)" type="button" class="btn btn-light ">m (โมะ)</button></td>
      <td class="cc" >
       <audio id="sound4" src="../../../sound/consonant/f.mp3"></audio>
       <button onclick="playSound(4)" type="button" class="btn btn-light ">f (โฟะ)</button></td>
    </tr>
    <tr>
      <th class="bb" >ปุ่มเหงือกบน</th>
      <td class="cc">
      <audio id="sound5" src="../../../sound/consonant/d.mp3"></audio>
        <button onclick="playSound(5)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary ">
            d (เตอะ)
        </button>
      </td>
      <td class="cc" >
       <audio id="sound6" src="../../../sound/consonant/t.mp3"></audio>
       <button onclick="playSound(6)" type="button" class="btn btn-light ">t (เทอะ)</button></td>
      <td class="cc" >
       <audio id="sound7" src="../../../sound/consonant/n.mp3"></audio>
       <button onclick="playSound(7)" type="button" class="btn btn-light ">n (เนอะ)</button></td>
      <td class="cc" >
       <audio id="sound8" src="../../../sound/consonant/l.mp3"></audio>
       <button onclick="playSound(8)" type="button" class="btn btn-light ">l (เลอะ)</button></td>
    </tr>
    <tr>
      <th class="bb" >เพดานอ่อน</th>
      <td class="cc">
       <audio id="sound9" src="../../../sound/consonant/g.mp3"></audio>
       <button onclick="playSound(9)" type="button" class="btn btn-light ">g (เกอะ)</button></td>
      <td class="cc" >
       <audio id="sound10" src="../../../sound/consonant/k.mp3"></audio>
       <button onclick="playSound(10)" type="button" class="btn btn-light ">k (เคอะ)</button></td>
      <td class="cc" >
       <audio id="sound11" src="../../../sound/consonant/h.mp3"></audio>
       <button onclick="playSound(11)" type="button" class="btn btn-light ">h (เฮอะ)</button></td>
      <td class="cc" >-</td>
    </tr>
    <tr>
      <th class="bb" >เพดานแข็ง</th>
      <td class="cc">
       <audio id="sound12" src="../../../sound/consonant/j.mp3"></audio>
        <button onclick="playSound(12)" style="background-color: #D9F1F1; color:black;" type="button" class="btn btn-secondary ">
            j (จิ)
        </button>
      </td>
      <td class="cc">
       <audio id="sound13" src="../../../sound/consonant/q.mp3"></audio>
        <button onclick="playSound(13)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary ">
            q (ชิ)
        </button>
      </td>
      <td class="cc">
       <audio id="sound14" src="../../../sound/consonant/x.mp3"></audio>
        <button onclick="playSound(14)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary ">
            x (สิ)
        </button>
      </td>
      <td class="cc" >-</td>
    </tr>
    <tr>
      <th class="bb" >ปุ่มเหงือกบน</th>
      <td class="cc">
       <audio id="sound15" src="../../../sound/consonant/z.mp3"></audio>
        <button onclick="playSound(15)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary ">
        z (จึ)
        </button>
      </td>
      <td class="cc">
       <audio id="sound16" src="../../../sound/consonant/c.mp3"></audio>
        <button onclick="playSound(16)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary ">
        c (ชึ)
        </button>
      </td>
      <td class="cc">
       <audio id="sound17" src="../../../sound/consonant/s.mp3"></audio>
        <button onclick="playSound(17)" style="background-color: #D9F1F1; color:black;" type="button" class="btn btn-secondary ">
        s (สึ)
        </button>
      </td>
      <td class="cc" >-</td>
    </tr>
    <tr>
      <th class="bb" >ม้วนปลายลิ้น</th>
      <td class="cc">
       <audio id="sound18" src="../../../sound/consonant/zh.mp3"></audio>
        <button onclick="playSound(18)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary ">
        zh (จึ)
        </button>
      </td>
      <td class="cc">
       <audio id="sound19" src="../../../sound/consonant/ch.mp3"></audio>
        <button onclick="playSound(19)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary ">
        ch (ชึ)
        </button>
      </td>
      <td class="cc">
       <audio id="sound20" src="../../../sound/consonant/sh.mp3"></audio>
        <button onclick="playSound(20)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary ">
        sh (สึ)
        </button>
      </td>
      <td class="cc">
       <audio id="sound21" src="../../../sound/consonant/r.mp3"></audio>
        <button onclick="playSound(21)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary ">
        r (รึ)
        </button>
      </td>
    </tr>
</table>
</div>


</div><div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>หมายเหตุ</strong> 
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<ul class="list-group">
  <li class="list-group-item ">
  - <button style="color:#f8f9fa;" type="button" class="btn btn-light btn-sm">xxxx</button> ไม่มีสี เสียงเหมือนภาษาอังกฤษ</li>
  <li class="list-group-item ">
  <div class="mu">
  - <button type="button" class="btn btn-primary btn-sm">xxxx</button> สีเหลือง เสียงต่างจากภาษาอังกฤษ
  </div>
  </li>
  <li class="list-group-item ">
  - <button style="background-color:#D9F1F1; color:#D9F1F1;" type="button" class="btn btn-primary btn-sm">xxxx</button> สีฟ้า เสียงใกล้เคียงภาษาไทย ใช้เป็นหลักในการออกเสียง
  </li>
  <li class="list-group-item ">
    ใช้  <audio id="sound22" src="../../../sound/consonant/zh.mp3"></audio>
        <button onclick="playSound(22)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary btn-sm">
        z (จึ)
        </button>
    เป็นหลักในการออกเสียง 
    <audio id="sound23" src="../../../sound/consonant/q.mp3"></audio>
        <button onclick="playSound(23)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary btn-sm">
            q (ชิ)
        </button>
    และ 
    <audio id="sound24" src="../../../sound/consonant/x.mp3"></audio>
        <button onclick="playSound(24)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary btn-sm">
            x (สิ)
        </button>
  </li>
  <li class="list-group-item ">
  ใช้ 
  <audio id="sound25" src="../../../sound/consonant/s.mp3"></audio>
        <button onclick="playSound(25)" style="background-color: #D9F1F1; color:black;" type="button" class="btn btn-secondary btn-sm">
        s (สึ)
        </button>
   เป็นหลักในการออกเสียง 
  <audio id="sound26" src="../../../sound/consonant/z.mp3"></audio>
        <button onclick="playSound(26)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary btn-sm">
        z (จึ)
</button>
  และ 
        
        <audio id="sound27" src="../../../sound/consonant/c.mp3"></audio>
        <button onclick="playSound(27)" style="background-color: #FEF9D3; color:black;" type="button" class="btn btn-secondary btn-sm">
        c (ชึ)
        </button>
  </li>
</ul>
<br>
<div class="head">
<h5>2. เสียงสระ 韵母 Yùnmǔ</h5>
</div><br>
<div class="table-responsive">
<div class="colo">
<table class="table table-bordered">
  <tr>
    <td class = "lit" rowspan="5">สระเดี่ยว</td>
    <td>
    <audio id="sound28" src="../../../sound/vowel/1a.mp3"></audio>
    <button onclick="playSound(28)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">a (อะ/อา)</button>
    </td>
  </tr>
  <tr>
    <td>
    <audio id="sound29" src="../../../sound/vowel/2o.mp3"></audio>
    <button onclick="playSound(29)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">o (โอะ/โอ)</button>
    </td>
  </tr>
  <tr>
    <td>
    <audio id="sound30" src="../../../sound/vowel/3e.mp3"></audio>
    <button onclick="playSound(30)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">e (1) e (เออะ)</button>
    <button style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">e (2) e (เอะ)</button> เมื่ออยู่หลัง
    <audio id="sound31" src="../../../sound/vowel/5i.mp3"></audio>
    <button onclick="playSound(31)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">i</button> และ
    <audio id="sound32" src="../../../sound/vowel/6u(อวี).mp3"></audio>
    <button onclick="playSound(32)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">ü (yu)</button> เช่น
    <audio id="sound33" src="../../../sound/vowel/7ie.mp3"></audio>
    <button onclick="playSound(33)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">ie (อี+เอะ)</button>
    <audio id="sound34" src="../../../sound/vowel/8ue(อวีเอะ).mp3"></audio>
    <button onclick="playSound(34)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">üe (อวี+เอะ)</button>
    </td>
  </tr>
  <tr>
    <td>
    <audio id="sound35" src="../../../sound/vowel/9i(1)อิ.mp3"></audio>
    <button onclick="playSound(35)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">i(1)i อิ</button>
    <button style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">i(2)i (อึ)</button> เมื่อรวมกับ  z, c, s, zh, ch, sh, r
    </td>
  </tr>
  <tr>
    <td>
    <audio id="sound36" src="../../../sound/vowel/11u(อุอู).mp3"></audio>
    <button onclick="playSound(36)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">u (อุ/อู)</button>
    <audio id="sound37" src="../../../sound/vowel/6u(อวี).mp3"></audio>
    <button onclick="playSound(37)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">ü (อวี)</button> ให้ออกเสียง
    <audio id="sound38" src="../../../sound/vowel/5i.mp3"></audio>
    <button onclick="playSound(38)" style="color:black; background-color:#FFDA93; font-size: 15px;" type="button" class="btn btn-light">i(อี)</button> แล้วห่อปากเสียง u
    </td>
  </tr>
  <tr>
    <td  class = "lit" rowspan="5">สระผสม</td>
    <td>
    <audio id="sound39" src="../../../sound/vowel/14ai.mp3">
    <button onclick="playSound(39)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ai (ไอ, อาย)</button>
    <audio id="sound40" src="../../../sound/vowel/15ei.mp3"></audio>
    <button onclick="playSound(40)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ei (เอย)</button>
    <audio id="sound41" src="../../../sound/vowel/16ao.mp3"></audio>
    <button onclick="playSound(41)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ao (เอา)</button>
    <audio id="sound42" src="../../../sound/vowel/17ou.mp3"></audio>
    <button onclick="playSound(42)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ou (โอว)</button>
    </td>
  </tr>
  <tr>
    <td>
    <audio id="sound43" src="../../../sound/vowel/18ong.mp3"></audio>
    <button onclick="playSound(43)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ong (โอง, อุง)</button>
    <audio id="sound44" src="../../../sound/vowel/19an.mp3"></audio>
    <button onclick="playSound(44)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">an (อัน)</button>
    <audio id="sound45" src="../../../sound/vowel/20en.mp3"></audio>
    <button onclick="playSound(45)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">en (เอิน)</button>
    <audio id="sound46" src="../../../sound/vowel/21ang.mp3"></audio>
    <button onclick="playSound(46)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ang (อัง)</button>
    <button  style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">eng (เอิง)</button>
    <audio id="sound47" src="../../../sound/vowel/23er.mp3"></audio>
    <button onclick="playSound(47)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">er (เออะ)</button>
    </td>
  </tr>
  <tr>
    <td>
    <audio id="sound48" src="../../../sound/vowel/24ia.mp3"></audio>
    <button onclick="playSound(48)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ia (อิ+อะ)</button>
    <audio id="sound49" src="../../../sound/vowel/25io.mp3"></audio>
    <button onclick="playSound(49)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">io (อิ+โอะ)</button>
    <button style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ie (อิ+เอะ)</button>
    <button  style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">iai (อิ+ไอ)</button>
    <audio id="sound50" src="../../../sound/vowel/28iao.mp3"></audio>
    <button onclick="playSound(50)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">iao (อิ+อาว)</button>
    <audio id="sound51" src="../../../sound/vowel/29iu.mp3"></audio>
    <button onclick="playSound(51)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">iu (อิ+โอว)</button>
    <audio id="sound52" src="../../../sound/vowel/30ian.mp3"></audio>
    <button onclick="playSound(52)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ian (อิ+อัน)</button>
    <audio id="sound53" src="../../../sound/vowel/31in.mp3"></audio>
    <button onclick="playSound(53)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">in (อิน)</button>
    <audio id="sound54" src="../../../sound/vowel/32iang.mp3"></audio>
    <button onclick="playSound(54)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">iang (อิ+อัง)</button>
    <audio id="sound55" src="../../../sound/vowel/32ing.mp3"></audio>
    <button onclick="playSound(55)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ing (อิง)</button>
    <audio id="sound56" src="../../../sound/vowel/33iong.mp3"></audio>
    <button onclick="playSound(56)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">iong (อิ+โอง)</button>
    </td>
  </tr>
  <tr>
    <td>
    <audio id="sound57" src="../../../sound/vowel/34ua.mp3"></audio>
    <button onclick="playSound(57)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ua (อุ+อะ)</button>
    <audio id="sound58" src="../../../sound/vowel/35uo.mp3"></audio>
    <button onclick="playSound(58)"style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">uo (อุ+โอะ)</button>
    <audio id="sound59" src="../../../sound/vowel/36uai.mp3"></audio>
    <button onclick="playSound(59)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">uai (อุ+อาย)</button>
    <audio id="sound60" src="../../../sound/vowel/37ui.mp3"></audio>
    <button onclick="playSound(60)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ui (อุ+เอย)</button>
    <audio id="sound61" src="../../../sound/vowel/43uan.mp3"></audio>
    <button onclick="playSound(61)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">uan (อุ+อัน)</button>
    <audio id="sound62" src="../../../sound/vowel/39un.mp3"></audio>
    <button onclick="playSound(62)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">un (อุน)</button>
    <audio id="sound63" src="../../../sound/vowel/40uang.mp3"></audio>
    <button onclick="playSound(63)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">uang (อุ+อัง)</button>
    </td>
  </tr>
  <tr>
    <td>
    <audio id="sound64" src="../../../sound/vowel/6u(อวี).mp3"></audio>
    <button onclick="playSound(64)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ü (อวี)</button>
    <audio id="sound65" src="../../../sound/vowel/8ue(อวีเอะ).mp3"></audio>
    <button onclick="playSound(65)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">üe (อวี+เอะ)</button>
    <audio id="sound66" src="../../../sound/vowel/38uan(อวีอัน).mp3"></audio>
    <button onclick="playSound(66)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">üan (อวี+อัน)</button>
    <audio id="sound67" src="../../../sound/vowel/44un(อวิน).mp3"></audio>
    <button onclick="playSound(67)" style="color:black; background-color:#E7CECB; font-size: 15px;" type="button" class="btn btn-light">ün (อวิน)</button>
    </td>
  </tr>
  <tr>
    <td  class = "lit" rowspan="3">สระเปลี่ยนรูป</td>
    <td>
    <audio id="sound68" src="../../../sound/vowel/5i.mp3"></audio>
    <button onclick="playSound(68)" style="color:black; background-color:#F5E1FD; font-size: 15px;" type="button" class="btn btn-light">i (อิ)</button> =
    <audio id="sound69" src="../../../sound/chang/y.mp3"></audio>
    <button onclick="playSound(69)" style="color:black; background-color:#F5E1FD; font-size: 15px;" type="button" class="btn btn-light">y (ยิ)</button>
    </td>
  </tr>
  <tr>
    <td>
    <audio id="sound70" src="../../../sound/chang/u.mp3"></audio>
    <button onclick="playSound(70)" style="color:black; background-color:#F5E1FD; font-size: 15px;" type="button" class="btn btn-light">u (อุ)</button> =
    <audio id="sound71" src="../../../sound/chang/w.mp3"></audio>
    <button onclick="playSound(71)" style="color:black; background-color:#F5E1FD; font-size: 15px;" type="button" class="btn btn-light">w (วุ)</button>
    </td>
  </tr>
  <tr>
    <td>
    <audio id="sound72" src="../../../sound/vowel/6u(อวี).mp3"></audio>
    <button onclick="playSound(72)" style="color:black; background-color:#F5E1FD; font-size: 15px;" type="button" class="btn btn-light">ü (อวี)</button> =
    <audio id="sound73" src="../../../sound/chang/yu(อวี).mp3"></audio>
    <button onclick="playSound(73)" style="color:black; background-color:#F5E1FD; font-size: 15px;" type="button" class="btn btn-light">yu (อวี)</button>
    </td>
  </tr>
</table>




</div>
</div>



<div class="head">
<h5>3. วรรณยุกต์ 声调 Shēngdiào</h5>
</div><br>
<div class="table-responsive">
<div class="colo">
<table class="table">
<thead style="background-color: #D9DFDE;">
    <tr>
      <td class="q" >วรรณยุกต์จีน(ระดับเสียง)</td>
      <td class="q" >สัญลักษณ์</td>
      <td class="q" >เทียบเสียงวรรณยุกต์ไทย</td>
      <td class="q" >ตัวอย่าง</td>
    </tr>
 </thead>
    <tr>
      <td class="xx" >เสียง 1 (5-5)</td>
      <td class="smuc" >ˉ (ā)</td>
      <td class="smuc" >สามัญ (3-3)</td>
      <td class="smuc" >
      <audio id="sound74" src="../../../sound/ma/1ma(มา).mp3"></audio>
      <button onclick="playSound(74)" style="color:black;  font-size: 15px;" type="button" class="btn btn-light btn-sm">mā (มา)</button>
      </td>
    </tr>
    <tr>
      <td class="xx" >เสียง 2 (3-5)</td>
      <td class="smuc" >´ (á)</td>
      <td class="smuc" >จัตวา (2-4)</td>
      <td class="smuc" >
      <audio id="sound75" src="../../../sound/ma/2ma(หมา).mp3"></audio>
      <button onclick="playSound(75)" style="color:black; font-size: 15px;" type="button" class="btn btn-light btn-sm">má (หมา)</button>
      </td>
    </tr>
    <tr>
      <td class="xx" >เสียง 3 (2-1-4)</td>
      <td class="smuc" > ˇ (ǎ)</td>
      <td class="smuc" >เอก+จัตวา (2-1-4)</td>
      <td class="smuc" >
      <audio id="sound76" src="../../../sound/ma/3maหม่าหมา.mp3"></audio>
      <button onclick="playSound(76)" style="color:black; font-size: 15px;" type="button" class="btn btn-light btn-sm">mǎ (หม่า+หมา)</button>
      </td>
    </tr>
    <tr>
      <td class="xx" >เสียง 4 (5-1)</td>
      <td class="smuc" >` (à)</td>
      <td class="smuc" >โท (4-1)</td>
      <td class="smuc" >
      <audio id="sound77" src="../../../sound/ma/4ma(ม่า).mp3"></audio>
      <button onclick="playSound(77)" style="color:black; font-size: 15px;" type="button" class="btn btn-light btn-sm">mà (ม่า)</button>
      </td>
    </tr>
    <tr>
      <td class="xx" >เสียงเบา</td>
      <td class="smuc" >ไม่มี</td>
      <td class="smuc" >ออกเสียงสั้นและเบา</td>
      <td class="smuc" >
      <audio id="sound78" src="../../../sound/ma/5ma(มะ).mp3"></audio>
      <button onclick="playSound(78)" style="color:black; font-size: 15px;" type="button" class="btn btn-light btn-sm">ma (มะ)</button>
      </td>
    </tr>
  </tbody>
</table>
</div>
</div>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>หมายเหตุ </strong> เสียงวรรณยุกต์ภาษาจีนจะสูงกว่าภาษาไทยเล็กน้อย
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

<br>
<div class="head">
<h5>4. การสะกด 拼音 Pīnyīn</h5>
<br>
<ul class="list-group">
  <li class="list-group-item" style="color:black; font-size: 15px;" >
  เสียง 1 พยางค์ = พยัญชนะ + สระ + วรรณยุกต์ <br><br>
  <audio id="sound79" src="../../../sound/Spelling/ba1.mp3"></audio>
  ตัวอย่าง <button onclick="playSound(79)" style="color:black; font-size: 15px;" style="color:#f8f9fa;" type="button" class="btn btn-light btn-sm">bā (ปา)</button>
  <audio id="sound80" src="../../../sound/Spelling/miao2.mp3"></audio>
  <button onclick="playSound(80)" style="color:black; font-size: 15px;" style="color:#f8f9fa;" type="button" class="btn btn-light btn-sm">miáo (เหมียว)</button>
  <audio id="sound81" src="../../../sound/Spelling/hao3.mp3"></audio>
  <button onclick="playSound(81)" style="color:black; font-size: 15px;" style="color:#f8f9fa;" type="button" class="btn btn-light btn-sm">hǎo (ห่าว)</button>
  <audio id="sound82" src="../../../sound/Spelling/shang4.mp3"></audio>
  <button onclick="playSound(82)" style="color:black; font-size: 15px;" style="color:#f8f9fa;" type="button" class="btn btn-light btn-sm">shàng (ซ่าง)</button>
  </li>
  </li>
</ul>
<br>

<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>หมายเหตุ </strong> บางพยางค์อาจไม่มีพยัญชนะ เช่น ā (อา), áng (อั๋ง), ǎi (ไอ่), èr (เอ้อร์)
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>

</div><br>
</div>
<style>
.xx{
    text-align: center;
}
.smuc{
    text-align: center;
}
.q{
    text-align: center;
    color: #0A3073;
    font-size: 18px;
    font-weight: bold;
}
.lit{
  text-align: center;
  width: 20%;
}
</style>
    <div class="container">
    </div><br>
    <div class="text-center" style="color: red;"><h6><a href="../../../home/index.php" class="text-reset"> << กลับไปหน้าหลัก </a> </h6></div>
    


 <!-- ปิด cookie -->

 <?php

}else{
   header("location:../../../logout.php");
}
ob_end_flush();
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>