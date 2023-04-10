<?php
session_start();
 require_once "connect.php";
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // User is already logged in, log them out
    $sql="UPDATE ".$_SESSION['status']." SET status='offline' WHERE ID=".$_SESSION["id"];
    $rs= mysqli_query($conn,$sql);
    $_SESSION = array();
    session_destroy();
    header("location: login.php");
    exit;
} else {
    // User is not logged in, redirect to login page
    header("location: login.php");
    exit;
}
?>
