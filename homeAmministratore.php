<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="DIRIGENTE"){
        header("Location: login.php");
    }else{
        $nome=$_SESSION['nome'];
        $cognome=$_SESSION['cognome'];
        $id=$_SESSION['id'];
        $azienda=$_SESSION['azienda'];
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
</head>
    <head>
        <script>
            function il_submit(opzione)
            {
                var form = document.getElementById("la_forma");
                var azione="registra.php";
                //alert(opzione)
                if(opzione=="e")
                    azione="elimina.php";
                if(opzione=="a")
                    azione="abilitaDisabilita.php";
                if(opzione=="c")
                    azione="creaMacchinario.php";
                if(opzione=="em")
                    azione="eliminaMacchinario.php";
                form.action = azione;
                //alert("action impostata, eseguo submit");
                form.submit();
            }
        </script>
</head>
       
    <body>
        <center>
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
            <h1>Amministratore: <?php echo $nome." ".$cognome; echo "    <a href='modificaUtente.php?ID=".$id."'><button> modifica credenziali</button></a>" ?></h1> <br>
    
             <form id="la_forma" method="post">
                <?php
                    echo "<input type='hidden' name='azienda' value='".$azienda."' />"
                ?>
                <input type="button" value="Registra Utente"  onclick="il_submit('r')" /> 
                <input type="button" value="Elimina Utente"  onclick="il_submit('e')" /> 
                <input type="button" value="Abilita e Disabilita Utente"  onclick="il_submit('a')" /> 
                <input type="button" value="crea macchinario"  onclick="il_submit('c')" /> 
                <input type="button" value="Elimina o Modifica macchinario"  onclick="il_submit('em')" /> 
                <br/>
                <br/>
            </form>
        <a href="logout.php">Logout</a>
        </center>
    </body>
</html>