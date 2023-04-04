<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    // User is already logged in, log them out
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
