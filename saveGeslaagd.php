<?php
require_once("database.php");
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
$geslaagd = $_POST['geslaagd'];
$cursus_id = $_POST['cursus_id'];
//maak array
$geslaagdeCursisten = explode(",", $geslaagd);
//aantal id's in de array
$numberOfids=count($geslaagdeCursisten)-1;
//loop throug the arrays
foreach ($geslaagdeCursisten as $value){
  //  echo "gevonden id = ".$value;
    $id = $value;
    if ($id){
        //sla cursist op met id en waarde geslaagd ja voor een bepaalde cursus
        $sql = "UPDATE deelnemerslijst SET
        geslaagd = '1'  WHERE deelnemerslijst.training_id='$cursus_id' AND deelnemerslijst.cursist_id='$id'";

mysql_select_db('app_ehbo');
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not enter data: ' . mysql_error());
}

    }
}





mysql_close($conn);
echo "Geslaagd Updated   \n";
?>