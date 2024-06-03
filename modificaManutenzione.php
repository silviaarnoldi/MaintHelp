<?php
session_start();
$id=$_POST['id_manutenzione'];
?>
<!DOCTYPE html>
<html lang="">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- Collegamento al tuo file CSS -->
        <link rel="stylesheet" href="CSS/stylehome.css">
        <img src="img/logo.png" width="250" height="100">
    </head>
<body>
    <center>
    <h1>Modifica Manutenzione</h1>
    <form action="modificaManutenzionecontroller.php?ID=<?php echo $id; ?>" method="post">
    <label for="data_stesura">Data stesura:</label><br>
    <input type="date" id="data" name="data"><br>
    <label for="ore">Ore di manutenzione:</label><br>
            <input type="number" id="ore" name="ore" min="0"><br>
            <label for="minuti">Minuti di manutenzione:</label><br>
            <input type="number" id="minuti" name="minuti" min="0" max="59"><br>
    <label for="descrizione">Descrizione:</label><br>
    <textarea id="descrizione" name="descrizione"><?php
                 include "connessione.php";
                 $id=$_POST['id_manutenzione'];
                 $query = "SELECT * FROM DOCUMENTO WHERE ID = $id";
                 $result_documento = mysqli_query($connessione, $query);
                $rows_documento = array();
                if (mysqli_num_rows($result_documento) > 0) {
                    while($row_documento = mysqli_fetch_assoc($result_documento)) {
                        echo "".$row_documento['DESCRIZIONE'];
                    }
                }
            ?></textarea><br> <br>
        <input type="submit" value="Modifica">
    </form>
    <a href="profile.php">Torna alla Home</a>
    </center>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}
?>
</body>
</html>