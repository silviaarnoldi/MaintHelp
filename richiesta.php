<!DOCTYPE html>
<html lang="">
<body>
    <center>
    <h1>INVIA RICHIESTA</h1>
    <form action="richiestacontroller.php" method="post">
        <input type="date" name="data"> <br>  <br> 
        <input type="text" name="id_macchinario" placeholder="ID Macchinario"><br>  <br>
        <select name="tipo_guasto">
            <option value="Elettrico">Elettrico</option>
            <option value="Meccanico">Meccanico</option>
            <option value="ElettricoInformatico">Elettrico Informatico</option>
            <option value="Altro">Altro</option>
        </select> <br>  <br>
        <input type="text" name="stato_macchinario" placeholder="Stato Macchinario (ON/OFF)"> <br>  <br>
        <input type="text" name="username_operatore" placeholder="Username Operatore"> <br>  <br>
        <input type="submit" value="Invia Richiesta"> 
    </form>
</body>
</html>