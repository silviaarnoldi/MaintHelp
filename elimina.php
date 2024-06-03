<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Collegamento al tuo file CSS -->
    <link rel="stylesheet" href="CSS/stylehome.css">
    <img src="img/logo.png" width="250" height="100">
</head>
<body>
    <center>
    <h1>Elimina Utente</h1> <br> 
    <table border="1">
        <tr>
            <th>Id Utente</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Username</th>
            <th>Ruolo</th>
            <th>Elimina</th>
            <th>Modifica</th>
        </tr>
        <?php
            session_start(); 
            include "connessione.php";
            $admin_id = $_SESSION['id'];
            $azienda = isset($_POST['azienda']) ? $_POST['azienda'] : '';
            $query="SELECT * FROM UTENTE WHERE ID != '$admin_id' AND AZIENDA_ID = '$azienda' AND RUOLO != 'AMMINISTRATORE' ";
            $result = $connessione->query($query);
            while($row = $result->fetch_assoc()){
                echo "<tr>";
                echo "<td>".$row['ID']."</td>";
                echo "<td>".$row['NOME']."</td>";
                echo "<td>".$row['COGNOME']."</td>";
                echo "<td>".$row['USERNAME']."</td>";
                echo "<td>".$row['RUOLO']."</td>";
                echo "<td>";
                echo "<form method='POST' action='eliminacontroller.php'>";
                echo "<input type='hidden' name='id_utente' value='".$row['ID']."'>";
                echo "<input type='hidden' name='azienda' value='".$azienda."'>";
                echo "<button type='submit'>Elimina</button>";
                echo "</form>";
                echo "</td>";
                echo "<td>";
                echo "<form method='POST' action='modifica.php'>";
                echo "<input type='hidden' name='id_utente' value='".$row['ID']."'>";
                echo "<input type='hidden' name='azienda' value='".$azienda."'>";
                echo "<button type='submit'>Modifica</button>";
                echo "</form>";
                echo "</td>";
                echo "</tr>";
            }
        ?>
    </table>
    <br>
    <a href="profile.php">Torna alla home</a>
    </center>
    <?php
    if(isset($_GET['error'])){
        echo $_GET['error'];
    }
    ?>
</body>
</html>