<?php
    include "connessione.php";
    $data = $_POST['data'];
    $ore = $_POST['ore'];
    $minuti = $_POST['minuti'];
    $data_prossima = $_POST['data_prossima'];
    $id_manutentore = $_GET['IDMANUTENTORE'];
    $id_macchinario = $_GET['ID'];
    $descrizione = $_POST['descrizione'];

    $oretot=$ore*60+$minuti;
    $sql = "INSERT INTO DOCUMENTO (NOME,TIPODOCUMENTO,TIPO_MANUTENZIONE,DATA_SCRIVE, ORE_MANUTENZIONE, DESCRIZIONE, MANUTENTORE_ID, MACCHINARIO_ID) VALUES ('DOCUMENTO','Manutenzione','Guasto','$data', '$oretot',  '$descrizione','$id_manutentore', '$id_macchinario')";
    if ($connessione->query($sql) === TRUE) {
        $sql = "UPDATE MACCHINARIO SET PROSSIMA_MANUTENZIONE='$data_prossima', ULTIMA_MANUTENZIONE='$data', CHIAMATA_MANUTENTORE= '0' WHERE ID='$id_macchinario'";
        if ($conn->query($sql) === TRUE) {
            echo "Manutenzione per il guasto eseguita con successo";
            echo "<br>";
            echo "<a href='profile.php'>Torna alla home</a>";
        } else {
            echo "Errore nell'aggiornamento del macchinario: " . $connessione->error;
        }
    } else {
        echo "Errore nell'inserimento della manutenzione preventiva: " . $connessione->error;
    }

    $connessione->close();
?>