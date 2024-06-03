<?php
    include "connessione.php";
    $id_manutenzione = $_POST['id_manutenzione'];
    
    $sql = "DELETE FROM DOCUMENTO WHERE ID='$id_manutenzione'";
    if ($connessione->query($sql) === TRUE) {
        header("Location: profile.php");
    } else {
        echo "Errore nell'eliminazione dell'utente: " . $connessione->error;
    }
    $connessione->close();
?>