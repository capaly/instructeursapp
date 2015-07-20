<?php 

$id = $_GET['id'];
require_once("database.php");


 
$arr = array();

$rs = mysqli_query($link,"SELECT * 
                            FROM `ehih_certificates` 
                            WHERE `user_id` = $id LIMIT 1");

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}

echo '{"cursist":'.json_encode($arr).'}';






mysqli_free_result($rs);
?>