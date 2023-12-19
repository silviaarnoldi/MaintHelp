<?php
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$ruolo=$_POST['ruolo'];
$username=$_POST['username'];
$password=$_POST['password'];

$password=MD5($password);
echo("ok");

$connesione= new mysqli('localhost','root','','MaintHelp'); 
if($connesione->connect_error){
    echo("Connection failed: " . $connesione->connect_error);
    exit();
}else{
    try{
        $registra="insert into UTENTE (nome, cognome, ruolo, username, password) values ('$nome', '$cognome', '$ruolo', '$username', '$password')";
        $connesione->query($registra);
        header("Location: login.php");
    }catch(Exception $e){
        $err = $e->getMessage();
        header("Location: registra.php?err=$err");
    }
}
?>