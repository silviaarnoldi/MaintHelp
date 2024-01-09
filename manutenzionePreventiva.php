<!DOCTYPE html>
<html lang="">
<body>
    <center><h1>Manutenzione Preventiva</h1> </center>
    <table>
        <td>
            <form action="manutenzionePreventivacontroller.php" method="post">
            <label for="data">Data:</label><br>
            <input type="date" id="data" name="data"><br>
            <label for="macchinario">Macchinario:</label><br>
            <select id="macchinario" name="macchinario">
            <?php
                $conn = new mysqli('localhost', 'root', '', 'MaintHelp');
                if ($conn->connect_error) {
                    die("Connessione fallita: " . $conn->connect_error);
                }
                $sql = "SELECT ID FROM MACCHINARIO";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row['ID'] . "'>" . $row['ID'] . "</option>";
                    }
                } else {
                    echo "0 results";
                }
                $conn->close();
            ?>
            </select><br>
            <label for="descrizione">Descrizione:</label><br>
            <textarea id="descrizione" name="descrizione"></textarea><br>
            <label for="ore">Ore di manutenzione:</label><br>
            <input type="number" id="ore" name="ore" min="0"><br>
            <label for="minuti">Minuti di manutenzione:</label><br>
            <input type="number" id="minuti" name="minuti" min="0" max="59"><br>
            <label for="data_prossima">Data della prossima manutenzione:</label><br>
            <input type="date" id="data_prossima" name="data_prossima"><br>
            <label for="id_manutentore">ID Manutentore:</label><br>
            <input type="text" id="id_manutentore" name="id_manutentore">
            <br><br>
            <input type="submit" value="Inserisci">
        </form>
        </td>
        <td>
            <div class="description">
						SCHEMA MECCANICO
			</div> <br>
            <img src="img/schemaM.png" alt="SCHEMA MECCANICO" style="width:330px;height:530px;">
            <br><br><br><br>
            <div class="description">
						SCHEMA ELETTRICO
			</div> <br>
            <img src="img/schemaE.png" alt="SCHEMA ELETTRICO" style="width:330px;height:530px;">
            
        </td>

    </table>
    <?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?>
</body>
</html>