<!DOCTYPE html>
<html lang="">
<body>
    <form action="eliminacontroller.php" method="post">
        <input type="text" name="username" placeholder="username">
        <input type="text" name="nome" placeholder="Nome">
        <input type="text" name="cognome" placeholder="Cognome">
        <input type="text" name="ruolo" placeholder="Ruolo">
        <input type="submit" value="Elimina">
    </form>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>