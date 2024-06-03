
<!DOCTYPE html>
<html lang="">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Collegamento al tuo file CSS -->
        <link rel="stylesheet" href="CSS/stylehome.css">
        <img src="img/logo.png" width="250" height="100">
    </head>
<body>
    <center>
    <h1>Modifica Azienda</h1>
    <form action="modificaAziendacontroller.php" method="post">
        <input type='hidden' name='id_azienda' value='<?php echo $_POST['id_azienda']; ?>'>
        <input type="text" name="nome" placeholder="nuovo nome"> <br> <br>
        <input type="text" name="indirizzo" placeholder="nuovo indirizzo">  <br> <br>
        <input type="text" name="provincia" placeholder="nuovo provincia"> <br> <br>
        <input type="text" name="codice_postale" placeholder="nuovo codice postale"> <br> <br>
        <input type="submit" value="Modifica">
    </form>
    <a href="profile.php">Torna alla Home</a>
    </center>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>