<?php
session_start();
require_once "connect.php";
if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true&&$_SESSION["status"]!="it"){
    header("location: dashboard_".$_SESSION['status'].".php");
}else if($_SESSION["status"]==null||!isset($_SESSION["loggedin"])){
 header("location: Login.php");
}
$check=0;
if(isset($_POST["Edit_event"])){
 if (isset($_POST['add_submit'])&&$_POST['add_submit']=="add") {
    $checkDate="SELECT * FROM events WHERE date='".$_POST["date"]."'";
    $resultDate= mysqli_query($conn,$checkDate);
    if(mysqli_num_rows($resultDate)==0){
    $filename = $_FILES["img"]["name"];
    $tempname = $_FILES["img"]["tmp_name"];
    $folder = "icon/" . $filename;
 
    // Get all the submitted data from the form
   $sql="INSERT INTO `events`(`ID`, `name`, `price_per_user`, `number_user`, `img`, `description`, `status_event`, `date`) VALUES (null,'{$_POST["name"]}','{$_POST["price_per_user"]}','{$_POST["number_user"]}','icon/{$filename}','{$_POST["description"]}','{$_POST["status_event"]}','{$_POST["date"]}')";
     // Execute query
   $result = mysqli_query($conn,$sql);
   $check=mysqli_insert_id($conn);
    // Now let's move the uploaded image into the folder: image
    if(move_uploaded_file($tempname, $folder)) 
    {
        echo "<h3>  Image uploaded successfully!</h3>";
    }else{
        echo "<h3>  Failed to upload image!</h3>";
    }
}
}

}

 if($_SESSION["status"]!=null)
 header("location: Event_".$_SESSION["status"].".php?id1=".$check);
?>