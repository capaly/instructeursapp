<?php 

require_once("database.php");
$user = $_GET['user'];
 
$arr = array();
//get the user
$datum = date('Ymd');
//$datum="11112015";



$rs = mysqli_query($link,"SELECT event_id, teacher_user_id, registration_count, category FROM *** a 
                            JOIN *** b ON a.event_id = b.eventId
                            WHERE *** = ".$user);


   

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}


echo '{"trainingen":'.json_encode($arr).'}';


mysqli_free_result($rs);
?>