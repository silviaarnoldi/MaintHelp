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
        $azienda=$_SESSION['azienda'];
    }
}
/*<h1>Benvenuto <?php echo $ruolo; ?></h1>*/
?>
<!DOCTYPE html>
<html lang="">
    <head>
        <script>
            function quale_pagina_php(quale)
            {
                document.getElementById("la_forma").action=quale;
                document.getElementById("la_forma").submit();
            }
        </script>
    <body>
        <center>
            <h1>Amministratore: <?php echo $nome; echo "    <a href='modificaUtente.php?ID=".$id."'><button> modifica credenziali</button></a>" ?></h1> <br>
            <form id="la_forma" method="post"> 
            <?php
            echo "<input type='text' name='az' value='".$azienda."'>";
            ?>
            <input type="button" value="Registra Utente" onclick="quale_pagina_php('registra.php');"> <br> <br>
            <input type="button" value="Elimina o Modifica Utente" onclick="quale_pagina_php('elimina.php');"> <br> <br>
        </form>
        <a href="logout.php">Logout</a>
        </center>
    </body>
</html>