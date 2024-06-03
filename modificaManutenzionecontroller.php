<?php
 include "connessione.php";
session_start();
$id=$_GET['ID'];
$data = $connessione->real_escape_string($_POST['data']);
$ore = intval($connessione->real_escape_string($_POST['ore']));
$minuti = intval($connessione->real_escape_string($_POST['minuti']));
$descrizione = $connessione->real_escape_string($_POST['descrizione']);
$oretot = $ore * 60 + $minuti;
$query_parts = array();
if (!empty($data) || !empty($ore) || !empty($minuti) || !empty($descrizione)) {
    // Preparo la query in modo dinamico includendo solo i campi non vuoti
    if (!empty($data)) {
        $query_parts[] = "DATA_SCRIVE='$data'";
    }
    if (!empty($ore) || !empty($minuti) ) {
        $query_parts[] = "ORE_MANUTENZIONE='$oretot'";
    }
    if (!empty($descrizione)) {
        $query_parts[] = "DESCRIZIONE='$descrizione'";
    }
    $update_query = "UPDATE DOCUMENTO SET " . implode(", ", $query_parts) . " WHERE ID='$id'";
    
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
        header("Location: modifica.php?err=$err");
    }
} else {
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
    echo "<h1>Nessun dato da aggiornare</h1>";
    echo "<a href='profile.php' class='button'>Torna alla home</a>";
    echo "</center>";
}
?>