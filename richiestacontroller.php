<?php
 include "connessione.php";
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
    if($data==""|| $id_macchinario==""){
        echo "<head>";
            echo " <link rel='stylesheet' href='CSS/stylecontroller.css'>";
            echo "</head>";
        echo '<center>';
        echo "<h1>c'e' stato un problema durante la registrazione della richiesta , riprova </h1>";
        echo '<form action="richiestacontroller.php?ID='.$operatore_id.'" method="post"> ';
        echo '<label for="data">Data:</label>';
        echo '<input type="date" name="data"> <br>  <br> ';
        echo '<label for="id_macchinario">ID Macchinario:</label> ';
        echo '<input type="text" name="id_macchinario" placeholder="ID Macchinario"> <br>  <br>';
        echo '<label for="tipo_guasto">Tipo Guasto:</label>';
        echo '<select name="tipo_guasto">';
        echo '<option value="Elettrico">Elettrico</option>';
        echo ' <option value="Meccanico">Meccanico</option>';
        echo ' <option value="ElettricoInformatico">Elettrico Informatico</option>';
        echo '<option value="Altro">Altro</option>';
        echo '</select> <br>  <br>';
        echo '<label for="stato_macchinario">Stato Macchinario:</label>';
        echo '<select name="stato_macchinario">';
        echo ' <option value="ON">ON</option>';
        echo ' <option value="OFF">OFF</option>';
        echo '</select> <br> <br> ';
        echo '<input type="submit" value="Invia Richiesta"> ';
        echo ' </form>';
        echo '</center>';
    }else{
        $sql = "SELECT ID FROM GUASTO WHERE TIPOGUASTO='$tipo_guasto'";
        $result = $connessione->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $guasto_id = $row['ID'];
            $sql = "INSERT INTO DOCUMENTO (NOME, TIPODOCUMENTO, TIPOGUASTO, DATA_INVIA, OPERATORE_ID, MACCHINARIO_ID, GUASTO_ID) VALUES ('Documento', 'Richiesta', '$tipo_guasto', '$data', '$operatore_id', '$id_macchinario', '$guasto_id')";
            if ($connessione->query($sql) === TRUE) {
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
                echo "<h1>Richiesta inviata con successo</h1>";
                echo "<br>";
                echo "<a href='profile.php'class='button'>Torna alla home</a>";
                echo "</center>";
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
    }
    $connessione->close();
?>