<?php
session_start();

$username=$_POST['username'];
$password=$_POST['password'];
$id=$_GET['ID'];

$password=MD5($password);

$connesione= new mysqli('localhost','root','','MaintHelp'); 
if($connesione->connect_error){
    echo("Connection failed: " . $connesione->connect_error);
    exit();
}else{
    // Controllo se il nome utente esiste già
    $checkUsername = "SELECT * FROM UTENTE WHERE USERNAME='$username'";
    $result = $connesione->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "alert('Username già esistente,cambialo');";
        header("Location: modificaUtente.php");
    } else {
        try{
            //rimpiazza i valori dell utente a seconda del id con quelli inseriti
            echo $id;
            $registra="UPDATE UTENTE SET USERNAME='$username', PASSWORD='$password' WHERE ID='$id'";
            $connesione->query($registra);
            echo "Registrazione effetuata";
            echo "<br>";
            echo "<a href='profile.php'>Torna alla home</a>";
        }catch(Exception $e){
            $err = $e->getMessage();
            header("Location: modificaUtente.php?err=$err");
        }
    }
}
?>