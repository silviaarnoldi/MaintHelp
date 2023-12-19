<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="Amministratore"){
        header("Location: login.php");
    }else{
        $nome=$_SESSION['nome'];
    }
}
/*<h1>Benvenuto <?php echo $ruolo; ?></h1>*/
?>
<!DOCTYPE html>
<html lang="">
    <body>
        <center>
            <h1>Amministratore: <?php echo $nome; ?></h1> <br> 
        <form action="registra.php" method="post">
            <input type="submit" value="Registra Utente"> <br> <br>
        </form>
        <form action="elimina.php" method="post"> 
            <input type="submit" value="Elimina Utente"> <br> <br>
        </form>
        <a href="logout.php">Logout</a>
        </center>
    </body>
</html>