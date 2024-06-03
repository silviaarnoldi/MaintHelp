<?php
include "connessione.php";
$id_macchinario = isset($_GET['ID']) ? mysqli_real_escape_string($connessione, $_GET['ID']) : null;
$id_manutentore = $_GET['IDMANUTENTORE'];
$query = "SELECT * FROM MACCHINARIO WHERE ID = $id_macchinario";
$result = mysqli_query($connessione, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Nessun risultato trovato";
}
//   seconda query
$query_documento = "SELECT * FROM DOCUMENTO WHERE MACCHINARIO_ID = '$id_macchinario' AND (TIPODOCUMENTO = 'Richiesta' OR TIPODOCUMENTO = 'Manutenzione')";
$result_documento = mysqli_query($connessione, $query_documento);
$rows_documento = array();
$rows_documento2 = array();
if (mysqli_num_rows($result_documento) > 0) {
    while($row_documento = mysqli_fetch_assoc($result_documento)) {
        if($row_documento['TIPODOCUMENTO'] == 'Richiesta'){
            $rows_documento[] = $row_documento;
        }else{
            if($row_documento['TIPODOCUMENTO'] == 'Manutenzione'){
                $rows_documento2[] = $row_documento;
            }
            
        }
        
    }
}
// terza query
$query_documento3 = "SELECT TIPOGUASTO, COUNT(*) AS NUMERO FROM DOCUMENTO WHERE MACCHINARIO_ID = $id_macchinario AND TIPODOCUMENTO= 'Richiesta' GROUP BY TIPOGUASTO ORDER BY NUMERO DESC";
$result_documento3 = mysqli_query($connessione, $query_documento3);
$rows_documento3 = array();
if (mysqli_num_rows($result_documento3) > 0) {
    while($row_documento3 = mysqli_fetch_assoc($result_documento3)) {
        $rows_documento3[] = $row_documento3;
    }
}

// Chiusura connessione
mysqli_close($connessione);
?>
<!DOCTYPE html>
<html lang="">
<head>
    <meta charset="UTF-8">
    <title>Manutenzione Guasto</title>
    <link rel="stylesheet" href="CSS/stylemanutenzione.css">
    <img src="img/logo.png" width="250" height="100">
</head>
    <center><h1>Manutenzione Guasto</h1> </center>
    </center>
    <table>
        <center>
        <tr>
        <td>
        <form action="manutenzioneGuastocontroller.php?ID=<?php echo $id_macchinario; ?>&IDMANUTENTORE=<?php echo $id_manutentore; ?>" method="post">
            <label for="data">Data:</label><br>
            <input type="date" id="data" name="data"><br>
            <label for="descrizione">Descrizione:</label><br>
            <textarea id="descrizione" name="descrizione"></textarea><br>
            <label for="ore">Ore di manutenzione:</label><br>
            <input type="number" id="ore" name="ore" min="0"><br>
            <label for="minuti">Minuti di manutenzione:</label><br>
            <input type="number" id="minuti" name="minuti" min="0" max="59"><br>
            <label for="data_prossima">Data della prossima manutenzione:</label><br>
            <input type="date" id="data_prossima" name="data_prossima">
            <br> <br>
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
                    }else{
                    }
        ?>
<br><br>
<?php
                    if(!empty($rows_documento2)){
                        echo("<h2>Storico delle Manutenzioni</h2>");
                        echo "<table border='1'>";
                        echo"<tr><th>Id Manutenzione</th>
                        <th>Data Manutenzione</th>
                        <th>Descrizione</th>
                        <th>Tipo Manutenzione</th>
                        <th>Id Manutentore</th></tr>";
                        foreach($rows_documento2 as $row_documento) {
                            echo "<tr>";
                            echo "<td>".$row_documento['ID']."</td>";
                            echo "<td>".$row_documento['DATA_SCRIVE']."</td>";
                            echo "<td>".str_replace("\r\n", "<br>",$row_documento['DESCRIZIONE'])."</td>";
                            echo "<td>".$row_documento['TIPO_MANUTENZIONE']."</td>";
                            echo "<td>".$row_documento['MANUTENTORE_ID']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }else{
                    }
        ?>
            
            <br>
            <br>
           
            <?php
                    if(!empty($rows_documento3)){
                        echo(" <h3>Guasti Ricorrenti</h3>");
                        echo "<table border='1'>";
                        echo"<tr><th>Tipo Guasto</th><th>Numero di frequenza</th></tr>";
                        foreach($rows_documento3 as $row_documento) {
                            echo "<tr>";
                            echo "<td>".$row_documento['TIPOGUASTO']."</td>";
                            echo "<td>".$row_documento['NUMERO']."</td>";
                            echo "</tr>";
                        }
                        echo "</table>";
                    }else{
                    }
        ?>
            <br>
            <br>
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