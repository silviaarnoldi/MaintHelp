<?php
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$ruolo=$_POST['ruolo'];
$username=$_POST['username'];
$password=$_POST['password'];

$password=MD5($password);

$connesione= new mysqli('localhost','root','','MaintHelp'); 
if($connesione->connect_error){
    echo("Connection failed: " . $connesione->connect_error);
    exit();
}else{
    // Controllo se il nome utente esiste già
    $checkUsername = "SELECT * FROM utenti WHERE username='$username'";
    $result = $connesione->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "Il nome utente esiste già. Si prega di scegliere un nome utente diverso.";
        header("Location: registra.php");
    } else {
        try{
            $registra="insert into UTENTE (nome, cognome, ruolo, username, password) values ('$nome', '$cognome', '$ruolo', '$username', '$password')";
            $connesione->query($registra);
            header("Location: homeAmministratore.php");
        }catch(Exception $e){
            $err = $e->getMessage();
            header("Location: registra.php?err=$err");
        }
    }
}
?>