<?php
session_start();
if (isset($_POST['id_utente'])) {
    $id = $_POST['id_utente'];
} else {
    // Gestione errore se l'ID utente non è stato fornito
    echo "Errore: ID utente non fornito.";
    exit;
}
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Collegamento al tuo file CSS -->
    <link rel="stylesheet" href="CSS/stylehome.css">
    <img src="img/logo.png" width="250" height="100">
</head>
<body>
    <center>
    <h1>Modifica Credenziali</h1>
    <form action="modificacontroller.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="text" name="nome" placeholder="nuovo nome"> <br> <br>
        <input type="text" name="cognome" placeholder="nuovo cognome">  <br> <br>
        <select name="ruolo">
            <option value="DIRIGENTE">Dirigente</option> 
            <option value="Operatore">Operatore</option>
            <option value="Manutentore">Manutentore</option>
        </select> <br> <br>
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