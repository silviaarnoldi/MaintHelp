<?php
$connesione= new mysqli('localhost','root','','MaintHelp'); 
if($connesione->connect_error){
    echo("Connection failed: " . $connesione->connect_error);
    exit();
}
$id_macchinario = isset($_GET['ID']) ? mysqli_real_escape_string($connesione, $_GET['ID']) : null;
$query = "SELECT * FROM MACCHINARIO WHERE ID = $id_macchinario";
$result = mysqli_query($connesione, $query);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
} else {
    echo "Nessun risultato trovato";
}

// Chiusura connessione
mysqli_close($connesione);
?>
<!DOCTYPE html>
<html lang="">
<style>
        div.description {
            font-size: 22px;
        }
      table {
            margin-left: auto;
            margin-right: auto;
        }
        form {
            font-size: 22px; 
        }

        
    </style>
<body>
    <center><h1>Manutenzione Preventiva</h1> </center>
    </center>
    <table>
        <center>
        <tr>
        <td>
            <form action="manutenzionePreventivacontroller.php" method="post">
            <label for="data">Data:</label><br>
            <input type="date" id="data" name="data"><br>
            <label for="descrizione">Descrizione:</label><br>
            <textarea id="descrizione" name="descrizione"></textarea><br>
            <label for="ore">Ore di manutenzione:</label><br>
            <input type="number" id="ore" name="ore" min="0"><br>
            <label for="minuti">Minuti di manutenzione:</label><br>
            <input type="number" id="minuti" name="minuti" min="0" max="59"><br>
            <label for="data_prossima">Data della prossima manutenzione:</label><br>
            <input type="date" id="data_prossima" name="data_prossima"><br>
            <label for="id_manutentore">ID Manutentore:</label><br>
            <input type="text" id="id_manutentore" name="id_manutentore"><br> <br>
            <input type="submit" value="Inserisci">
            <br><br>
        </form>
        </td>
        <td>
            <div class="description">
						SCHEMA MECCANICO
			</div> <br>
            <img src="<?php echo $row['SCHEMA_MEC']; ?>" alt="SCHEMA MECCANICO" style="width:580px;height:340px;">
            
        </td>
    </tr>
    </center>
    <tr>
        <td></td>
        <td>
        <div class="description">
						SCHEMA ELETTRICO
			</div> <br>
            <img src="<?php echo $row['SCHEMA_ELECT']; ?>" alt="SCHEMA ELETTRICO" style="width:580px;height:340px;">
        </td>
    </tr>
    </table> </center>
    <?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?>
</body>
</html>