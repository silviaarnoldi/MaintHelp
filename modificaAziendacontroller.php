<?php
include "connessione.php";
session_start();
$id_azienda = $_POST['id_azienda'];
$nome = $_POST['nome'];
$indirizzo = $_POST['indirizzo'];
$provincia = $_POST['provincia'];
$codice_postale = $_POST['codice_postale'];

// Verifica se almeno uno dei campi non è vuoto
if (!empty($nome) || !empty($indirizzo) || !empty($provincia) || !empty($codice_postale)) {
    // Preparo la query in modo dinamico includendo solo i campi non vuoti
    $query_parts = array();
    if (!empty($nome)) {
        $query_parts[] = "NOME='$nome'";
    }
    if (!empty($indirizzo)) {
        $query_parts[] = "INDIRIZZO='$indirizzo'";
    }
    if (!empty($provincia)) {
        $query_parts[] = "PROVINCIA='$provincia'";
    }
    if (!empty($codice_postale)) {
        $query_parts[] = "CODICE_POSTALE='$codice_postale'";
    }
    // Verifica che almeno un campo sia stato aggiornato
    if (!empty($query_parts)) {
        $update_query = "UPDATE AZIENDA SET " . implode(", ", $query_parts) . " WHERE ID='$id_azienda'";
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
            echo $err;
        }
    } else {
        echo "Nessun dato da aggiornare";
    }
} else {
    echo "Nessun dato da aggiornare";
}
?>