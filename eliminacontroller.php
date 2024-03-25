<?php
    include "connessione.php";
    $id_utente = $_POST['id_utente'];
    $azienda = $_GET['az'];
    
    Echo $id_utente;
    $sql = "DELETE FROM UTENTE WHERE ID='$id_utente'";
    if ($connessione->query($sql) === TRUE) {
        header("Location: elimina.php?az=$azienda");
    } else {
        echo "Errore nell'eliminazione dell'utente: " . $conn->error;
    }
    $connessione->close();
?>