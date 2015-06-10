<?php 

$news_id = $_GET['news_id'];
require_once("database.php");


 
$arr = array();
//get the news

$rs = mysqli_query($link,"SELECT id,titel,tekst, created FROM *** where id = $news_id");

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}

echo '{"nieuws":'.json_encode($arr).'}';






mysqli_free_result($rs);
?>