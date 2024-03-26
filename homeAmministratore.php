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
            function il_submit(opzione)
            {
                var form = document.getElementById("la_forma");
                var azione="registra.php";
                //alert(opzione)
                if(opzione=="e")
                    azione="elimina.php";
                form.action = azione;
                //alert("action impostata, eseguo submit");
                form.submit();
            }
        </script>
</head>
       
    <body>
        <center>
            <h1>Amministratore: <?php echo $nome; echo "    <a href='modificaUtente.php?ID=".$id."'><button> modifica credenziali</button></a>" ?></h1> <br>
    
             <form id="la_forma" method="post">
                <?php
                    echo "<input type='hidden' name='azienda' value='".$azienda."' />"
                ?>
                <input type="button" value="Registra Utente"  onclick="il_submit('r')" /> 
                <input type="button" value="Elimina Utente"  onclick="il_submit('e')" /> 
                <br/>
                <br/>
            </form>
        <a href="logout.php">Logout</a>
        </center>
    </body>
</html>