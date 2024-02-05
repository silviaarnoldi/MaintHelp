<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="OPERATORE"){
        header("Location: login.php");
    }else{
        $nome=$_SESSION['nome'];
        $id=$_SESSION['id'];
        
    }
}

?>
<!DOCTYPE html>
<html lang="">
    <body>
    <center>
        <h1>Operatore: <?php echo $nome; echo "    <a href='modificaUtente.php?ID=".$id."'><button> modifica credenziali</button></a>" ?></h1> <br> 
    <form action="richiesta.php?ID=<?php echo $id; ?>".$id. method="post">
            <input type="submit" value="invia richiesta"> <br>  <br>
        </form>
        <a href="logout.php">Logout</a>
    </center>
    </body>
</html>