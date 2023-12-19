<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="Manutentore"){
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
            <h1>Manutentore: <?php echo $nome; ?></h1> <br> 
        <a href="logout.php">Logout</a>
        </center>
    </body>
</html>