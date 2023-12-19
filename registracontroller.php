<?php
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$ruolo=$_POST['ruolo'];
$username=$_POST['username'];
$password=$_POST['password'];

$ruoli_validi = array("Amministratore", "Operatore", "Manutentore","amministratore", "operatore", "manutentore");

if (!in_array($ruolo, $ruoli_validi)) {
    echo "Il ruolo inserito non è valido";
    exit();
}

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