<?php
    include "connessione.php";
    $id_utente = $_POST['id_utente'];
    $azienda = $_POST['azienda'];
    $ab = $_POST['AB'];
    
//Echo $id_utente;
    $sql = "UPDATE  UTENTE SET ABILITY='$ab' WHERE ID='$id_utente' AND AZIENDA_ID = '$azienda'";
    if ($connessione->query($sql) === TRUE) {
        header("Location: profile.php");
    } else {
        echo "Errore nell'ABILITA/DISABILITA dell'utente: " . $conn->error;
    }
    $connessione->close();
?>