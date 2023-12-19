<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
$id=$_SESSION['id'];
$nome=$_SESSION['nome'];
$ruolo=$_SESSION['ruolo'];
?>
<!DOCTYPE html>
<html lang="">
    <body>
        <h1>Benvenuto <?php echo $ruolo; ?></h1>
        <a href="logout.php">Logout</a>
    </body>
</html>