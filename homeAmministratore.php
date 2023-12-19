<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="Amministratore"){
        header("Location: login.php");
    }else{
        //echo(" benenuto Amministratore");
        $ruolo=$_SESSION['ruolo'];

    }
}
/*<h1>Benvenuto <?php echo $ruolo; ?></h1>*/
?>
<!DOCTYPE html>
<html lang="">
    <body>
        
        <a href="logout.php">Logout</a>
    </body>
</html>
