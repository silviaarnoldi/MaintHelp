<?php
include "connessione.php";
$id_macchinario = isset($_GET['ID']) ? mysqli_real_escape_string($connessione, $_GET['ID']) : null;
//prendi manutentore 
$id_manutentore = isset($_GET['IDMANUTENTORE']) ? mysqli_real_escape_string($connessione, $_GET['IDMANUTENTORE']) : null;
$query = "SELECT * FROM MACCHINARIO WHERE ID = $id_macchinario";
$result = mysqli_query($connessione, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Nessun risultato trovato";
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
<body>
    <center><h1>Manutenzione Preventiva</h1> </center>
    </center>
    <table>
        <center>
        <tr>
        <td>
        <form action="manutenzionePreventivacontroller.php?ID=<?php echo $id_macchinario; ?>&IDMANUTENTORE=<?php echo $id_manutentore; ?>" method="post">
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
            <br> 
            <input type="submit" value="Inserisci">
        </form>
        </td>
        <td>
            <div class="description">
						SCHEMA MECCANICO
			</div> 
            <img src="<?php echo $row['SCHEMA_MEC']; ?>" alt="SCHEMA MECCANICO" style="width:580px;height:340px;">
            
        </td>
    </tr>
    </center>
    <tr>
        <td></td>
        <td>
        <div class="description">
						SCHEMA ELETTRICO
			</div> 
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