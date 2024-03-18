
<?php
// 1. connessione al database
$conn = new mysqli('localhost','root','','MaintHelp');
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    // Se è specificato un ID, esegui la query per ottenere solo l'utente specificato
    $userId = $_GET['id'];
    $sqlmacchinari = "SELECT * FROM MACCHINARIO WHERE ID = $userId";
} else {
    // Altrimenti, esegui la query per ottenere tutti gli macchinari
    $sqlmacchinari = "SELECT * FROM MACCHINARIO";
}

$resultmacchinari = $conn->query($sqlmacchinari);

// Controllo se la query ha prodotto risultati
if ($resultmacchinari === false) {
    die("Errore nella query: " . $conn->error);
}

// Array per contenere i dati degli macchinari
$macchinari = array();

// Iterazione sui risultati della query per estrarre i dati degli macchinari
while ($rowMACCHINARIO = $resultmacchinari->fetch_assoc()) {
    $nome = $rowMACCHINARIO["NOME"];
    $stato = isset($rowMACCHINARIO["STATO"]) ? $rowMACCHINARIO["STATO"] : "";
    $schemaElettrico = isset($rowMACCHINARIO["SCHEMA_ELECT"]) ? $rowMACCHINARIO["SCHEMA_ELECT"] : "";
    $schemaMeccanico = isset($rowMACCHINARIO["SCHEMA_MEC"]) ? $rowMACCHINARIO["SCHEMA_MEC"] : "";
    $prossimaManutenzione = isset($rowMACCHINARIO["PROSSIMA_MANUTENZIONE"]) ? $rowMACCHINARIO["PROSSIMA_MANUTENZIONE"] : "";
    $ultimaManutenzione = isset($rowMACCHINARIO["ULTIMA_MANUTENZIONE"]) ? $rowMACCHINARIO["ULTIMA_MANUTENZIONE"] : "";
    $chiamataManutentore = isset($rowMACCHINARIO["CHIAMATA_MANUTENTORE"]) ? $rowMACCHINARIO["CHIAMATA_MANUTENTORE"] : "";
   
    $macchinario = array(
        "NOME" => $nome,
        "STATO" => $stato,
        "SCHEMA_ELECT" => $schemaElettrico,
        "SCHEMA_MEC" => $schemaMeccanico,
        "PROSSIMA_MANUTENZIONE" => $prossimaManutenzione,
        "ULTIMA_MANUTENZIONE" => $ultimaManutenzione,
        "CHIAMATA_MANUTENTORE" => $chiamataManutentore
    );

    // Aggiungi l'utente all'array degli macchinari
    $macchinari[] = $macchinario;
}

// 4. restituire i dati in formato JSON
header('Content-Type: application/json');
echo json_encode($macchinari);

// 5. Chiudi la connessione
$conn->close();
?>