<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    session_start();
     require_once "connect.php";
     
     if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true&&$_SESSION["status"]!="it"){
          header("location: dashboard_".$_SESSION['status'].".php");
     }else if($_SESSION["status"]==null){
       header("location: Login.php");
     }
    
    
     //start alert of remove
     function alert($id,$conns){
        $sql1="SELECT * FROM events WHERE ID=".$id;
        $rrt=mysqli_query($conns,$sql1);
     ?>
     <div class="outside-card">
     <?php
    if(mysqli_num_rows($rrt)>0){ 
        $sql1="DELETE FROM events WHERE ID=".$id;
        $rrt=mysqli_query($conns,$sql1);
     ?>
     <div  class="card">
     <div style="text-align:right;display:inline-block;float:right;">
     <a href="Event_<?php echo $_SESSION["status"]; ?>.php"><h3 style="display:inline-block;">x</h3></a>
       </div>
     <div style="border-radius:200px; height:200px; width:200px; margin:0 auto;">
      <!-- <i class="checkmark">✓</i>-->
      <img src="icon/true.jpg" style="border-radius:200px" width="200" height="200"/>
     </div>
       <h1 style="text-align:center;">Success</h1> 
       <p>We received your query request;<br/>Event is removed!</p>
     </div>
     <?php
    }else{
     ?>

     <div  class="card">
     <div style="text-align:right;display:inline-block;float:right;">
     <a href="Event_<?php echo $_SESSION["status"]; ?>.php"><h3 style="display:inline-block;">x</h3></a>
       </div>
     <div style="border-radius:200px; height:200px; width:200px; margin:0 auto;">
     <!--<i class="fad fa-times-circle fa-lg" style="--fa-secondary-color: #c00c0c;"></i>-->
     <img src="icon/false.jpg" style="border-radius:200px" width="220" height="200"/>
     </div>
       <h1 style="text-align:center;">Rejected</h1> 
       <p>We received your query request;<br/>you can't remove cause there already remove from another account please refresh page again to see new query</p>
     </div>
<?php
    }
    ?>
    </div>
    <?php
}

     //end



     if(isset($_GET["remove_event"])&&isset($_GET["event_id"])&&$_GET["remove_event"]!=""&&$_GET["event_id"]!=0){
        alert($_GET["event_id"],$conn);
     }
    ?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        
       <link href="dashboard.css" rel="stylesheet"/>
        <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"/>
        <link href="Event.css" rel="stylesheet"/>


    </head>
<body>
<div class="main-container d-flex">
  <div class="sidebar" id="side_nav">
    <div class="header-box px-2 pt-2 pb-4 d-flex">
    <h1 class="fs-2"><span class="bg-white text-dark rounded shadow px-2 me-2">Ho</span><span class="text-white">It Hotel</span></h1>
    <button onclick="dispearBar(this)" class="btn d-md-none d-block close-btn px-1 py-0 text-white"><i class="fal fa-stream"></i></button>
    </div>
    <ul class="list-unstyled px-3">
    <li  onclick="setActive(this)"><a href="dashboard_<?php echo $_SESSION["status"];?>.php" class="text-decoration-none px-3 py-2 d-block fs-4"><i class="fas fa-home"></i> Home</a></li>
    <li onclick="setActive(this)" class="active"><a href="Event_<?php echo $_SESSION["status"];?>.php" class="text-decoration-none px-3 py-2 d-block fs-4"><i class="fas fa-calendar-exclamation"></i> Events</a></li>
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

  <div class="container text-center">
<?php
if(isset($_GET["setOnMain"])&&isset($_GET["id"])&&$_GET["id"]!=0){
    extract($_GET);
    $sql ="SELECT * FROM events WHERE status_event='setOnMain'";
    $query= mysqli_query($conn,$sql);
   $number=mysqli_num_rows($query);
   if($setOnMain=="false")
    $number=3;
?>
    <!-- SET seccuss/rejecte -->
    
      <div class="outside-card">
    <?php
     if($number<4){
         if($setOnMain=="true")
        $sql="UPDATE events SET status_event='setOnMain' WHERE ID=".$_GET["id"];
        else
        $sql="UPDATE events SET status_event='notOnMain' WHERE ID=".$_GET["id"];
        $result=mysqli_query($conn,$sql);
    ?>
      <div  class="card">
      <div style="text-align:right;display:inline-block;float:right;">
      <a href="Event_<?php echo $_SESSION["status"]; ?>.php"><h3 style="display:inline-block;">x</h3></a>
        </div>
      <div style="border-radius:200px; height:200px; width:200px; margin:0 auto;">
       <!-- <i class="checkmark">✓</i>-->
       <img src="icon/true.jpg" style="border-radius:200px" width="200" height="200"/>
      </div>
        <h1 style="text-align:center;">Success</h1> 
        <p>We received your purchase request;<br/> we'll be in touch shortly!</p>
      </div>
      <?php
     }else{
      ?>

      <div  class="card">
      <div style="text-align:right;display:inline-block;float:right;">
      <a href="Event_<?php echo $_SESSION["status"]; ?>.php"><h3 style="display:inline-block;">x</h3></a>
        </div>
      <div style="border-radius:200px; height:200px; width:200px; margin:0 auto;">
      <!--<i class="fad fa-times-circle fa-lg" style="--fa-secondary-color: #c00c0c;"></i>-->
      <img src="icon/false.jpg" style="border-radius:200px" width="220" height="200"/>
      </div>
        <h1 style="text-align:center;">Rejected</h1> 
        <p>We received your purchase request;<br/> you can't set event because there are fulled in main page!</p>
      </div>
    <?php
     }
    ?>
    </div>
<?php
}
?>
    <!-- end of part seccuss/rejecte -->

  <div class="row align-items-start gap-5">
    <div class="col-xl text-start rounded-5" style="background-image:url('icon/b0.jpg');background-size:cover;padding:15px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
      <p style="font: italic small-caps bold 16px/2 cursive;color:#F8F6F1;"><img src="icon/event.jpg" class="border rounded-4 border-danger float-start" style="width:100px;height:100px;margin-right:10px;"/>
      <span class="text-wrap fw-blod" style="font-size:30px;color:white;">Events</span> are an important aspect of human social interaction and can take many forms, ranging from formal ceremonies to informal gatherings. Events are often organized around a common theme or purpose, such as celebrating a holiday, raising awareness for a cause, or networking with like-minded individuals. The success of an event often depends on careful planning and execution, including selecting a suitable venue, inviting appropriate guests, and providing engaging activities or presentations. Events can also have significant economic and cultural impact, attracting tourists, generating revenue for local businesses, and showcasing a community's traditions and values. Whether big or small, events provide opportunities for people to connect, learn, and celebrate together.
    </p>
    <button type="button" class="btn btn-success" style="margin:10px;">Success</button>
    <button type="button" class="btn btn-info">Info</button>
    </div>
    <div class="col-xl text-start rounded-5 event-list" style="background-color:#CFB9A5;padding:15px;box-shadow: rgb(38, 57, 77) 0px 20px 30px -10px;">
     <!-- table -->
     <section>
  <!--for demo wrap-->
  <h1>Events list:</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>Code</th>
          <th>Event-name</th>
          <th>max-client</th>
          <th>current-user</th>
          <th>date</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
        <tr>
          <td>XXD</td>
          <td>ADITYA BIRLA</td>
          <td>$1.02</td>
          <td>-1.01</td>
          <td>+2.36%</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>
     <!-- end table -->
    </div>
    </div>

    <div class="row align-items-start gap-5" style="margin:30px 0px;">
    <div class="col-xl text-start rounded-5 second-row  event-list" style="font-family: 'Open Sans', sans-serif;padding:15px;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;">
    <section> 
    <h1>Event:</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>ID</th>
          <th>Client</th>
          <th>number reserved</th>
          <th>total price</th>
          <th>date</th>
        </tr>
      </thead>
    </table>
  </div>
      <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

<section> 
    <h1>Event:</h1>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
        <th>ID</th>
          <th>Client</th>
          <th>number reserved</th>
          <th>total price</th>
          <th>date</th>
        </tr>
      </thead>
    </table>
  </div>
      <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
        <tr>
          <td>AAC</td>
          <td>AUSTRALIAN COMPANY </td>
          <td>$1.38</td>
          <td>+2.01</td>
          <td>-0.36%</td>
        </tr>
        <tr>
          <td>AAD</td>
          <td>AUSENCO</td>
          <td>$2.38</td>
          <td>-0.01</td>
          <td>-1.36%</td>
        </tr>
        <tr>
          <td>AAX</td>
          <td>ADELAIDE</td>
          <td>$3.22</td>
          <td>+0.01</td>
          <td>+1.36%</td>
        </tr>
      </tbody>
    </table>
  </div>
</section>

    <button type="button" class="btn btn-success" style="margin:10px;">Success</button>
    <button type="button" class="btn btn-info">Info</button>
    </div>
    </div>
    <?php
    $sql="SELECT * FROM events";
    $result=mysqli_query($conn,$sql);
    $COUNT=3;   
    while($return=mysqli_fetch_assoc($result))
    {
        if($COUNT==3){
    ?>
    <div class="row align-items-start gap-5" style="margin:30px 0px;font-family: 'Open Sans', sans-serif;padding:15px;">
    <?php
    $COUNT=0;
       }
    ?>



    <div  class=" col-xl text-center last-part p-4" style="background-image:url('icon/b1.jpg');background-size:cover;box-shadow: rgba(0, 0, 0, 0.25) 0px 54px 55px, rgba(0, 0, 0, 0.12) 0px -12px 30px, rgba(0, 0, 0, 0.12) 0px 4px 6px, rgba(0, 0, 0, 0.17) 0px 12px 13px, rgba(0, 0, 0, 0.09) 0px -3px 5px;" >
    <div class="container-image">
    <img  src="<?php echo $return["img"];?>" class="rounded-4"style="width:250px;height:250px;margin-bottom:30px;">
    <div class="inner-image"> 
       <div class="text1"> 
        <h3 style="display:inline-block;">Name:</h3><?php echo $return["name"];?><br/>
        <p><span class="fs-4">Description:</span><?php echo $return["description"];?></p>
        <a href="#" class="link-offset-1">More info</a>
    </div>
    </div>
    </div>
    <?php
     $id=$return["ID"];
    ?>
    <p class="text-start" style="padding: 0px 20px;font: italic small-caps bold 16px/2 cursive;color:white;">Event 1<br/><?php echo $return["description"];?></p>
    <div class="text-start list-button p-3">
    
    <button onclick="location.href='?Edit_event=<?php echo $id;?>'" class="button-85">Edit</button>
    <?php
    if(isset($_GET["Edit_event"])){
        require "Edit_event.php";
    }
    if(){
        
    }
    ?>
     <button  onclick="location.href='?remove_event=remove&event_id=<?php echo $id;?>'" class="button-87">Remove</button><br/>
  <?php
    $sql ="SELECT * FROM events WHERE status_event='setOnMain' AND ID=".$id;
    $rr=mysqli_query($conn,$sql);
    if(mysqli_num_rows($rr)!=1)
    {
    ?>
    <button class="button-48" onclick="location.href='?setOnMain=true&id=<?php echo $id;?>'"role="button"><span class="text">Set on main<span></button>
    <?php
    }else{
    ?>
     <button class="button-48" onclick="location.href='?setOnMain=false&id=<?php echo $id;?>'"role="button"><span class="text">Remove From main<span></button>
   
    <?php
    }
    ?>
    </div>
    </div>



  <?php
     if($COUNT==3){ 
  ?>
    </div>
    <?php
     }
     $COUNT++;
    }
    ?>
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