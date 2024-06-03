<?php
    include "connessione.php";
    $id_macchianrio = $_POST['id_macchianrio'];
    $sql = "DELETE FROM MACCHINARIO WHERE ID='$id_macchianrio'";
    if ($connessione->query($sql) === TRUE) {
        header("Location: profile.php");
    } else {
        echo "Errore nell'eliminazione dell'AZIENDA: " . $conn->error;
    }
    $connessione->close();
?>