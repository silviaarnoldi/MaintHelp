<?php
include "connessione.php";
session_start();
if (isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    echo "Errore: ID utente non fornito.";
    exit;
}

$nome = isset($_POST['nome']) ? $_POST['nome'] : '';
$cognome = isset($_POST['cognome']) ? $_POST['cognome'] : '';
$ruolo = isset($_POST['ruolo']) ? strtoupper($_POST['ruolo']) : '';

if (!empty($nome) || !empty($cognome) || !empty($ruolo)) {
    // Preparo la query in modo dinamico includendo solo i campi non vuoti
    $query_parts = array();
    if (!empty($nome)) {
        $query_parts[] = "NOME='$nome'";
    }
    if (!empty($cognome)) {
        $query_parts[] = "COGNOME='$cognome'";
    }
    if (!empty($ruolo)) {
        $query_parts[] = "RUOLO='$ruolo'";
    }
    $update_query = "UPDATE UTENTE SET " . implode(", ", $query_parts) . " WHERE ID='$id'";
    
    try {
        $connessione->query($update_query);
        echo "<head>";
        echo " <link rel='stylesheet' href='CSS/stylecontroller.css'>";
        echo "</head>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<center>";
        echo "<h1>Modifiche effettuate</h1>";
        echo "<br>";
        echo "<a href='profile.php'class='button'>Torna alla home</a>";
        echo "</center>";
    } catch (Exception $e) {
        $err = $e->getMessage();
        header("Location: modifica.php?err=$err");
    }
} else {
    echo "Nessun dato da aggiornare";
}
?>