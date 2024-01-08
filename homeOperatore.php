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
        
    }
}

?>
<!DOCTYPE html>
<html lang="">
    <body>
    <center>
        <h1>Operatore: <?php echo $nome;?></h1> <br> 
    <form action="richiesta.php" method="post">
            <input type="submit" value="invia richiesta"> <br>  <br>
        </form>
        <a href="logout.php">Logout</a>
    </center>
    </body>
</html>