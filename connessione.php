<?php
$connessione= new mysqli('localhost','root','','MaintHelp'); 
if($connessione->connect_error){
    die("Connessione fallita: " . $connessione->connect_error);
    exit();
}
?>

