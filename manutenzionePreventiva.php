<!DOCTYPE html>
<html lang="">
<body>
    <center><h1>Manutenzione Preventiva</h1> </center>
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
                // output data of each row
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
        <input type="text" id="id_manutentore" name="id_manutentore"><br>
        <input type="submit" value="Inserisci">
    </form>
    <?php
        if(isset($_GET['error'])){
            echo $_GET['error'];
        }
    ?>
</body>
</html>