<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Il tuo titolo</title>
    <!-- Collegamento al tuo file CSS -->
    <link rel="stylesheet" href="CSS/stylehome.css">
    <img src="img/logo.png" width="250" height="100">
</head>
<body>
<center>
    <h1>Registra Azienda</h1>
    <form action="creaAziendacontroller.php" method="post" >
    <label for="nome">NOME AZIENDA:</label> <br><br>
        <input type="text" name="nome" placeholder="Nome"> <br> <br>
        <label for="data">INDIRIZZO:</label><br><br>
        <input type="text" name="indirizzo" placeholder="indirizzo"> <br> <br>
        <label for="data">PROVINCIA:</label><br><br>
        <input type="text" name="provincia" placeholder="provincia"> <br> <br>
        <label for="data">CODICE POSTALE:</label> <br><br>
        <input type="text" name="codice_postale" placeholder="codice_postale"> <br> <br>
        <?php
                    echo "<input type='hidden' name='id' value='".$_POST['id']."' />"
                ?>
        <input type="submit" value="Registra"> 
    </form><br>
    <a href="profile.php">Torna alla Home</a>
</center>

</body>
</html>