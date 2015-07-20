<?php 
$trainer_id = $_GET['trainer_id'];
require_once("database.php");
 
$arr = array();

$rs = mysqli_query($link,"SELECT * FROM iapp_berichten where trainer_id = $trainer_id and gelezen = 0 order by id DESC");

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}

echo '{"berichten":'.json_encode($arr).'}';

mysqli_free_result($rs);
?>