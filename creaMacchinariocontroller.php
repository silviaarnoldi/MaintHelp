<?php
include "connessione.php";
$target_dir = "uploads/";

if (!file_exists($target_dir)) {
    mkdir($target_dir, 0777, true);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $azienda = $_POST["azienda"];
    $dataUltima = $_POST["dataUltima"];
    $dataProssima = new DateTime($dataUltima);
    $dataProssima->modify('+1 month');
    $dataProssimaFormatted = $dataProssima->format('Y-m-d'); // Formatta la data nel formato desiderato

    if(isset($_FILES["foto_mec"]) && $_FILES["foto_mec"]["error"] == 0 && isset($_FILES["foto_elect"]) && $_FILES["foto_elect"]["error"] == 0) {
        $foto_mec_nome = basename($_FILES["foto_mec"]["name"]);
        $foto_mec_path = $target_dir . $foto_mec_nome;
        if (move_uploaded_file($_FILES["foto_mec"]["tmp_name"], $foto_mec_path)) {
            $foto_elect_nome = basename($_FILES["foto_elect"]["name"]);
            $foto_elect_path = $target_dir . $foto_elect_nome;
            if (move_uploaded_file($_FILES["foto_elect"]["tmp_name"], $foto_elect_path)) {
                // Inserisci il nuovo macchinario nel database
                $query = "INSERT INTO MACCHINARIO (NOME, STATO, SCHEMA_ELECT, SCHEMA_MEC, PROSSIMA_MANUTENZIONE, ULTIMA_MANUTENZIONE, CHIAMATA_MANUTENTORE, AZIENDA_ID) VALUES ('$nome', 0, '$foto_elect_path', '$foto_mec_path', '$dataProssimaFormatted', '$dataUltima', 0, '$azienda')";
                
                // Esegui la query
                if(mysqli_query($connessione, $query)){
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
                    echo "<h1>Macchinario registrato con successo.</h1>";
                    echo "<br>";
                    echo "<a href='profile.php'class='button'>Torna alla home</a>";
                echo "</center>";
                } else{
                    echo "Errore durante l'inserimento del macchinario nel database: " . mysqli_error($connessione);
                }
            } else {
                echo "Errore durante il caricamento della foto dello schema elettrico.";
            }
        } else {
            echo "Errore durante il caricamento della foto dello schema meccanico.";
        }
    } else {
        // Se non sono state caricate entrambe le foto, gestisci l'errore
        echo "Errore: Assicurati di caricare entrambe le foto.";
    }
} else {
    // Se non è stato inviato un modulo, gestisci l'errore
    echo "Errore: Nessun modulo inviato.";
}
?>