<?php
 include "connessione.php";
session_start();
$id=$_GET['ID'];
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$ruolo = strtoupper($_POST['ruolo']);
        try{
            $registra="UPDATE UTENTE SET NOME='$nome', COGNOME='$cognome', RUOLO='$ruolo' WHERE ID='$id'";
            $connessione->query($registra);
            echo "Modifiche effetuate";
            echo "<br>";
            echo "<a href='profile.php'>torna alla home</a>";
        }catch(Exception $e){
            $err = $e->getMessage();
            header("Location: modifica.php?err=$err");
        }
?>