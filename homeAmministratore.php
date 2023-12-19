<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="Amministratore"){
        header("Location: login.php");
    }else{
        echo(" benenuto Amministratore");
        
    }
}

?>
<!DOCTYPE html>
<html lang="">
    <body>
        <!-- aggiungi collegamento a registrazione.php -->
        <a href="registra.php">registra nuovo utente</a>
    </body>
</html>
