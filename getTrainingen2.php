<?php 
require_once("database.php");
$event_id = $_GET['event_id'];
 
$arr = array();
//make the unix timestamp to calculate in the futures
$datum = mktime();

$rs = mysqli_query($link,"SELECT evdet_id, dtstart, summary FROM *** where evdet_id =  '$event_id' and dtstart >= '$datum'");

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}

echo '{"trainingen":'.json_encode($arr).'}';

mysqli_free_result($rs);
?>