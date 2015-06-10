<?php 
require_once("database.php");
require_once ("functions/sanitize.php");

//dit is email maar verwijst naar username, komt nog uit oude code
$email = $_POST['email'];
$wachtwoord = $_POST['wachtwoord'];




//sanitize input
$email = escape($email);
$wachtwoord = escape($wachtwoord);

//hash the password
$wachtwoord=md5($wachtwoord);




$arr = array();
//get the user
$rs = mysqli_query($link,"SELECT id, username, password FROM *** where username =  '$email' ");

//loop door de records 
while($obj = mysqli_fetch_object($rs)) {
$arr[] = $obj;
    $trainer_id=$obj->id;
    $dbpassword = $obj->password;
}

$comparepassword = explode(':', $dbpassword);
//omdat de md5 anders werkt op de admin, even uit zetten
/*
$founduser= $trainer_id;

if ($founduser==""){
    $founduser = "Gebruikersnaam en/of wachtwoord verkeerd.";
    echo $founduser;
}else{
    echo $founduser;
}
*/

if ($wachtwoord == $comparepassword[0]){
     $founduser= $trainer_id;
    //er moet iets echo staan om de ajax verder te laten lopen
	echo $founduser;
}else{
    $founduser = "Gebruikersnaam en/of wachtwoord verkeerd.";
    echo $founduser;
}



/*
//check if array is not empty
if (empty($arr)){
    //user niet gevonden
    $founduser = "E-mailadres en/of wachtwoord verkeerd.";
    echo $founduser;
}else{
    $founduser= $trainer_id;
    //er moet iets echo staan om de ajax verder te laten lopen
	echo $founduser;
}
*/
mysqli_free_result($rs);
?>


