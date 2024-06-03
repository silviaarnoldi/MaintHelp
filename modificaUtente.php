<?php 
$id = isset($_GET['ID']) ? $_GET['ID'] : null;
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