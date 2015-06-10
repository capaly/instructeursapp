<?php 
require_once("database.php");
$user = $_GET['id'];
 
$arr = array();
//old one 

$rs = mysqli_query($link,"SELECT * FROM *** where email =  '$user'");

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
	$arr[] = $obj;
}

//stuur terug
echo '{"user":'.json_encode($arr).'}';



mysqli_free_result($rs);

?>