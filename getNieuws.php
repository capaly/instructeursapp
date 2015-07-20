<?php 

require_once("database.php");
$datumnu =  date("Y-m-d");

$arr = array();

$rs = mysqli_query($link,"SELECT id, titel, created, showtill, active FROM iapp_nieuws WHERE
                                        active = '1' AND
                                        showtill >= '$datumnu' 
                                        order by id DESC limit 5", MYSQLI_USE_RESULT);

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}

echo '{"nieuws":'.json_encode($arr).'}';

mysqli_free_result($rs);
?>