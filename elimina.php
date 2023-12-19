<!DOCTYPE html>
<html lang="">
<body>
    <center>
    <h1>Elimina Utente</h1> <br> <br>
    <form action="eliminacontroller.php" method="post"> 
        <input type="text" name="username" placeholder="username"> <br> <br>
        <input type="text" name="nome" placeholder="Nome"> <br> <br>
        <input type="text" name="cognome" placeholder="Cognome"> <br> <br>
        <input type="text" name="ruolo" placeholder="Ruolo"> <br> <br>
        <input type="submit" value="Elimina">
    </form>
    </center>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>