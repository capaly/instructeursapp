<?php 
require_once("database.php");
require_once ("functions/sanitize.php");
$id = $_GET['id'];
//sanitize input
$id = escape($id);

 
$arr = array();

$rs = mysqli_query($link,"SELECT user_id, userFirstName, userLastName, userCity  
                            FROM `jos_dtregister_user` 
                            WHERE `user_id` = $id LIMIT 1 ");

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}

echo '{"cursist":'.json_encode($arr).'}';






mysqli_free_result($rs);
?>