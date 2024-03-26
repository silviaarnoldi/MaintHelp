<?php
 include "connessione.php";
session_start();
$id=$_GET['ID'];
$username=$_POST['username'];
$password=$_POST['password'];
$password=MD5($password);

    // Controllo se il nome utente esiste già
    $checkUsername = "SELECT * FROM UTENTE WHERE username='$username'";
    $result = $connessione->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "alert('Username già esistente,cambialo');";
        header("Location: modificaUtente.php");
    } else {
        try{
            $registra="UPDATE UTENTE SET USERNAME='$username', PASSWORD='$password' WHERE ID='$id'";
            $connessione->query($registra);
            /*echo "Modifiche effetuate";
            echo "<br>";
            echo "<a href='login.php'>login</a>";*/
            header("Location: login.php");
        }catch(Exception $e){
            $err = $e->getMessage();
            header("Location: modificaUtente.php?err=$err");
        }
    }

?>