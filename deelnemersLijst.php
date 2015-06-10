<?php 
require_once("database.php");
require_once ("functions/sanitize.php");
$id = $_GET['id']; //is eventid
$trainer_id = $_GET['user_id']; //is hetzelfde als trainer_id in local_storage
//sanitize input
$id = escape($id);
$trainer_id = escape($trainer_id);


 
$arr = array();
//get the users for the course




$rs = mysqli_query($link,"SELECT *
                            FROM ***  
                            WHERE eventId ='$id'
                            ORDER BY userLastName");

//loop door de records
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}





echo '{"deelnemers":'.json_encode($arr).'}';


mysqli_free_result($rs);
?>