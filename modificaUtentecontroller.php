<?php
session_start();
$id=$_GET['ID'];
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
        header("Location: modificaUtente.php");
    } else {
        try{
            $registra="UPDATE UTENTE SET USERNAME='$username', PASSWORD='$password' WHERE ID='$id'";
            $connesione->query($registra);
            echo "Modifiche effetuate";
            echo "<br>";
            echo "<a href='login.php'>login</a>";
        }catch(Exception $e){
            $err = $e->getMessage();
            header("Location: modificaUtente.php?err=$err");
        }
    }
}
?>