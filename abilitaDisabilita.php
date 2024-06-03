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
    <h1>Abilita/Disabilita Utente</h1> <br> 
            <table border="1">
            <tr>
                <th>Id Utente</th>
                <th>Nome</th>
                <th>Cognome</th>
                <th>Username</th>
                <th>Ruolo</th>
                <th>Abilita/Disabilita</th>
            </tr>
            <?php
                session_start(); 
                include "connessione.php";
                $admin_id = $_SESSION['id'];
                $azienda = isset($_POST['azienda']) ? $_POST['azienda'] : '';
                $query="select * from UTENTE WHERE ID != '$admin_id' AND AZIENDA_ID = '$azienda'";
                $result=$connessione->query($query);
                while($row=$result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['ID']."</td>";
                    echo "<td>".$row['NOME']."</td>";
                    echo "<td>".$row['COGNOME']."</td>";
                    echo "<td>".$row['USERNAME']."</td>";
                    echo "<td>".$row['RUOLO']."</td>";
                    echo "<td>";
                    echo "<form method='POST' action='abilitaDisabilitacontroller.php'>";
                    echo "<input type='hidden' name='id_utente' value='".$row['ID']."'>";
                    echo "<input type='hidden' name='azienda' value='".$azienda."'>";
                    if($row['ABILITY'] == 1){
                        echo "<button type='submit'>DISABILITA</button>";
                        echo "<input type='hidden' name='AB' value='0'>";
                    }else{
                        echo "<button type='submit'>ABILITA</button>";
                        echo "<input type='hidden' name='AB' value='1'>";
                    }
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