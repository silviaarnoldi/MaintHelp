<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
$id=$_SESSION['id'];
$nome=$_SESSION['nome'];
$azienda=$_SESSION['azienda'];
$ruolo = strtoupper($_SESSION['ruolo']);
if($ruolo == "AMMINISTRATORE"){
    header("Location: homeAmministratore.php?az=$azienda");
}else{
    if($ruolo == "OPERATORE"){
        header("Location: homeOperatore.php?az=$azienda");
    }else{
        if($ruolo == "MANUTENTORE"){
            header("Location: homeManutentore.php?az=$azienda");
        }
    }
}
/*
<!DOCTYPE html>
<html lang="">
    <body>
        <h1>Benvenuto <?php echo $ruolo; ?></h1>
        <a href="logout.php">Logout</a>
    </body>
</html>
*/
?>
