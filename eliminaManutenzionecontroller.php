<?php
    $id_manutenzione = $_POST['id_manutenzione'];
    $conn = new mysqli('localhost','root','','MaintHelp'); 
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }
    $sql = "DELETE FROM DOCUMENTO WHERE ID='$id_manutenzione'";
    if ($conn->query($sql) === TRUE) {
        header("Location: profile.php");
    } else {
        echo "Errore nell'eliminazione dell'utente: " . $conn->error;
    }
    $conn->close();
?>