<?php
    $id_utente = $_POST['id_utente'];
    $conn = new mysqli('localhost','root','','MaintHelp'); 

    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $sql = "DELETE FROM UTENTE WHERE ID='$id_utente'";

    // Esecuzione query
    if ($conn->query($sql) === TRUE) {
        echo "eliminazione effetuata";
        echo "<br>";
        echo "<a href='profile.php'>Torna alla home</a>";
    } else {
        echo "Errore nell'eliminazione dell'utente: " . $conn->error;
    }

    $conn->close();
?>