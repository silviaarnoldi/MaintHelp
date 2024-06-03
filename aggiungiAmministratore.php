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
    <h1>Registra Utente</h1>
    <form action="aggiungiAmministratorecontroller.php" method="post">
        <input type="text" name="nome" placeholder="nome"> <br> <br>
        <input type="text" name="cognome" placeholder="cognome"> <br> <br>
        <label for="azienda">Azienda:</label>
        <select for="azienda" name="azienda">
            <?php
                 include "connessione.php";
                 $query = "SELECT * FROM AZIENDA ";
                 $result_documento = mysqli_query($connessione, $query);
                $rows_documento = array();
                if (mysqli_num_rows($result_documento) > 0) {
                    while($row_documento = mysqli_fetch_assoc($result_documento)) {
                        echo "<option value='".$row_documento['ID']."'>".$row_documento['NOME']."</option> ";
                    }
                }
            ?>
        </select> <br>  <br>
        <input type='hidden' name='ruolo' value='DIRIGENTE' />
        <input type="text" name="username" placeholder="username"> <br> <br>
        <input type="text" name="password" placeholder="password">  <br> <br>
        <input type="submit" value="Registra">
    </form>
    <br>
    <a href="profile.php">Torna alla Home</a>
    </center>
    <?php
if(isset($_GET['error'])){
    echo $_GET['error'];
}

?>
</body>
</html>