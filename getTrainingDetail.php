<?php 
$id = $_GET['id'];
require_once("database.php");
 
$arr = array();

$rs = mysqli_query($link,"SELECT evdet_id, dtstart, summary, dtend FROM jos_jevents_vevdetail where evdet_id =  ".$id);

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}

echo '{"trainingen":'.json_encode($arr).'}';

mysqli_free_result($rs);
?>