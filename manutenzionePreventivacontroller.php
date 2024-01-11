<?php
    $data = $_POST['data'];
    $ore = $_POST['ore'];
    $minuti = $_POST['minuti'];
    $data_prossima = $_POST['data_prossima'];
    $id_manutentore = $_POST['id_manutentore'];
    $id_macchinario = $_GET['ID'];
    $descrizione = $_POST['descrizione'];

    $conn = new mysqli('localhost','root','','MaintHelp'); 
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    $oretot=$ore*60+$minuti;
    $sql = "INSERT INTO DOCUMENTO (NOME,TIPODOCUMENTO,TIPO_MANUTENZIONE,DATA_SCRIVE, ORE_MANUTENZIONE, DESCRIZIONE, MANUTENTORE_ID, MACCHINARIO_ID) VALUES ('DOCUMENTO','Manutenzione','preventiva','$data', '$oretot',  '$descrizione','$id_manutentore', '$id_macchinario')";
    if ($conn->query($sql) === TRUE) {
        $sql = "UPDATE MACCHINARIO SET PROSSIMA_MANUTENZIONE='$data_prossima', ULTIMA_MANUTENZIONE='$data' WHERE ID='$id_macchinario'";
        if ($conn->query($sql) === TRUE) {
            echo "Manutenzione preventiva eseguita con successo";
            echo "<br>";
            echo "<a href='profile.php'>Torna alla home</a>";
        } else {
            echo "Errore nell'aggiornamento del macchinario: " . $conn->error;
        }
    } else {
        echo "Errore nell'inserimento della manutenzione preventiva: " . $conn->error;
    }

    $conn->close();
?>