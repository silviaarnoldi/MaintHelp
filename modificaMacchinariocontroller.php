<?php
include "connessione.php";
session_start();
$id = $_GET['ID'];
$nome = $_POST['nome'];
$data_ultima = $_POST['data_ultima'];
$data_prossima = $_POST['data_prossima'];

// Controllo se le variabili non sono vuote
if (!empty($nome) || !empty($data_ultima) || !empty($data_prossima)) {
    // Preparo la query in modo dinamico includendo solo i campi non vuoti
    $query_parts = array();
    if (!empty($nome)) {
        $query_parts[] = "NOME='$nome'";
    }
    if (!empty($data_ultima)) {
        $query_parts[] = "ULTIMA_MANUTENZIONE='$data_ultima'";
    }
    if (!empty($data_prossima)) {
        $query_parts[] = "PROSSIMA_MANUTENZIONE='$data_prossima'";
    }
    $update_query = "UPDATE MACCHINARIO SET " . implode(", ", $query_parts) . " WHERE ID='$id'";
    
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
        echo "<a href='profile.php' class='button'>Torna alla home</a>";
        echo "</center>";
    } catch (Exception $e) {
        $err = $e->getMessage();
        header("Location: modificaMacchinario.php?err=$err");
    }
} else {
    echo "Nessun dato da aggiornare";
}
?>