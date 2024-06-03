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
    <h1>Registra Utente</h1>
    <form action="registracontroller.php" method="post">
        <input type="text" name="nome" placeholder="nome"> <br> <br>
        <input type="text" name="cognome" placeholder="cognome"> <br> <br>
        <?php
           echo "<input type='hidden' name='azienda' value='".$_POST['azienda']."' />";
        ?>
        <select  name="ruolo">
            <option value="Dirigente">Dirigente</option> 
            <option value="Operatore">Operatore</option>
            <option value="Manutentore">Manutentore</option>
        </select> <br> <br>
        <input type="text" name="username" placeholder="username"> <br> <br>
        <input type="text" name="password" placeholder="password">  <br> <br>
        <input type="submit" value="Registra">
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