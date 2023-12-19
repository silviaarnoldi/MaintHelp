<?php
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $ruolo = $_POST['ruolo'];

    // Connessione al database
    $conn = new mysqli('localhost','root','','MaintHelp'); 

    // Verifica connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $sql = "DELETE FROM UTENTE WHERE NOME='$nome' AND COGNOME='$cognome' AND RUOLO='$ruolo'";

    // Esecuzione query
    if ($conn->query($sql) === TRUE) {
        echo "Utente eliminato con successo";
    } else {
        echo "Errore nell'eliminazione dell'utente: " . $conn->error;
    }

    $conn->close();
?>