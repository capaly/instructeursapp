<?php 
require_once("database.php");

$event_id = $_GET['id'];

$arr = array();
//get the location_id
$rs = mysqli_query($link,"SELECT eventId, location_id FROM *** where eventId =  '$event_id'");

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
    $location_id=$obj->location_id;
}

//now go get the address with the location_id
$arr2 = array();
$rs2 = mysqli_query($link,"SELECT id, name, address, city, zip, phone, xgeo, ygeo FROM *** where id =  '$location_id'");

//loop door de records 
while($obj = mysqli_fetch_object($rs2)) {
  $arr2[] = $obj;
}

echo '{"adres":'.json_encode($arr2).'}';

mysqli_free_result($rs);
?>


