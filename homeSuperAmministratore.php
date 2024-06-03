<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="PRESIDENTE"){
        header("Location: login.php");
    }else{
        $nome=$_SESSION['nome'];
        $cognome=$_SESSION['cognome'];
        $id=$_SESSION['id'];
    }
}
/*<h1>Benvenuto <?php echo $ruolo; ?></h1>*/
?>
<!DOCTYPE html>
<html lang="">
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
                var azione="creaAzienda.php";
                if(opzione=="e")
                    azione="eliminaAzienda.php";
                if(opzione=="u")
                    azione="aggiungiAmministratore.php";
                if(opzione=="em")
                    azione="eliminaAmministratore.php";
                form.action = azione;
                //alert("action impostata, eseguo submit");
                form.submit();
            }
        </script>
</head>
       
    <body>
        <center>
            <h1>Presidente: <?php echo $nome." ".$cognome; echo "    <a href='modificaUtente.php?ID=".$id."'><button> modifica credenziali</button></a>" ?></h1> <br>
    
             <form id="la_forma" method="post">
                <?php
                    echo "<input type='hidden' name='id' value='".$id."' />"
                ?>
                <input type="button" value="crea azienda"  onclick="il_submit('c')" /> 
                <input type="button" value="elimina o modifica azienda"  onclick="il_submit('e')" /> 
                <input type="button" value="aggiungi dirigente "  onclick="il_submit('u')" /> 
                <input type="button" value="elimina o modifica dirigente"  onclick="il_submit('em')" /> 
                <br/>
                <br/>
            </form>
        <a href="logout.php">Logout</a>
        </center>
    </body>
</html>