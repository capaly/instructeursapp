<?php 
$id = $_GET['id'];
require_once("database.php");
 
$arr = array();

$rs = mysqli_query($link,"SELECT * FROM *** where id = $id and gelezen = 0");

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}

echo '{"berichten":'.json_encode($arr).'}';

mysqli_free_result($rs);
?>