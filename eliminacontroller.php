<?php
    
    $username = $_POST['username'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $ruolo = $_POST['ruolo'];
    $conn = new mysqli('localhost','root','','MaintHelp'); 

    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    }

    $sql = "DELETE FROM UTENTE WHERE NOME='$nome' AND COGNOME='$cognome' AND RUOLO='$ruolo' AND USERNAME='$username'";

    // Esecuzione query
    if ($conn->query($sql) === TRUE) {
        echo "Utente eliminato con successo";
        header("Location: homeAmministratore.php");
    } else {
        echo "Errore nell'eliminazione dell'utente: " . $conn->error;
    }

    $conn->close();
?>