<?php

if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true&&$_SESSION["status"]!="it"){
    header("location: dashboard_".$_SESSION['status'].".php");
}else if($_SESSION["status"]==null||!isset($_SESSION["loggedin"])){
 header("location: Login.php");
}

require_once "connect.php";
session_start();
if (isset($_POST['edit_submit'])&&$_POST['edit_submit']=="Save") {
     
     $filename = $_FILES["img"]["name"];
     $tempname = $_FILES["img"]["tmp_name"];
     $folder = "icon/" . $filename;
      extract($_POST);
     // Get all the submitted data from the form
     if($_FILES["img"]["name"]){
     $sql = "UPDATE events SET img='icon/{$filename}',name='$name',number_user='$number_user',description='$description',date='$date' WHERE ID={$_POST['Edit_event']} ";
     }else{
        $sql = "UPDATE events SET name='$name',number_user='$number_user',description='$description',date='$date' WHERE ID={$_POST['Edit_event']} ";
     }
     // Execute query
     mysqli_query($conn, $sql);
  
     // Now let's move the uploaded image into the folder: image
     if (move_uploaded_file($tempname, $folder)) {
         echo "<h3>  Image uploaded successfully!</h3>";
     } else {
         echo "<h3>  Failed to upload image!</h3>";
     }
 }
 if($_SESSION["status"]!=null)
 header("location: Event_".$_SESSION["status"].".php");
 ?>