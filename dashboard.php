<!DOCTYPE html>
<html>
  <?php
  session_start();
  if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true&&$_SESSION["status"]!="it"){
       header("location: dashboard_".$_SESSION['status'].".php");
  }else if($_SESSION["status"]==null){
    header("location: Login.php");
  }
  ?>
    <head>
        <title>dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="dashboard.css" rel="stylesheet"/>
        <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"/>
    </head>
    <body>
        
    <!--
    <header class="p-3 text-bg-white bg-light border-bottom">
    <div class="container">
      <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start ">
        <a href="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none">
          <svg class="bi me-2" width="40" height="32" role="img" aria-label="Bootstrap"><img src="part-blurry-image.jpg" width="40" class="rounded" height="30"/></svg>
        </a>

        <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
          <li><a href="#" class="nav-link px-2 text-secondary">Home</a></li>
          <li><a href="#" class="nav-link px-2 text-black">Features</a></li>
          <li><a href="#" class="nav-link px-2 text-black">Pricing</a></li>
          <li><a href="#" class="nav-link px-2 text-black">FAQs</a></li>
          <li><a href="#" class="nav-link px-2 text-black">About</a></li>
        </ul>

        <div class="dropdown text-end">
        <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
            <img src="https://github.com/mdo.png"  alt="mdo" width="32" height="32" class="rounded-circle">
          </a>
          <ul class="dropdown-menu text-small">
            <li><a class="dropdown-item" href="#">New project...</a></li>
            <li><a class="dropdown-item" href="#">Settings</a></li>
            <li><a class="dropdown-item" href="#">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Sign out</a></li>
          </ul>
        </div>
      </div>
    </div>
  </header>
-->
<div class="main-container d-flex">
  <div class="sidebar" id="side_nav">
    <div class="header-box px-2 pt-2 pb-4 d-flex">
    <h1 class="fs-2"><span class="bg-white text-dark rounded shadow px-2 me-2">Ho</span><span class="text-white">It Hotel</span></h1>
    <button onclick="dispearBar(this)" class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fal fa-stream"></i></button>
    </div>
    <ul class="list-unstyled px-3">
    <li  onclick="setActive(this)" class="active"><a href="dashboard_<?php echo $_SESSION["status"];?>.php" class="text-decoration-none px-3 py-2 d-block fs-4"><i class="fas fa-home"></i> Home</a></li>
    <li onclick="setActive(this)"><a href="Event_<?php echo $_SESSION["status"];?>.php" class="text-decoration-none px-3 py-2 d-block fs-4"><i class="fas fa-calendar-exclamation"></i> Events</a></li>
    <li onclick="setActive(this)"><a href="#" class="text-decoration-none px-3 py-2 d-block fs-4"><i class="fas fa-parking"></i> Parking</a></li>
    <li onclick="setActive(this)"><a href="#" class="text-decoration-none px-3 py-2 d-block fs-4"><i class="fas fa-file-user"></i> Accounts</a></li>
    <li onclick="setActive(this)"><a href="#" class="text-decoration-none px-3 py-2 d-block fs-4"><i class="fas fa-utensils-alt"></i> Restaurant</a></li>
    <li onclick="setActive(this)"><a href="#" class="text-decoration-none px-3 py-2 d-block fs-4"><i class="fas fa-page-break"></i> Content</a></li>
    <li onclick="setActive(this)"><a href="#" class="text-decoration-none px-3 py-2 d-block fs-4"><i class="fas fa-comments-alt"></i> feedBack</a></li>
    <li onclick="setActive(this)"><a href="#" class="text-decoration-none px-3 py-2 d-block fs-4"><i class="fas fa-sliders-h-square"></i> Settings</a></li>
</ul>   
<div class="dropdown position-fixed border-top border-light p-3 justify-content-center d-flex" style="width:300px;bottom:10px;">
<a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
        <li><a class="dropdown-item" href="#">New project...</a></li>
        <li><a class="dropdown-item" href="#">Settings</a></li>
        <li><a class="dropdown-item" href="#">Profile</a></li>
        <li><hr class="dropdown-divider"></li>
        <li><a class="dropdown-item" href="Log-out.php">Sign out</a></li>
      </ul>
    </div>
  </div>
  <div class="content">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
   <div class="d-flex justifty-content-between">
   <button onclick="setSideBar(this)"class="btn d-block close-btn px-2 py-2 d-md-none d-block"><i class="fal fa-stream"></i> </button>
  </div>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
    <ul class="navbar-nav mb-2 mb-lg-0">
      <li class="nav-item">
     <a class="nav-link active" aria-current="page" href="#">Profile</a>
    </li>
    </ul>
  </div>
  </div>
</nav>
<div class="dashboard-content">
  <h2 class="fs-5">Dashboard</h2>
  <p >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur dolorum aut consectetur deleniti! Cumque corrupti neque temporibus corporis ipsam porro asperiores aut, libero sapiente possimus? Mollitia vel nulla voluptate dolor!</p>

</div>
<div class="container-fluid text-center">
  <div class="row gap-5">
    <div class="col-xl bg-danger bg-gradient border border-light" style="min-height:300px;padding-bottom:10px;">
    <div class="py-4">
    <img src="icon/profile.png" style="width:70px;height:70px;"/>
   </div>
       <div class="mx-auto p-2 text-start" style="width:180px">
        <strong>Number of user:</strong> <span class="p-2 badge bg-primary rounded-pill">30</span><br>
        <strong>Online Client:</strong> <span class="p-2 badge bg-primary rounded-pill">150</span><br>
           <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
           Check users
          </button>
  

       </div>
       <div class="collapse" id="collapseExample">
           <div class="card card-body">
             
          <table class="table table-dark table-striped"> 
           <tr class="table-dark">
             <th class="text-white">ID</th>   
             <th class="text-white">Username</th> 
             <th class="text-white">status</th>          
           </tr>
           <tr class="table-light">
             <td class="text-dark">390</td>   
             <td class="text-dark">gajikcs121</td> 
             <td class="text-dark">offline</td>          
           </tr>
           <tr class="table-success">
             <td class="text-dark">490</td>   
             <td class="text-dark">mrNoob121</td> 
             <td class="text-dark">offline</td>          
           </tr>
           </table>
           <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success"  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem; width:100px;">more</button>
           </div>
          </div>
          </div>
    </div>
    <div class="col-xl bg-warning bg-gradient border border-light" style="min-height:300px;padding-bottom:10px;">
    <div class="py-4">
    <img src="icon/cargo.png" style="width:70px;height:70px;"/>
   </div>
   <div class="mx-auto p-2 text-start" style="width:180px">
        <strong>Total Reservation:</strong><span class="p-2 badge bg-primary rounded-pill" style="margin:2px;">30</span><br>
        <strong>Room under repair:</strong><span class="p-2 badge bg-primary rounded-pill" style="margin:2px;">150</span><br>
           <button class="btn btn-info" type="button" data-bs-toggle="collapse" data-bs-target="#showOrder" aria-expanded="false" aria-controls="collapseExample">
           Watch Reservation
          </button>
  

       </div>
       <div class="collapse" id="showOrder">
           <div class="card card-body">
             
          <table class="table table-dark table-striped"> 
           <tr class="table-dark">
             <th class="text-white">ID</th>   
             <th class="text-white">Username</th> 
             <th class="text-white">status</th>          
           </tr>
           <tr class="table-light">
             <td class="text-dark">390</td>   
             <td class="text-dark">gajikcs121</td> 
             <td class="text-dark">offline</td>          
           </tr>
           <tr class="table-success">
             <td class="text-dark">490</td>   
             <td class="text-dark">mrNoob121</td> 
             <td class="text-dark">offline</td>          
           </tr>
           </table>
           <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success"  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem; width:100px;">more</button>
           </div>
          </div>
          </div>
     </div>
    <div class="col-xl bg-success bg-gradient border border-light" style="min-height:300px;padding-bottom:10px;">
    <div class="py-4">
    <img src="icon/banned.png" style="width:70px;height:70px;"/>
   </div>
     
   <div class="mx-auto p-2 text-start" style="width:180px">
        <strong>Total ban accounts:</strong><span class="p-2 badge bg-primary rounded-pill" style="margin:2px;">30</span><br>
           <button class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#showBanList" aria-expanded="false" aria-controls="collapseExample">
           Watch Reservation
          </button>
  

       </div>
       <div class="collapse" id="showBanList">
           <div class="card card-body">
             
          <table class="table table-dark table-striped"> 
           <tr class="table-dark">
             <th class="text-white">ID</th>   
             <th class="text-white">Username</th> 
             <th class="text-white">status</th>          
           </tr>
           <tr class="table-light">
             <td class="text-dark">390</td>   
             <td class="text-dark">gajikcs121</td> 
             <td class="text-dark">offline</td>          
           </tr>
           <tr class="table-success">
             <td class="text-dark">490</td>   
             <td class="text-dark">mrNoob121</td> 
             <td class="text-dark">offline</td>          
           </tr>
           </table>
           <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success"  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem; width:100px;">more</button>
           </div>
          </div>
          </div>
             
    </div>
  </div>
</div>

  </div>
  </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<script>
 function setActive(id){
  document.getElementsByClassName("active")[0].classList.remove("active");
  id.classList.add("active");
 }
 function setSideBar(id){
  document.getElementById("side_nav").classList.add("active-sideBar");
 }
 function dispearBar(id){
  document.getElementById("side_nav").classList.remove("active-sideBar");
 }
  </script>
</body>

</html>