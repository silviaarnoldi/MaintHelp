
<?php
// 1. connessione al database
$conn = new mysqli('localhost','root','','MaintHelp');
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    // Se è specificato un ID, esegui la query per ottenere solo l'utente specificato
    $userId = $_GET['id'];
    $sqlguasti = "SELECT * FROM GUASTO WHERE ID = $userId";
} else {
    // Altrimenti, esegui la query per ottenere tutti gli guasti
    $sqlguasti = "SELECT * FROM GUASTO";
}

$resultguasti = $conn->query($sqlguasti);

// Controllo se la query ha prodotto risultati
if ($resultguasti === false) {
    die("Errore nella query: " . $conn->error);
}

// Array per contenere i dati degli guasti
$guasti = array();

// Iterazione sui risultati della query per estrarre i dati degli guasti
while ($rowGUASTO = $resultguasti->fetch_assoc()) {
    $id = $rowGUASTO["ID"];
    $tipoguasto = isset($rowGUASTO["TIPOGUASTO"]) ? $rowGUASTO["TIPOGUASTO"] : "";
   
    $guasto = array(
        "ID" => $id,
        "TIPOGUASTO" => $tipoguasto

    );

    // Aggiungi l'utente all'array degli guasti
    $guasti[] = $guasto;
}

// 4. restituire i dati in formato JSON
header('Content-Type: application/json');
echo json_encode($guasti);

// 5. Chiudi la connessione
$conn->close();
?>