<!DOCTYPE html>
<html>
  <?php
  require_once "connect.php";
  session_start();
  if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true&&$_SESSION["status"]!="it"){
       header("location: dashboard_".$_SESSION['status'].".php");
  }else if($_SESSION["status"]==null){
    header("location: Login.php");
  }
  //delete comment
  if(isset($_GET["delete-comment"])){
    $id=$_GET['delete-comment'];
   $sql="DELETE FROM message WHERE id=$id";
   $query=mysqli_query($conn,$sql);
   if($query){
    ?>
  <div class="alert-container">
    <div class="alert-main">
       <div class="alert-header">
       <span class="close"><i class="fad fa-window-close"></i></span>
       <span class="fs-4">Warning message</span>
      </div>
      <div class="alert-body">
        <span>Done delete message of <?php echo $_GET["name-comment"]?> and id is <?php echo $_GET["delete-comment"];?></span>
   </div>
   <div class="alert-footer">
   <button type="button" class="btn btn-outline-danger close-btn">close</button><button type="button" class="btn btn-outline-success done-btn">Ok</button>
   </div>
   </div>
   </div>
    <?php
    $status=$_SESSION["status"];
  //  header("location: dashboard_$status.php");
   }
  }
  ?>
    <head>
        <title>dashboard</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="dashboard.css" rel="stylesheet"/>
        <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"/>
         <link href="alert.css" rel="stylesheet"/>
         <style>
          .content-comment{
            margin:20px;padding:20px;padding-left:50px;
          }
@media only screen and (max-width: 600px){
.content-comment{
    border-color: none;
    background-color: blue;
    width: 100%;
    margin:0px;padding:0px;padding-left:0px;
}
.border{
  justify-content:start;
  position: relative;
  border:none;
  left:0px;
padding:0px;
margin:0px;
}


}
          </style>
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
       <?php
       $sql="SELECT img From it where ID=".$_SESSION["id"]."";
       $re=mysqli_query($conn,$sql);
       $img = mysqli_fetch_assoc($re)["img"];
       ?>
        <img src="<?php echo $img;?>" alt="" width="32" height="32" class="rounded-circle me-2">
        <strong><?php echo $_SESSION["username"];?></strong>
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
  <h2 class="fs-5" id="s">Dashboard</h2>
  <p >Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur dolorum aut consectetur deleniti! Cumque corrupti neque temporibus corporis ipsam porro asperiores aut, libero sapiente possimus? Mollitia vel nulla voluptate dolor!</p>

</div>
<div class="container-fluid text-center">
  <div class="row gap-5">
    <div class="col-xl bg-danger bg-gradient border border-light first-row" style="min-height:300px;padding-bottom:10px;">
    <div class="py-4">
    <img src="icon/profile.png" style="width:70px;height:70px;"/>
   </div>
       <div class="mx-auto p-2 text-start" style="width:180px">
       <?php
       $array = array("client","it","manager");
       $content_users = array();
       $i=0;
       $lenght_user=0;
       $total_user_online=0;
       $total_user_offline=0;
      while($i!=3){
       $sql ="SELECT * FROM $array[$i]";
       $return = mysqli_query($conn,$sql);
       while($r1=mysqli_fetch_assoc($return)){
       if($r1["status"]=="online")
        $total_user_online++;
        else
         $total_user_offline++;
         $t_array= array();
         $t_array["id"]=$r1["ID"];
         $t_array["name"]=$r1["username"];
         $t_array["status"]=$r1["status"];
         $t_array["type_user"]=$array[$i];
         $content_users[$lenght_user]=$t_array;
         $lenght_user++;
       }
       $i++;
       }

        ?>
        <strong>Number of user:</strong> <span class="p-2 badge bg-primary rounded-pill NumberU"><?php echo $total_user_offline+$total_user_online;?></span><br>
        <strong>Online Client:</strong> <span class="p-2 badge bg-primary rounded-pill NumberUO"><?php echo $total_user_online;?></span><br>
           <button onclick="threeButtonActive(this)" data-value="0" class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
           Check users
          </button>
  

       </div>
       <div class="collapse" id="collapseExample">
           <div class="card card-body">
             
          <table class="table table-dark table-striped"> 
          <tr class="table-dark">
             <th class="text-white">ID</th>   
             <th class="text-white">rule</th>   
             <th class="text-white">Username</th> 
             <th class="text-white">status</th>          
           </tr>
           <?php
           $change_color=true;
          for($i=0;$i<count($content_users);$i++){
            if($i>5)
            break;
          if($change_color){
          ?> 
           <tr class="table-light">
             <td class="text-dark UserId"><?php echo $content_users[$i]["id"]; ?></td>  
             <td class="text-dark UserType"><?php echo $content_users[$i]["type_user"];?></td> 
             <td class="text-dark UserName"><?php echo $content_users[$i]["name"]; ?></td> 
             <td class="text-dark UserStatus"><?php echo $content_users[$i]["status"]; ?></td>          
           </tr>
           <?php
          $change_color=false;
           }else{
           ?>
           <tr class="table-success">
             <td class="text-dark UserId"><?php echo $content_users[$i]["id"]; ?></td>   
             <td class="text-dark UserType"><?php echo $content_users[$i]["type_user"]; ?></td> 
             <td class="text-dark UserName"><?php echo $content_users[$i]["name"]; ?></td> 
             <td class="text-dark UserStatus"><?php echo $content_users[$i]["status"]; ?></td>          
           </tr>
          <?php
          $change_color=true;
          }
        }
          ?> 
          </table>
           <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success"  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem; width:100px;">more</button>
           </div>
          </div>
          </div>
    </div>
    <div class="col-xl bg-warning bg-gradient border border-light first-row" style="min-height:300px;padding-bottom:10px;">
    <div class="py-4">
    <img src="icon/cargo.png" style="width:70px;height:70px;"/>
   </div>
   <?php
    $sql="SELECT client.ID, client.username,books_rooms.room_id,books_rooms.date_in,books_rooms.date_out FROM client INNER JOIN books_rooms WHERE books_rooms.client_id=client.ID";
    $sql2="SELECT * FROM room WHERE type='repair'";
    $repair=mysqli_query($conn,$sql2);
    $numberRRpeair=mysqli_num_rows($repair);
    $rr = mysqli_query($conn,$sql);
   $numnerReservation=mysqli_num_rows($rr);
   ?>
   <div class="mx-auto p-2 text-start" style="width:180px">
        <strong>Total Reservation:</strong><span class="p-2 badge bg-primary rounded-pill" style="margin:2px;"><?php echo $numnerReservation; ?></span><br>
        <strong>Room under repair:</strong><span class="p-2 badge bg-primary rounded-pill" style="margin:2px;"><?php echo $numberRRpeair;?></span><br>
           <button onclick="threeButtonActive(this)" data-value="1" class="btn btn-info test1" type="button" data-bs-toggle="collapse" data-bs-target="#showOrder" aria-expanded="false" aria-controls="collapseExample">
           Watch Reservation
          </button>
  

       </div>
       <div class="collapse" id="showOrder">
           <div class="card card-body">
             
          <table class="table table-dark table-striped"> 
           <tr class="table-dark">
             <th class="text-white">ID-customer</th>   
             <th class="text-white">name-customer</th> 
             <th class="text-white">Date-In</th>
             <th class="text-white">Date-Out</th>
             <th class="text-white">ID-room</th>          
           </tr>
           <?php
           $flip=true;
           $co=0;
           while($rows=mysqli_fetch_assoc($rr))
           {
            if($co>5)
             break;
            if($flip){
           ?>
           <tr class="table-light">
             <td class="text-dark"><?php echo $rows["ID"];?></td>   
             <td class="text-dark"><?php echo $rows["username"];?></td> 
             <td class="text-dark"><?php echo $rows["date_in"];?></td>
             <td class="text-dark"><?php echo $rows["date_out"];?></td>          
             <td class="text-dark"><?php echo $rows["room_id"];?></td>   
           </tr>
           <?php
           $flip=false;
            }else{
              $flip=true;
           ?>
           <tr class="table-success">
           <td class="text-dark"><?php echo $rows["ID"];?></td>   
             <td class="text-dark"><?php echo $rows["username"];?></td> 
             <td class="text-dark"><?php echo $rows["date_in"];?></td>
             <td class="text-dark"><?php echo $rows["date_out"];?></td>          
             <td class="text-dark"><?php echo $rows["room_id"];?></td>        
           </tr>
          <?php
            }
            $co++;
           }
          ?> 
          </table>
           <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success"  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem; width:100px;">more</button>
           </div>
          </div>
          </div>
     </div>
    <div class="col-xl bg-success bg-gradient border border-light first-row" style="min-height:300px;padding-bottom:10px;">
    <div class="py-4">
    <img src="icon/banned.png" style="width:70px;height:70px;"/>
   </div>
     <?php
     $sql="SELECT * FROM client WHERE status='banned'";
     $NumberBanList=mysqli_query($conn,$sql);
     $number=mysqli_num_rows($NumberBanList);
     ?>
   <div class="mx-auto p-2 text-start" style="width:180px">
        <strong>Total ban accounts:</strong><span class="p-2 badge bg-primary rounded-pill" style="margin:2px;"><?php echo $number; ?></span><br>
           <button onclick="threeButtonActive(this)" data-value="2" class="btn btn-danger" type="button" data-bs-toggle="collapse" data-bs-target="#showBanList" aria-expanded="false" aria-controls="collapseExample">
           Watch list banned
          </button>
  

       </div>
       <div class="collapse" id="showBanList">
           <div class="card card-body">
             
          <table class="table table-dark table-striped"> 
           <tr class="table-dark">
             <th class="text-white">ID</th>   
             <th class="text-white">Username</th> 
             <th class="text-white">email</th>          
           </tr>
           <?php 
           $count5=0;
           $check=true;
           while ($r1s=mysqli_fetch_assoc($NumberBanList))
           {
            if($count>5)
            break;
            if($check){
           ?>
           <tr class="table-light">
             <td class="text-dark"><?php echo $r1s["ID"]; ?></td>   
             <td class="text-dark"><?php echo $r1s["username"]; ?></td> 
             <td class="text-dark"><?php echo $r1s["email"]; ?></td>          
           </tr>
           <?php
           $check=false;
            }else{
           ?>
           <tr class="table-success">
             <td class="text-dark"><?php echo $r1s["ID"]; ?></td>   
             <td class="text-dark"><?php echo $r1s["username"]; ?></td> 
             <td class="text-dark"><?php echo $r1s["email"]; ?></td>          
           </tr>
           <?php 
           $check=true;
            }
           $count++;
           }
           ?>
           </table>
           <div class="d-flex justify-content-end">
            <button type="button" class="btn btn-success"  style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .85rem; width:100px;">more</button>
           </div>
          </div>
          </div>
             
    </div>
  </div>
  <div class="row bg-white-emphasis   border border-4  border-primary shadow-lg body-comment" style="margin-top:30px;">
      <div class="container">
       <?php
       $sql="SELECT message.date,message.id ,message.messages,message.rate, client.username,client.img FROM client INNER JOIN message ON client.ID=message.client_id";
       $result=mysqli_query($conn,$sql);
       $order=0;
       while($lists= mysqli_fetch_assoc($result)){
        ?>
      <div class="row align-items-start bg-dark-subtle rounded-4 content-comment" >
      <p class="fs-6 text-start text-black fw-semibold ">
      <div class="d-block align-items-start text-start" >
      <img src="<?php echo $lists['img'];?>" class="rounded-circle" style="width:50px;height:50px;">
      <span class="fw-blod fst-italic fs-5"style="font-family:cursive;"><?php echo $lists["username"];?></span>
      <span class="fw-light  text-secondary" style="font-size:13px;"><?php echo $lists["date"];?></span>
      <div class="delete" style="float:right;display:inline-block;width:40px;height:30px;">
       <a href="dashboard_<?php echo $_SESSION['status'];?>.php?delete-comment=<?php echo $lists['id'];?>&name-comment=<?php echo $lists['username'];?>"><i class="fas fa-trash-alt fa-lg trash-icon"></i></a>
      
    </div>
    </div>
    <span class="text-start fs-5" style="padding-left:70px;">
        <?php echo $lists["messages"];?>
      </span>
      </p>  
    <div class="container"style="width:100%;height:40px;background:">
    <a onclick="showMoreMessage(this)" order="<?php echo  $order++; ?>" style="float:left;padding-left:55px;" class="link-primary link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Show more</a>
    <div style="display:flex;justify-content:right;">
    <div style="width:120px;height:40px;margin-right:40px;">
       <?php
       $notTrue=5-$lists["rate"];
       for($i2=0;$i2<$lists["rate"];$i2++)
       {
       ?>
       <i class="fas fa-star"></i>
      <?php
       }
      for($i2=0;$i2<$notTrue;$i2++)
      {
      ?>
      <i class="fal fa-star"></i>
    <?php
      }
    ?>   
    </div>
    </div> 
       </div>
       
     <div class="Main-sub">
      <?php
      $id_message=$lists["id"];
      $sql="SELECT * FROM message inner join submessage on message.id=submessage.message_id inner join ithassubmessage on submessage.ID=ithassubmessage.subMessage_ID inner join it on it.ID=ithassubmessage.IT_ID WHERE message.id=$id_message";
      $res=mysqli_query($conn,$sql);

      while($rows= mysqli_fetch_assoc($res)){
      
      ?>
     <div class="sub-header">
      <p>
      <img src ="<?php echo $rows["img"];?>" class="rounded-circle"/><span class="fw-blod  fst-italic" style="font-family:cursive;" ><?php echo $rows["username"];?></span><span style="font-size:13px;"><?php echo $rows["date"];?></span>
       </p> 
    </div>
     <div class="sub-body">
      <p>
    <?php echo $rows["message"];?>  
    </p>
     </div>
      <?php
      }
      ?>
     <div class="form-input-message">
      <!-- form of input message -->
      <form action="subMessage.php" method="GET">
  <div class="mb-3">
  <label for="exampleFormControlTextarea1" class="form-label">Example textarea</label>
  <input type="hidden" name="id_user" value="<?php echo $_SESSION["id"];?>">
  <input type="hidden" name="id_message" value="<?php echo $lists["id"]; ?>">
  <input type="hidden" name="type" value="<?php echo $_SESSION["status"]; ?>">
  <textarea class="form-control" name="info" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-3">Send</button>
</form>
      <!-- end-->
    </div>
    
    </div>

    </div>
    <?php
       }
       ?>

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
 var closeAlertButton=document.getElementsByClassName("close-btn")[0];
 if(closeAlertButton)
 closeAlertButton.onclick=function(){
  var x=document.getElementsByClassName("alert-container")[0];
  if(x)
  x.style.display="none";
  location.href="dashboard_<?php echo $_SESSION['status'];?>.php";
 };
 var closeAlertButton=document.getElementsByClassName("done-btn")[0];
 if(closeAlertButton)
 closeAlertButton.onclick=function(){
  var x=document.getElementsByClassName("alert-container")[0];
  x.style.display="none";
  location.href="dashboard_<?php echo $_SESSION['status'];?>.php";
 };
 var closeAlert= document.getElementsByClassName("close")[0];
 if( closeAlert)
 closeAlert.onclick=function(){
  var x=document.getElementsByClassName("alert-container")[0];
x.style.display="none";
  
 };
 function showMoreMessage(a_id){
  console.log(a_id);
  const row=a_id.getAttribute("order");
  if(document.getElementsByClassName("Main-sub")[row].style.display==="")
  document.getElementsByClassName("Main-sub")[row].style.display="block";
   else
   document.getElementsByClassName("Main-sub")[row].style.display="";
 }

 function threeButtonActive (id){
   let value = id.getAttribute("data-value");
   switch(value*1){
   case 1:
    var c1= document.getElementsByClassName("first-row")[0];
   var c2= document.getElementsByClassName("first-row")[2];
  break;
  case 0:
    var c1= document.getElementsByClassName("first-row")[1];
   var c2= document.getElementsByClassName("first-row")[2];
    break;
    case 2:
      var c1= document.getElementsByClassName("first-row")[0];
   var c2= document.getElementsByClassName("first-row")[1];
      break; 
  }
   
   if(c1.classList.contains("col-xl")){
   c1.classList.remove("col-xl");
   c1.style.display="none";
   c2.classList.remove("col-xl");
   c2.style.display="none";
   }else{
    c1.classList.add("col-xl");
    c1.style.display="inline-block";
   c2.classList.add("col-xl");
   c2.style.display="inline-block";
   }

  }
  function updateTableUser(x,responseID,y,responseStatus,z,responsRule){
    for(let xr=0;xr<x.length;xr++){
    if(x[xr].innerHTML==responseID && y[xr].innerHTML!=responseStatus&&z[xr].innerHTML==responsRule){
           y[xr].innerHTML=responseStatus;
           break;
    }
    }
  }

  function updateContent() {
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementsByClassName("NumberUO")[0].innerHTML = this.responseText.split(',')[0].split('=')[1];
       let cout=document.getElementsByClassName("UserId").length; 
       // this.responseText.split("<br/>").length;
        const list=this.responseText.split("<br/>");
       for(let i=1;i<(cout+1);i++){
        const t1=list[i].split("\\");
        updateTableUser(document.getElementsByClassName("UserId"),t1[0],document.getElementsByClassName("UserStatus"),t1[3],document.getElementsByClassName("UserType"),t1[1]);
       }
      }
    };
    xhr.open("GET", "update.php", true);
    xhr.send();
  }

  
  // Call the updateContent function every 5 seconds
  setInterval(updateContent, 5000);
    </script>
</body>

</html>