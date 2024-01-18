<?php
$connessione= new mysqli('localhost','root','','MaintHelp'); 
if($connessione->connect_error){
    echo("Connection failed: " . $connessione->connect_error);
    exit();
}
$id_macchinario = isset($_GET['ID']) ? mysqli_real_escape_string($connessione, $_GET['ID']) : null;
$query = "SELECT * FROM MACCHINARIO WHERE ID = $id_macchinario";
$result = mysqli_query($connessione, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Nessun risultato trovato";
}
//   seconda query
$query_documento = "SELECT * FROM DOCUMENTO WHERE MACCHINARIO_ID = $id_macchinario AND TIPODOCUMENTO= 'Richiesta' OR TIPODOCUMENTO= 'Manutenzione'";
$result_documento = mysqli_query($connessione, $query_documento);
$rows_documento = array();
$rows_documento2 = array();
if (mysqli_num_rows($result_documento) > 0) {
    while($row_documento = mysqli_fetch_assoc($result_documento)) {
        if($row_documento['TIPODOCUMENTO'] == 'Richiesta'){
            $rows_documento[] = $row_documento;
        }else{
            $rows_documento2[] = $row_documento;
        }
        
    }
}
/*// terza query
$query_documento2 = "SELECT * FROM DOCUMENTO WHERE MACCHINARIO_ID = $id_macchinario AND TIPODOCUMENTO= 'Manutenzione'";
$result_documento2 = mysqli_query($connessione, $query_documento2);
$rows_documento2 = array();
if (mysqli_num_rows($result_documento2) > 0) {
    while($row_documento2 = mysqli_fetch_assoc($result_documento2)) {
        $rows_documento2[] = $row_documento2;
    }
}*/

$query_utenti = "SELECT * FROM UTENTE WHERE RUOLO = 'MANUTENTORE'";
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
<style>
        div.description {
            font-size: 22px;
        }
      table {
            margin-left: center;
            margin-right: center;
        }
        form {
            font-size: 22px; 
        }
        p {
            //centrarlo
            text-align: center;
            font-size: 22px;
        }

        
    </style>
<body>
    <center><h1>Manutenzione Guasto</h1> </center>
    </center>
    <table>
        <center>
        <tr>
        <td>
        <form action="manutenzioneGuastocontroller.php?ID=<?php echo $id_macchinario; ?>" method="post">
            <label for="data">Data:</label><br>
            <input type="date" id="data" name="data"><br>
            <label for="descrizione">Descrizione:</label><br>
            <textarea id="descrizione" name="descrizione"></textarea><br>
            <label for="ore">Ore di manutenzione:</label><br>
            <input type="number" id="ore" name="ore" min="0"><br>
            <label for="minuti">Minuti di manutenzione:</label><br>
            <input type="number" id="minuti" name="minuti" min="0" max="59"><br>
            <label for="data_prossima">Data della prossima manutenzione:</label><br>
            <input type="date" id="data_prossima" name="data_prossima"><br>
            <label for="id_manutentore">ID Manutentore:</label><br>
            <select  name="id_manutentore">
                <?php foreach($rows_utenti as $row_utenti): ?>
                    <option value="<?php echo $row_utenti['ID']; ?>"><?php echo $row_utenti['USERNAME']; ?></option>
                <?php endforeach; ?>
             </select> <br> <br>
            <input type="submit" value="Inserisci">
            <br><br>
        </form>
        </td>
        <td>
        <?php
                    if(!empty($rows_documento)){
                        echo("<h2> Storico delle Richieste</h2>");
                        echo "<table border='1'>";
                        echo"<tr><th>Id Chiamata</th><th>Data Guasto</th><th>Tipo Guasto</th><th>Id Operatore</th></tr>";
                        foreach($rows_documento as $row_documento) {
                            echo "<tr>";
                            echo "<td>".$row_documento['ID']."</td>";
                            echo "<td>".$row_documento['DATA_INVIA']."</td>";
                            echo "<td>".$row_documento['TIPOGUASTO']."</td>";
                            echo "<td>".$row_documento['OPERATORE_ID']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
        ?>
            
            <br>
            <br>
            <?php
                    if(!empty($rows_documento2)){
                        echo("<h2>Storico delle Manutenzioni</h2>");
                        echo "<table border='1'>";
                        echo"<tr><th>Id Manutenzione</th>
                        <th>Data Manutenzione</th>
                        <th>Descrizione</th>
                        <th>Tipo Manutenzione</th>
                        <th>Id Manutentore</th></tr>";
                        foreach($rows_documento as $row_documento) {
                            echo "<tr>";
                            echo "<td>".$row_documento['ID']."</td>";
                            echo "<td>".$row_documento['DATA_SCRIVE']."</td>";
                            echo "<td>".str_replace("\r\n", "<br>",$row_documento['DESCRIZIONE'])."</td>";
                            echo "<td>".$row_documento['TIPO_MANUTENZIONE']."</td>";
                            echo "<td>".$row_documento['MANUTENTORE_ID']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
        ?>
            
        </td>
        <td>
        <?php
                    if(!empty($rows_documento2)){
                        echo("<h2>Storico delle Manutenzioni</h2>");
                        echo "<table border='1'>";
                        echo"<tr><th>Id Manutenzione</th>
                        <th>Data Manutenzione</th>
                        <th>Descrizione</th>
                        <th>Tipo Manutenzione</th>
                        <th>Id Manutentore</th></tr>";
                        foreach($rows_documento as $row_documento) {
                            echo "<tr>";
                            echo "<td>".$row_documento['ID']."</td>";
                            echo "<td>".$row_documento['DATA_SCRIVE']."</td>";
                            echo "<td>".str_replace("\r\n", "<br>",$row_documento['DESCRIZIONE'])."</td>";
                            echo "<td>".$row_documento['TIPO_MANUTENZIONE']."</td>";
                            echo "<td>".$row_documento['MANUTENTORE_ID']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }
        ?>
        </td>
    </tr>
    </center>
    <tr>
    <td>
            <div class="description">
						SCHEMA MECCANICO
			</div> <br>
            <img src="<?php echo $row['SCHEMA_MEC']; ?>" alt="SCHEMA MECCANICO" style="width:580px;height:340px;">
            
        </td>
        <td>
        <div class="description">
						SCHEMA ELETTRICO
			</div> <br>
            <img src="<?php echo $row['SCHEMA_ELECT']; ?>" alt="SCHEMA ELETTRICO" style="width:580px;height:340px;">
        </td>
    </tr>
    </table> </center>
    <?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?>
</body>
</html>