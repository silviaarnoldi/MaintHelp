<?php
     include "connessione.php";

   $id_operatore=$_GET['ID']
?>
<!DOCTYPE html>
<html lang="">
<body>
    <center>
    <h1>INVIA RICHIESTA</h1>
    <form action="richiestacontroller.php?ID=<?php echo $id_operatore;?>" method="post">
        <label for="data">Data:</label>
        <input type="date" name="data"> <br>  <br>
        <label for="id_macchinario">ID Macchinario:</label> 
        <input type="text" name="id_macchinario" placeholder="ID Macchinario"> <br>  <br>
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