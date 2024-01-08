<?php
    $data = $_POST['data'];
    $id_macchinario = $_POST['id_macchinario'];
    $tipo_guasto = $_POST['tipo_guasto'];
    $stato_macchinario = $_POST['stato_macchinario'];
    $username_operatore = $_POST['username_operatore'];
    if($stato_macchinario == "ON") {
        $stato_macchinario = 1;
    } else {
        $stato_macchinario = 0;
    }
    // Connessione al database
    $conn = new mysqli('localhost','root','','MaintHelp'); 

    // Verifica connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    // Ottieni l'ID dell'operatore dal suo username
    $sql = "SELECT id FROM UTENTE WHERE username='$username_operatore' AND ruolo='Operatore'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // L'operatore esiste, ottieni il suo ID
        $row = $result->fetch_assoc();
        $operatore_id = $row['id'];

        // Ottieni l'ID del guasto dal suo tipo
        $sql = "SELECT ID FROM GUASTO WHERE TIPOGUASTO='$tipo_guasto'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Il guasto esiste, ottieni il suo ID
            $row = $result->fetch_assoc();
            $guasto_id = $row['ID'];

            // Query di inserimento
            $sql = "INSERT INTO DOCUMENTO (NOME, TIPODOCUMENTO, TIPOGUASTO, DATA_INVIA, OPERATORE_ID, MACCHINARIO_ID, GUASTO_ID) VALUES ('Documento', 'Richiesta', '$tipo_guasto', '$data', '$operatore_id', '$id_macchinario', '$guasto_id')";

            // Esecuzione query
            if ($conn->query($sql) === TRUE) {
                echo "Richiesta inviata con successo";
                echo "<br>";
                echo "<a href='profile.php'>Torna alla home</a>";
            } else {
                echo "Errore nell'invio della richiesta: " . $conn->error;
            }

            // Aggiornamento dello stato del macchinario
            $chiamata_manutentore = 1;
            $sql = "UPDATE MACCHINARIO SET stato='$stato_macchinario', CHIAMATA_MANUTENTORE='$chiamata_manutentore' WHERE id='$id_macchinario'";
            // Esecuzione query
            if ($conn->query($sql) === TRUE) {
               // echo "Stato del macchinario aggiornato con successo";
            } else {
                echo "Errore nell'aggiornamento dello stato del macchinario: " . $conn->error;
            }
        } else {
            // Il guasto non esiste
            echo "Tipo di guasto non trovato";
        }
    } else {
        // L'operatore non esiste
        echo "Operatore non trovato";
    }

    // Chiusura connessione
    $conn->close();
?>