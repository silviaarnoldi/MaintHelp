<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="Amministratore"){
        header("Location: login.php");
    }else{
        echo(" benenuto Amministratore");
        $ruolo=$_SESSION['ruolo'];

    }
}
/*<h1>Benvenuto <?php echo $ruolo; ?></h1>*/
?>
<!DOCTYPE html>
<html lang="">
    <body>
        //BOTTONE CHE MI PORTA ALLA PAGINA DI REGISTRAZIONE
        <form action="registra.php" method="post">
            <input type="submit" value="Registra Utente">
        <form action="elimina.php" method="post">
            <input type="submit" value="Elimina Utente">
        </form>
        <a href="logout.php">Logout</a>
    </body>
</html>
