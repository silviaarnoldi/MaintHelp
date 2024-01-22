<!DOCTYPE html>
<html lang="">
<body>
    <center>
    <h1>Registra Utente</h1>
    <form action="modificaUtentecontroller.php" method="post">
         <input type="text" name="username" placeholder="username"> <br> <br>
        <input type="text" name="password" placeholder="password">  <br> <br>
        <input type="submit" value="modifica">
    </form>
    <a href="profile.php">Torna alla home</a>
    </center>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>