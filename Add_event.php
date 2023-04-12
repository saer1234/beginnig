<?php

if(isset($_SESSION["loggedin"])&&$_SESSION["loggedin"]==true&&$_SESSION["status"]!="it"){
    header("location: dashboard_".$_SESSION['status'].".php");
}else if($_SESSION["status"]==null){
 header("location: Login.php");
}
?>
<link href="Edit_event.css" rel="stylesheet"/>
<div class="body-edit">
    <div class="close-icon">
        <a href="Event_<?php echo $_SESSION["status"]; ?>.php"><img src="icon/close_edit_event.jpg"></a>
</div>
<div class="main-edit">
<form action="add_form.php" method="POST" enctype="multipart/form-data">
<h1>Add Form:</h1>
<input type="hidden" name="Edit_event" />
<label>name:</label>
<input type="text" name="name" >
<label>price for each user:</label>
<input type="text" name="price_per_user">
<label>number of users:</label>
<input type="number" name="number_user" >
<label>image for event:</label>
<input name="img"  type="file"/>
<label>description:</label>
<textarea name="description" row="4" col="50">
</textarea>
<label>status:</label>
<input type="text" name="status_event" />
<label>date:</label>
<input type="date" name="date" />
<input type="submit" value="add" name="add_submit"/>
<input type="reset" value="clear"/>
</form>
</div>

</div>
<?php

?>