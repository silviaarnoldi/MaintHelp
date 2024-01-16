<!DOCTYPE html>
<html lang="">
<body>
    <center>
    <h1>Registra Utente</h1>
    <form action="modificaUtentecontroller.php" method="post">
         <input type="text" name="username" placeholder="username"> <br> <br>
        <input type="text" name="password" placeholder="password">  <br> <br>
        <select  name="ruolo">
            <option value="Amministratore">Amministratore</option> 
            <option value="Operatore">Operatore</option>
            <option value="Manutentore">Manutentore</option>
        </select> <br> <br>
        <input type="submit" value="modifica">
    </form>
    </center>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>