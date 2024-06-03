<?php
    include "connessione.php";
    $id_azienda = $_POST['id_azienda'];
    
    // Prima elimina gli utenti correlati all'azienda
    $delete_utenti_sql = "DELETE FROM UTENTE WHERE AZIENDA_ID='$id_azienda'";
    if ($connessione->query($delete_utenti_sql) === TRUE) {
        // Successivamente elimina i documenti correlati al macchinario
        $delete_documenti_sql = "DELETE FROM DOCUMENTO WHERE MACCHINARIO_ID IN (SELECT ID FROM MACCHINARIO WHERE AZIENDA_ID='$id_azienda')";
        if ($connessione->query($delete_documenti_sql) === TRUE) {
            // Successivamente elimina le righe nella tabella MACCHINARIO che fanno riferimento all'azienda
            $delete_macchinario_sql = "DELETE FROM MACCHINARIO WHERE AZIENDA_ID='$id_azienda'";
            if ($connessione->query($delete_macchinario_sql) === TRUE) {
                // Ora elimina l'azienda
                $delete_azienda_sql = "DELETE FROM AZIENDA WHERE ID='$id_azienda'";
                if ($connessione->query($delete_azienda_sql) === TRUE) {
                    header("Location: profile.php");
                } else {
                    echo "Errore nell'eliminazione dell'AZIENDA: " . $connessione->error;
                }
            } else {
                echo "Errore nell'eliminazione dei MACCHINARIO: " . $connessione->error;
            }
        } else {
            echo "Errore nell'eliminazione dei DOCUMENTI: " . $connessione->error;
        }
    } else {
        echo "Errore nell'eliminazione degli UTENTI: " . $connessione->error;
    }
    $connessione->close();
?>