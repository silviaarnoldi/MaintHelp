<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="Operatore"){
        header("Location: login.php");
    }else{
        echo(" benenuto Operatore");
        //codice...
    }
}

?>
<!DOCTYPE html>
<html lang="">
    <body>
        
        <a href="logout.php">Logout</a>
    </body>
</html>