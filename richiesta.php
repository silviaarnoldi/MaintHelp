<?php
    $connessione= new mysqli('localhost','root','','MaintHelp'); 
    if($connessione->connect_error){
        echo("Connection failed: " . $connessione->connect_error);
        exit();
    }

    $query_utenti = "SELECT * FROM UTENTE WHERE RUOLO = 'OPERATORE'";
    $result_utenti = mysqli_query($connessione, $query_utenti);
    $rows_utenti = array();
    if (mysqli_num_rows($result_utenti) > 0) {
        while($row_utenti = mysqli_fetch_assoc($result_utenti)) {
            $rows_utenti[] = $row_utenti;
        }
    }
    

    // Chiusura connessione
    mysqli_close($connessione);
?>
<!DOCTYPE html>
<html lang="">
<body>
    <center>
    <h1>INVIA RICHIESTA</h1>
    <form action="richiestacontroller.php" method="post">
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
        </select> <br>  <br>
        <label for="id_operatore">ID Operatore:</label>
            <select  name="id_operatore">
                <?php foreach($rows_utenti as $row_utenti): ?>
                    <option value="<?php echo $row_utenti['ID']; ?>"><?php echo $row_utenti['USERNAME']; ?></option>
                <?php endforeach; ?>
             </select> <br> <br>
        <input type="submit" value="Invia Richiesta"> 
    </form>
</body>
</html>