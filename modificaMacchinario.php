<?php
session_start();
$id=$_POST['id_macchinario'];
?>
<!DOCTYPE html>
<html lang="">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Collegamento al tuo file CSS -->
        <link rel="stylesheet" href="CSS/stylehome.css">
        <img src="img/logo.png" width="250" height="100">
    </head>
<body>
    <center>
    <h1>Modifica Macchinario</h1>
    <form action="modificaMacchinariocontroller.php?ID=<?php echo $id; ?>" method="post">
        <input type="text" name="nome" placeholder="nuovo nome"> <br> <br>
        <label for="data_prossima">Data prossima manutenzione:</label> 
        <input type="date" id="data_prossima" name="data_prossima"><br>  <br> 
        <label for="data_ultima">Data ultima manutenzione:</label> 
        <input type="date" id="data_ultima" name="data_ultima"><br>  <br> 
        <input type="submit" value="Modifica">
    </form>
    <a href="profile.php">Torna alla Home</a>
    </center>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>