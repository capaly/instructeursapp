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


//dit toont maar 1 user voor de event, moet een lijst geven
/*
$rs = mysqli_query($link,"SELECT * 
                                    FROM jos_dtregister_user  b
                                    JOIN  ehih_certificates a ON a.user_id = b.user_id
                                    JOIN jos_jevents_vevdetail c ON c.evdet_id = b.eventId
                                    WHERE a.user_id ='$trainer_id'
                                    AND b.eventId ='$id'
                                    AND a.event_type = 'T'");

//indien certificaat verlopen is wordt dit niet getoond
/*
$rs = mysqli_query($link,"SELECT * 
                                    FROM jos_dtregister_user  b
                                    JOIN  ehih_certificates a ON a.user_id = b.user_id
                                    JOIN jos_jevents_vevdetail c ON c.evdet_id = b.eventId
                                    WHERE a.user_id ='$trainer_id'
                                    AND b.eventId ='$id'
                                    AND a.event_type = 'T'
                                    AND a.expire_date >= FROM_UNIXTIME(c.dtstart)");
                                    */


$rs = mysqli_query($link,"SELECT *
                            FROM jos_dtregister_user  
                            WHERE eventId ='$id'
                            ORDER BY userLastName");

//loop door de records
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
}



/*
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
   // echo "<br>cursist id = ".$obj->cursist_id;
    $cursist_id= $obj->cursist_id;
   //  $trainer_id=$obj->id;
    //details ophalen van de cursisten
    $cursist = mysqli_query($link,"SELECT * FROM cursisten where id =  ".$cursist_id."");
    
    
    while($obj2 = mysqli_fetch_object($cursist)) {
            $arr2[] = $obj2;
   
   //  $trainer_id=$obj->id;
    
    
    }
    
}
*/

echo '{"deelnemers":'.json_encode($arr).'}';


mysqli_free_result($rs);
?>