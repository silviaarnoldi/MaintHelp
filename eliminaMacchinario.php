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
    <h1>Elimina Macchinario</h1> <br> 
            <table border="1">
            <tr>
                <th>Id Macchinario</th>
                <th>Nome</th>
                <th>Stato</th>
                <th>Prossima manutenzione</th>
                <th>Ultima manutenzione</th>
                <th>Azienda id</th>
                <th>Elimina</th>
                <th>Modifica</th>
            </tr>
            <?php
                session_start(); 
                include "connessione.php";
                $admin_id = $_SESSION['id'];
                $azienda = isset($_POST['azienda']) ? $_POST['azienda'] : '';
                $query="select * from MACCHINARIO WHERE AZIENDA_ID = '$azienda' ";
                $result=$connessione->query($query);
                while($row=$result->fetch_assoc()){
                    echo "<tr>";
                    echo "<td>".$row['ID']."</td>";
                    echo "<td>".$row['NOME']."</td>";
                    echo "<td>".$row['STATO']."</td>";
                    echo "<td>".$row['PROSSIMA_MANUTENZIONE']."</td>";
                    echo "<td>".$row['ULTIMA_MANUTENZIONE']."</td>";
                    echo "<td>".$row['AZIENDA_ID']."</td>";
                    echo "<td>";
                    echo "<form method='POST' action='eliminaMacchinariocontroller.php'>";
                    echo "<input type='hidden' name='id_macchianrio' value='".$row['ID']."'>";
                    echo "<button type='submit'>Elimina</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "<td>";
                    echo "<form method='POST' action='modificaMacchinario.php'>";
                    echo "<input type='hidden' name='id_macchinario' value='".$row['ID']."'>";
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