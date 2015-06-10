<?php 
require_once("database.php");

$deelnemers = $_GET['deelnemers'];
$categorie = $_GET['categorie']; //1 = volw, 9 = kind, 11 = kraam
$eventdatum =  $_GET['eventdatum'];
//convert string to array
$cursisten = explode("-", $deelnemers);
 
$arr = array();


//loop net zolang de array groot is

$telcursisten = count($cursisten)-1;
for ($x = 0; $x <= $telcursisten-1; $x++) {
    
     $rs = mysqli_query($link,"SELECT user_id, event_type, type, expire_date 
                                FROM *** 
                                WHERE user_id =  '$cursisten[$x]' 
                                AND event_type = 'T' 
                                AND type = '$categorie'
                                AND expire_date >= '$eventdatum' ");

    //loop door de records
    while($obj = mysqli_fetch_object($rs)) {
    
        /*$arr[] = $obj->user_id;          $arr[] = $obj->initials;     $arr[] = $obj->lastname;         $arr[] = $obj->expire_date;          */
         $arr[] = $obj;     
   
    }   
} 


echo '{"theorie":'.json_encode($arr).'}';


mysqli_free_result($rs);
?>



