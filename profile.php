<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['id'])){
    header("Location: login.php");
}
$id=$_SESSION['id'];
$nome=$_SESSION['nome'];
?>
<!DOCTYPE html>
<html lang="">
    <body>
        <h1>Benvenuto <?php echo $nome; ?></h1>
        <a href="logout.php">Logout</a>
    </body>
</html>