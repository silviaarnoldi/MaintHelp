<?php
include "connessione.php";

// Usa real_escape_string per evitare problemi di sintassi SQL e iniezioni SQL
$data = $connessione->real_escape_string($_POST['data']);
$ore = $connessione->real_escape_string($_POST['ore']);
$minuti = $connessione->real_escape_string($_POST['minuti']);
$data_prossima = $connessione->real_escape_string($_POST['data_prossima']);
$id_manutentore = $connessione->real_escape_string($_GET['IDMANUTENTORE']);
$id_macchinario = $connessione->real_escape_string($_GET['ID']);
$descrizione = $connessione->real_escape_string($_POST['descrizione']);

$oretot = $ore * 60 + $minuti;

$sql = "INSERT INTO DOCUMENTO (NOME, TIPODOCUMENTO, TIPO_MANUTENZIONE, DATA_SCRIVE, ORE_MANUTENZIONE, DESCRIZIONE, MANUTENTORE_ID, MACCHINARIO_ID) 
VALUES ('DOCUMENTO', 'Manutenzione', 'Guasto', '$data', '$oretot', '$descrizione', '$id_manutentore', '$id_macchinario')";

if ($connessione->query($sql) === TRUE) {
    $sql = "UPDATE MACCHINARIO SET PROSSIMA_MANUTENZIONE='$data_prossima', ULTIMA_MANUTENZIONE='$data', CHIAMATA_MANUTENTORE= '0' WHERE ID='$id_macchinario'";
    if ($connessione->query($sql) === TRUE) {
        echo "<head>";
        echo " <link rel='stylesheet' href='CSS/stylecontroller.css'>";
        echo "</head>";
        echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
        echo "<center>";
        echo "<h1>Manutenzione per il guasto eseguita con successo</h1>";
        echo "<br>";
        echo "<a href='profile.php'class='button'>Torna alla home</a>";
        echo "</center>";
    } else {
        echo "Errore nell'aggiornamento del macchinario: " . $connessione->error;
    }
} else {
    echo "Errore nell'inserimento della manutenzione preventiva: " . $connessione->error;
}

$connessione->close();
?>