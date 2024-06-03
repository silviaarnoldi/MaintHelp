<?php
     include "connessione.php";

   $id_operatore=$_GET['ID']
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
    <h1>INVIA RICHIESTA</h1>
    <form action="richiestacontroller.php?ID=<?php echo $id_operatore;?>" method="post">
        <label for="data">Data:</label>
        <input type="date" name="data"> <br>  <br>
        <label for="id_macchinario">ID Macchinario:</label> 
        <select for="id_macchinario" name="id_macchinario">
            <?php
                 include "connessione.php";
                 $azienda=$_POST['azienda'];
                 $query = "SELECT * FROM MACCHINARIO WHERE AZIENDA_ID='$azienda'";
                 $result_documento = mysqli_query($connessione, $query);
                $rows_documento = array();
                if (mysqli_num_rows($result_documento) > 0) {
                    while($row_documento = mysqli_fetch_assoc($result_documento)) {
                        echo "<option value='".$row_documento['ID']."'>".$row_documento['ID']."</option> ";
                    }
                }
            ?>
        </select> <br>  <br>
        <label for="tipo_guasto">Tipo Guasto:</label>
        <select name="tipo_guasto">
            <option value="Elettrico">Elettrico</option>
            <option value="Meccanico">Meccanico</option>
            <option value="ElettricoInformatico">Elettrico Informatico</option>
            <option value="Altro">Altro</option>
        </select> <br>  <br>
        <label for="stato_macchinario">Stato Macchinario:</label>
        <select name="stato_macchinario">
            <option value="ON">ON</option>
            <option value="OFF">OFF</option>
        </select> <br>  
        <input type="submit" value="Invia Richiesta"> 
    </form>
</body>
</html>