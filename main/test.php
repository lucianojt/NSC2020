<?php include('../header.php'); ?>
    <link rel="stylesheet" href="../style.css">
    <script src="../script.js"></script>
    
</head>
  <body>
  
  <?php
    include('../navbar.php');
  ?><br>
  

<div class="text-center">
<div class="container" style="border: 7px solid #818181">
    <br>
    
<h2>โรงแรม<u>ของเรา</u>น่าอยู่!!</h2>

<br>
<h2>อยาก<mark data-toggle="modal" data-target="#myModal "><u>จอง</u></mark>ห้อง</h2>


<br><br>

<h2 onclick="die()">ความหมาย</h2><br><br>

<h4>zzzzz<u onmousedown="highlight(this);">zzzzzz</u>zzz!!</h4><br>

<h4>zzzz<u>zzzz</u>zzz</h4>
<style>
u:hover {
  background-color: #FFFFE0;
}
</style>

<script>
function openForm() {
  console.log("wtf");
  var re = '';
  re += '<h3>nn<h3>';
 // console.log(re);
  document.getElementById("").innerHTML= re;
}
function highlight(aa){
  aa.style.background = "#FFFFE0";
  console.log("momo");
}
function die(){
  console.log("aaaaaaaaaaaaaa");
  for(var i=0;i<5;i++){
    console.log(i);
  }
}

// function pu(aa){
//   console.log("kkk");
//   aa.style.hover= background."#FFFFE0";
// }



</script>

</div>
</div>
<div class="container">
  <!-- The Modal -->
  <div class="modal" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header bg-danger">
        <h4 class="modal-title">แปลข้อความ</h4>
          <button type="button" class="close" data-dismiss="modal" onmousedown="sound.pause();" >&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="card-header d-flex">
           <a><i class="fa-th"></i>zzzzzzz</a>
           <a onmousedown="sound.play();" class="ml-auto"><img src="../images/loundspeaker.png" style="width:35px;"></a>
        </div>
        <script>
        var sound = new Audio();
        sound.src = '../sound/sound_test.mp3';
        </script>
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal" onmousedown="sound.pause();">ปิด</button>
        </div>
        
      </div>
    </div>
  </div>
</div><br>

<div class="container" style="border: 7px solid #818181">
  <div class="row">
    <div class="col-sm m-4 rounded bg-warning" style="width: 50%">
      <p>ddd</p>
      <p>ss</p>
    </div>
    <div class="col-sm m-4 rounded bg-warning" style="width: 50%">
    <p>ddd</p>
      <p>ss</p>
    </div>
    <div class="col-sm m-4 rounded bg-warning" style="width: 50%">
    <p>ddd</p>
      <p>ss</p>
    </div>
  </div>
</div>

  <?php
  include('../footer.php');
  ?>
    