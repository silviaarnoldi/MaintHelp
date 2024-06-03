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
    <label for="data_prossima">Data della prossima manutenzione:</label><br>
    <input type="date" id="data_prossima" name="data_prossima"><br><br>  
    <label for="data_stesura">Data stesura:</label><br>
    <input type="date" id="data" name="data"><br><br>  
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
            ?></textarea><br>
    <input type="text" name="cognome" placeholder="nuovo cognome">  <br> <br>
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