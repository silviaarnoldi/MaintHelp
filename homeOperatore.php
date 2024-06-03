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
        $cognome=$_SESSION['cognome'];
        $id=$_SESSION['id'];
        $azienda=$_SESSION['azienda'];
        
    }
}

?>
<!DOCTYPE html>
<html lang="">
     <title>Utente senza azienda</title>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Collegamento al tuo file CSS -->
        <link rel="stylesheet" href="CSS/stylehome.css">
        <img src="img/logo.png" width="250" height="100">
        <script>
            function il_submit(opzione)
            {
                var form = document.getElementById("la_forma");
                var azione="richiesta.php?ID=<?php echo $id; ?>";
                form.action = azione;
                //alert("action impostata, eseguo submit");
                form.submit();
            }
        </script>
</head>
    <body>
             <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
    <center>
        <h1>Operatore: <?php echo $nome." ".$cognome; echo "    <a href='modificaUtente.php?ID=".$id."'><button> modifica credenziali</button></a>" ?></h1> <br> 
    <form id="la_forma" action="richiesta.php?ID=<?php echo $id; ?>".$id. method="post">
            <?php
                echo "<input type='hidden' name='azienda' value='".$azienda."' />"
            ?>
            <input type="button" value="invia richiesta"  onclick="il_submit('r')" /> <br>  <br>
        </form>
        <a href="logout.php">Logout</a>
    </center>
    </body>
</html>