<?php 
//om het aantal nog te lezen berichten te tonen aan de trainer
$trainer_id = $_GET['trainer_id'];
require_once("database.php");

//get the number of messages for the trainer

$rs = mysqli_query($link,"SELECT * FROM iapp_berichten where trainer_id = $trainer_id and gelezen = 0");

$row_cnt = mysqli_num_rows($rs);

echo '{"berichten":[{"aantal":"'.$row_cnt.'"}]}';

mysqli_free_result($rs);
?>