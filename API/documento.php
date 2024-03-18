
<?php
// 1. connessione al database
$conn = new mysqli('localhost','root','','MaintHelp');
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    // Se è specificato un ID, esegui la query per ottenere solo l'DOCUMENTO specificato
    $userId = $_GET['id'];
    $sqldocumenti = "SELECT * FROM DOCUMENTO WHERE ID = $userId";
} else {
    // Altrimenti, esegui la query per ottenere tutti gli documenti
    $sqldocumenti = "SELECT * FROM DOCUMENTO";
}

$resultdocumenti = $conn->query($sqldocumenti);

// Controllo se la query ha prodotto risultati
if ($resultdocumenti === false) {
    die("Errore nella query: " . $conn->error);
}

// Array per contenere i dati degli documenti
$documenti = array();

// Iterazione sui risultati della query per estrarre i dati degli documenti
while ($rowDOCUMENTO = $resultdocumenti->fetch_assoc()) {
    $nome = isset($rowDOCUMENTO["NOME"]) ? $rowDOCUMENTO["NOME"] : "";
    $tipodocumento = isset($rowDOCUMENTO["TIPODOCUMENTO"]) ? $rowDOCUMENTO["TIPODOCUMENTO"] : "";
    $tipoguasto = isset($rowDOCUMENTO["TIPOGUASTO"]) ? $rowDOCUMENTO["TIPOGUASTO"] : "";
    $datainvia = isset($rowDOCUMENTO["DATA_INVIA"]) ? $rowDOCUMENTO["DATA_INVIA"] : "";
    $manutentoreid = isset($rowDOCUMENTO["MANUTENTORE_ID"]) ? $rowDOCUMENTO["MANUTENTORE_ID"] : "";
    $operatoreid = isset($rowDOCUMENTO["OPERATORE_ID"]) ? $rowDOCUMENTO["OPERATORE_ID"] : "";
    $tipomanutenzione = isset($rowDOCUMENTO["TIPO_MANUTENZIONE"]) ? $rowDOCUMENTO["TIPO_MANUTENZIONE"] : "";
    $oremanutenzione = isset($rowDOCUMENTO["ORE_MANUTENZIONE"]) ? $rowDOCUMENTO["ORE_MANUTENZIONE"] : "";
    $descrizione = isset($rowDOCUMENTO["DESCRIZIONE"]) ? $rowDOCUMENTO["DESCRIZIONE"] : "";
    $datascrive = isset($rowDOCUMENTO["DATA_SCRIVE"]) ? $rowDOCUMENTO["DATA_SCRIVE"] : "";
    $macchinarioid = isset($rowDOCUMENTO["MACCHINARIO_ID"]) ? $rowDOCUMENTO["MACCHINARIO_ID"] : "";
    $guastoid = isset($rowDOCUMENTO["GUASTO_ID"]) ? $rowDOCUMENTO["GUASTO_ID"] : "";
    $documento = array(
        "NOME" => $nome,
        "TIPODOCUMENTO" => $tipodocumento,
        "TIPOGUASTO" => $tipoguasto,
        "DATA_INVIA" => $datainvia,
        "MANUTENTORE_ID" => $manutentoreid,
        "OPERATORE_ID" => $operatoreid,
        "TIPO_MANUTENZIONE" => $tipomanutenzione,
        "ORE_MANUTENZIONE" => $oremanutenzione,
        "DESCRIZIONE" => $descrizione,
        "DATA_SCRIVE" => $datascrive,
        "MACCHINARIO_ID" => $macchinarioid,
        "GUASTO_ID" => $guastoid

    );

    // Aggiungi l'DOCUMENTO all'array degli documenti
    $documenti[] = $documento;
}

// 4. restituire i dati in formato JSON
header('Content-Type: application/json');
echo json_encode($documenti);

// 5. Chiudi la connessione
$conn->close();
?>