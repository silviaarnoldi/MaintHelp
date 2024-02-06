<?php
session_start();
$id=$_GET['ID'];
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$ruolo = strtoupper($_POST['ruolo']);


$connesione= new mysqli('localhost','root','','MaintHelp'); 
if($connesione->connect_error){
    echo("Connection failed: " . $connesione->connect_error);
    exit();
}else{
        try{
            $registra="UPDATE UTENTE SET NOME='$nome', COGNOME='$cognome', RUOLO='$ruolo' WHERE ID='$id'";
            $connesione->query($registra);
            echo "Modifiche effetuate";
            echo "<br>";
            echo "<a href='profile.php'>torna alla home</a>";
        }catch(Exception $e){
            $err = $e->getMessage();
            header("Location: modifica.php?err=$err");
        }
}
?>