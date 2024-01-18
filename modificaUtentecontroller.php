<?php
session_start();

$ruolo = strtoupper($_POST['ruolo']);
$username=$_POST['username'];
$password=$_POST['password'];

$password=MD5($password);

$connesione= new mysqli('localhost','root','','MaintHelp'); 
if($connesione->connect_error){
    echo("Connection failed: " . $connesione->connect_error);
    exit();
}else{
    // Controllo se il nome utente esiste già
    $checkUsername = "SELECT * FROM UTENTE WHERE username='$username'";
    $result = $connesione->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "alert('Username già esistente,cambialo');";
        header("Location: registra.php");
    } else {
        try{
            $registra="insert into UTENTE (nome, cognome, ruolo, username, password) values ('$nome', '$cognome', '$ruolo', '$username', '$password')";
            $connesione->query($registra);
            echo "Registrazione effetuata";
            echo "<br>";
            echo "<a href='profile.php'>Torna alla home</a>";
        }catch(Exception $e){
            $err = $e->getMessage();
            header("Location: registra.php?err=$err");
        }
    }
}
?>