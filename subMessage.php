<?php
require_once"connect.php";
session_start();
if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true){
  $status=$_SESSION['status'];
  extract($_GET);
  $sql="INSERT INTO submessage(ID, message_id, message) VALUES (null,'$id_message',\"".$info."\")";
  $r1 = mysqli_query($conn,$sql);
  $id_submessage= mysqli_insert_id($conn);
  $status=$_SESSION["status"];
  echo $status." ".$id_submessage."";
  $sql="INSERT INTO ".$status."hassubmessage(".$status."_ID,subMessage_ID) values ($id_user,$id_submessage)";
  $r2=mysqli_query($conn,$sql);
    header("Location: dashboard_$status.php");
}
header("Location: Login.php");

?>