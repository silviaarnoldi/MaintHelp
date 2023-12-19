<!DOCTYPE html>
<html lang="">
<body>
    <form action="registracontroller.php" method="post">
        <input type="text" name="nome" placeholder="nome">
        <input type="text" name="cognome" placeholder="cognome">
        <input type="text" name="ruolo" placeholder="ruolo">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="password" placeholder="password">
        <input type="submit" value="Registrati">
    </form>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>