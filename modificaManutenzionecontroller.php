<?php
 include "connessione.php";
session_start();
$id=$_GET['ID'];
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$azienda = $_POST['azienda'];
$query_parts = array();
    $verifica="select AZIENDA_ID from UTENTE where ID ='$id'";
    $result=$connessione->query($verifica);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['AZIENDA_ID'] != $azienda) {
            $cambiato= 1;
        }
    }
if (!empty($nome) || !empty($cognome) || $cambiato==1 ) {
    // Preparo la query in modo dinamico includendo solo i campi non vuoti
    if($cambiato==1){
        $query_parts[] = "AZIENDA_ID='$azienda'";
    }
    if (!empty($nome)) {
        $query_parts[] = "NOME='$nome'";
    }
    if (!empty($data_ultima)) {
        $query_parts[] = "COGNOME='$cognome'";
    }
    $update_query = "UPDATE UTENTE SET " . implode(", ", $query_parts) . " WHERE ID='$id'";
    
    try {
        $connessione->query($update_query);
        echo "<head>";
                echo " <link rel='stylesheet' href='CSS/stylecontroller.css'>";
                echo "</head>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<center>";
        echo "<h1>Modifiche effettuate</h1>";
        echo "<br>";
        echo "<a href='profile.php class='button'>Torna alla home</a>";
        echo "</center>";
    } catch (Exception $e) {
        $err = $e->getMessage();
        header("Location: modifica.php?err=$err");
    }
} else {
    echo "<head>";
                echo " <link rel='stylesheet' href='CSS/stylecontroller.css'>";
                echo "</head>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<center>";
    echo "<h1>Nessun dato da aggiornare</h1>";
    echo "<a href='profile.php' class='button'>Torna alla home</a>";
    echo "</center>";
}
?>