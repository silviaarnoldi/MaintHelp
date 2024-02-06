<?php
session_start();
$id=$_POST['id_utente'];
?>
<!DOCTYPE html>
<html lang="">
<body>
    <center>
    <h1>Modifica Credenziali</h1>
    <form action="modificacontroller.php?ID=<?php echo $id; ?>" method="post">
        <input type="text" name="nome" placeholder="nuovo nome"> <br> <br>
        <input type="text" name="cognome" placeholder="nuovo cognome">  <br> <br>
        <select  name="ruolo">
            <option value="Amministratore">Amministratore</option> 
            <option value="Operatore">Operatore</option>
            <option value="Manutentore">Manutentore</option>
        </select> <br> <br>
        <input type="submit" value="Modifica">
    </form>
    </center>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>