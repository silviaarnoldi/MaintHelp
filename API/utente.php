
<?php
// 1. connessione al database
$conn = new mysqli('localhost','root','','MaintHelp');
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

if(isset($_GET['id'])) {
    // Se è specificato un ID, esegui la query per ottenere solo l'utente specificato
    $userId = $_GET['id'];
    $sqlUtenti = "SELECT * FROM UTENTE WHERE ID = $userId";
} else {
    // Altrimenti, esegui la query per ottenere tutti gli utenti
    $sqlUtenti = "SELECT * FROM UTENTE";
}

$resultUtenti = $conn->query($sqlUtenti);

// Controllo se la query ha prodotto risultati
if ($resultUtenti === false) {
    die("Errore nella query: " . $conn->error);
}

// Array per contenere i dati degli utenti
$utenti = array();

// Iterazione sui risultati della query per estrarre i dati degli utenti
while ($rowUtente = $resultUtenti->fetch_assoc()) {
    $username = $rowUtente["USERNAME"];
    $nome = isset($rowUtente["NOME"]) ? $rowUtente["NOME"] : "";
    $cognome = isset($rowUtente["COGNOME"]) ? $rowUtente["COGNOME"] : "";
    $ruolo = isset($rowUtente["RUOLO"]) ? $rowUtente["RUOLO"] : "";
    $password = isset($rowUtente["PASSWORD"]) ? $rowUtente["PASSWORD"] : "";
    $utente = array(
        "USERNAME" => $username,
        "NOME" => $nome,
        "COGNOME" => $cognome,
        "RUOLO" => $ruolo,
        "PASSWORD" => $password

    );

    // Aggiungi l'utente all'array degli utenti
    $utenti[] = $utente;
}

// 4. restituire i dati in formato JSON
header('Content-Type: application/json');
echo json_encode($utenti);

// 5. Chiudi la connessione
$conn->close();
?>