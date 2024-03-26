<!DOCTYPE html>
<html lang="">
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
            <option value="Amministratore">Amministratore</option> 
            <option value="Operatore">Operatore</option>
            <option value="Manutentore">Manutentore</option>
        </select> <br> <br>
        <input type="text" name="username" placeholder="username"> <br> <br>
        <input type="text" name="password" placeholder="password">  <br> <br>
        <input type="submit" value="Registrati">
    </form>
    </center>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>