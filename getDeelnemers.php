<?php 

$id = $_GET['id'];
require_once("database.php");

 
$arr = array();
//get the user

$rs = mysqli_query($link,"SELECT * FROM deelnemerslijst where training_id =  ".$id."");

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}


echo '{"trainingen":'.json_encode($arr).'}';


mysqli_free_result($rs);
?>