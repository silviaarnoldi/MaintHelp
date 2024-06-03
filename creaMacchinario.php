<!DOCTYPE html>
<html lang="it">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Registra Macchinario</title>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Collegamento al tuo file CSS -->
    <link rel="stylesheet" href="CSS/stylehome.css">
    <img src="img/logo.png" width="250" height="100">
</head>
</head>
<body>
<center>
    <h1>Registra Macchinario</h1>
    <form action="creaMacchinariocontroller.php" method="post" enctype="multipart/form-data">
    <label for="nome">NOME MACCHINARIO:</label> <br>
        <input type="text" name="nome" placeholder="Nome"> <br> <br>
        <label for="data">DATA INSERIMENTO:</label>
        <input type="date" id="dataUltima" name="dataUltima"><br> <br>
        
        <?php
           echo "<input type='hidden' name='azienda' value='".$_POST['azienda']."' />";
        ?> 
        <label for="foto_mec">CARICA SCHEMA MECCANICO:</label> 
        <input type="file" id="foto_mec" name="foto_mec" accept="image/*"> <br> <br>

        <label for="foto_elect">CARICA SCHEMA ELETTRICO:</label>
        <input type="file" id="foto_elect" name="foto_elect" accept="image/*"> <br> <br>
        
        <input type="submit" value="Registra"> 
    </form><br>
    <a href="profile.php">Torna alla Home</a>
</center>

</body>
</html>