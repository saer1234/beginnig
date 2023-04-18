<?php
include_once "connect.php";
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
echo "onlineU=".$total_user_online.",numberU=".$total_user_online+$total_user_offline."<br/>";
for($i=0;$i<count($content_users);$i++){
echo $content_users[$i]["id"]."\\".$content_users[$i]["type_user"]."\\".$content_users[$i]["name"]."\\".$content_users[$i]["status"]."<br/>";
}

?>