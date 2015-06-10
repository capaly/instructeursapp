<?php 
//om het aantal nog te lezen berichten te tonen aan de trainer
$id = $_POST['id'];
require_once("database.php");

//update the record




$rs = mysqli_query($link,"UPDATE berichten SET gelezen = 1 WHERE id = $id");





?>