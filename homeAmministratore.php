<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="AMMINISTRATORE"){
        header("Location: login.php");
    }else{
        $nome=$_SESSION['nome'];
        $id=$_SESSION['id'];
    }
}
/*<h1>Benvenuto <?php echo $ruolo; ?></h1>*/
?>
<!DOCTYPE html>
<html lang="">
    <body>
        <center>
            <h1>Amministratore: <?php echo $nome; echo "    <a href='modificaUtente.php?ID=".$id."'><button> modifica credenziali</button></a>" ?></h1> <br>
        <form action="registra.php" method="post">
            <input type="submit" value="Registra Utente"> <br> <br>
        </form>
        <form action="elimina.php" method="post"> 
            <input type="submit" value="Elimina o Modifica Utente"> <br> <br>
        </form>
        <a href="logout.php">Logout</a>
        </center>
    </body>
</html>