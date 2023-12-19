<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
$id=$_SESSION['id'];
$nome=$_SESSION['nome'];
$ruolo=$_SESSION['ruolo'];
if($ruolo == "Amministratore"){
    header("Location: homeAmministratore.php");
}else{
    if($ruolo == "Operatore"){
        header("Location: homeOperatore.php");
    }else{
        if($ruolo == "Manutentore"){
            header("Location: homeManutentore.php");
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
