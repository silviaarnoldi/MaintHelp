<?php
    include "connessione.php";
    $id_utente = $_POST['id_utente'];
    $azienda = $_POST['azienda'];
    $sql = "DELETE FROM UTENTE WHERE ID='$id_utente'";
    if ($connessione->query($sql) === TRUE) {
        header("Location: profile.php");
    } else {
        echo "Errore nell'eliminazione dell'utente: " . $conn->error;
    }
    $connessione->close();
?>