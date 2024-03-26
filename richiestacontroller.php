<?php
 include "connessioneessione.php";
    $data = $_POST['data'];
    $id_macchinario = $_POST['id_macchinario'];
    $tipo_guasto = $_POST['tipo_guasto'];
    $stato_macchinario = $_POST['stato_macchinario'];
    $operatore_id = $_GET['ID'];
    if($stato_macchinario == "ON") {
        $stato_macchinario = 1;
    } else {
        $stato_macchinario = 0;
    }
   
        $sql = "SELECT ID FROM GUASTO WHERE TIPOGUASTO='$tipo_guasto'";
        $result = $connessione->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $guasto_id = $row['ID'];
            $sql = "INSERT INTO DOCUMENTO (NOME, TIPODOCUMENTO, TIPOGUASTO, DATA_INVIA, OPERATORE_ID, MACCHINARIO_ID, GUASTO_ID) VALUES ('Documento', 'Richiesta', '$tipo_guasto', '$data', '$operatore_id', '$id_macchinario', '$guasto_id')";
            if ($connessione->query($sql) === TRUE) {
                echo "Richiesta inviata con successo";
                echo "<br>";
                echo "<a href='profile.php'>Torna alla home</a>";
            } else {
                echo "Errore nell'invio della richiesta: " . $connessione->error;
            }
            $chiamata_manutentore = 1;
            $sql = "UPDATE MACCHINARIO SET stato='$stato_macchinario', CHIAMATA_MANUTENTORE='$chiamata_manutentore' WHERE id='$id_macchinario'";
            
            if ($connessione->query($sql) === TRUE) {
               
            } else {
                echo "Errore nell'aggiornamento dello stato del macchinario: " . $connessione->error;
            }
        } else {
            
            echo "Tipo di guasto non trovato";
        }

    $connessione->close();
?>