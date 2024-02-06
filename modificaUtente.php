<?php 
session_start();
$id=$_GET['ID'];
?>
<!DOCTYPE html>
<html lang="">
<body>
    <center>
    <h1>Modifica Credenziali</h1>
    <form action="modificaUtentecontroller.php?ID=<?php echo $id; ?>" method="post">
        <input type="text" name="username" placeholder="nuovo username"> <br> <br>
        <input type="text" name="password" placeholder="nuova password">  <br> <br>
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