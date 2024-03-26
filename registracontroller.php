<?php
 include "connessione.php";
session_start();
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$ruolo = strtoupper($_POST['ruolo']);
$username=$_POST['username'];
$password=$_POST['password'];
$azienda=$_POST['azienda'];
echo $azienda;  
echo "sto facendo la registrazione";
$password=MD5($password);

    // Controllo se il nome utente esiste già
    $checkUsername = "SELECT * FROM UTENTE WHERE username='$username'";
    $result = $connessione->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "alert('Username già esistente,cambialo');";
        header("Location: registra.php");
    } else {
        try{
            $registra="insert into UTENTE (nome, cognome, ruolo, username, password, azienda_id) values ('$nome', '$cognome', '$ruolo', '$username', '$password', '$azienda')";
            echo "QUERY [".$registra."]<br/>";
            $connessione->query($registra);
            echo "Registrazione effetuata";
            echo "<br>";
            echo "<a href='profile.php'>Torna alla home</a>";
        }catch(Exception $e){
            $err = $e->getMessage();
            header("Location: registra.php?err=$err");
        }
    }

?>