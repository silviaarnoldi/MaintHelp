<?php
    $id_utente = $_POST['id_utente'];
    Echo $id_utente;
    $conn = new mysqli('localhost','root','','MaintHelp'); 
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    $sql = "DELETE FROM UTENTE WHERE ID='$id_utente'";
    if ($conn->query($sql) === TRUE) {
        header("Location: elimina.php");
    } else {
        echo "Errore nell'eliminazione dell'utente: " . $conn->error;
    }
    $conn->close();
?>