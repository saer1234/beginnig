<?php

if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true&&$_SESSION["status"]!="it"){
    header("location: dashboard_".$_SESSION['status'].".php");
}else if($_SESSION["status"]==null){
 header("location: Login.php");
}

$sql2="SELECT * FROM events where ID=".$_GET['Edit_event'];
$show_edit=mysqli_query($conn,$sql2);


if(mysqli_num_rows($show_edit)>0){
    $row_edit=mysqli_fetch_assoc($show_edit);
?>
<link href="Edit_event.css" rel="stylesheet"/>
<div class="body-edit">
    <div class="close-icon">
        <a href="Event_<?php echo $_SESSION["status"]; ?>.php"><img src="icon/close_edit_event.jpg"></a>
</div>
<div class="main-edit">
<form action="edit_form.php" method="POST" enctype="multipart/form-data">
<h1>Edit Form:</h1>
<input type="hidden" name="Edit_event" value="<?php echo $_GET['Edit_event'];?>"/>
<label>name:</label>
<input type="text" name="name" value="<?php echo $row_edit["name"];?>">
<label>price for each user:</label>
<input type="text" name="price_per_user"value="<?php echo $row_edit["price_per_user"];?>">
<label>number of users:</label>
<input type="number" name="number_user" value="<?php echo $row_edit["number_user"];?>">
<label>image for event:</label>
<img id="t1"src="<?php echo $row_edit["img"]?>"/>
<input name="img"  type="file"/>
<label>description:</label>
<textarea name="description" row="4" col="50">
<?php echo $row_edit["description"];?>
</textarea>
<label>status:</label>
<input type="text" name="status_event" value="<?php echo $row_edit["status_event"];?>"/>
<label>date:</label>
<input type="date" name="date" value="<?php echo $row_edit["date"];?>"/>
<input type="submit" value="Save" name="edit_submit"/>
<input type="reset" value="clear"/>
</form>
</div>

</div>
<?php




}else{
alert($_GET["Edit_event"],$conn,"complete removed","this events was removed !");
}

?>