<?php
include "connessione.php";
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="MANUTENTORE"){
        header("Location: login.php");
    }else{
        $nome=$_SESSION['nome'];
        $cognome=$_SESSION['cognome'];
        $id=$_SESSION['id'];
        $az=$_SESSION['azienda'];
        
    }
}

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
            <h1>Manutentore: <?php echo $nome." ".$cognome; echo "    <a href='modificaUtente.php?ID=".$id."'><button> modifica credenziali</button></a>" ?></h1> <br> 
            <h1>Manutenzioni:</h1>
            <table>
                <tr>
                    <th>Id Macchinario</th>
                    <th>Data ultima manutenzione</th>
                    <th>Data prossima manutenzione</th>
                    <th>Chiamata manutenzione</th>
                </tr>
                <?php
                    $query="select * from MACCHINARIO where AZIENDA_ID='$az'";
                    $result=$connessione->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['ID']."</td>";
                        echo "<td>".$row['ULTIMA_MANUTENZIONE']."</td>";
                        if($row['PROSSIMA_MANUTENZIONE'] <= date("Y-m-d")) {
                            echo "<td><a href='manutenzionePreventiva.php?ID=".$row['ID']."&IDMANUTENTORE=".$id."'><button>OGGI</button></a></td>";
                        } else {
                            echo "<td>".$row['PROSSIMA_MANUTENZIONE']."</td>";
                        }
                        if($row['CHIAMATA_MANUTENTORE'] == 1) {
                            echo "<td><a href='manutenzioneGuasto.php?ID=".$row['ID']."&IDMANUTENTORE=".$id."'><button>Chiamata Manutenzione</button></a></td>";
                        } else {
                            echo "<td>NO</td>";
                        }
                        echo "</tr>";
                    }
                ?>
            </table>
            <br>
            <h1>Elimina Manutenzione:</h1> 
            <h2>Manutenzione Preventiva:</h2>
            <table>
                <tr>
                    <th>Id Manutenzione</th>
                    <th>Data</th>
                    <th>Descrizione</th>
                    <th>Tempo Impiegato (min)</th>
                    <th>Id Manutentore</th>
                    <th>Id Macchinario</th>
                    <th>Elimina</th>
                    <th>Modifica</th>
                </tr>
                <?php
                    $query="select * from DOCUMENTO where TIPO_MANUTENZIONE='preventiva' AND MANUTENTORE_ID='$id'";
                    $result=$connessione->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['ID']."</td>";
                        echo "<td>".$row['DATA_SCRIVE']."</td>";
                        echo "<td>".str_replace("\r\n", "<br>",$row['DESCRIZIONE'])."</td>";
                        echo "<td>".$row['ORE_MANUTENZIONE']."</td>";
                        echo "<td>".$row['MANUTENTORE_ID']."</td>";
                        echo "<td>".$row['MACCHINARIO_ID']."</td>";
                        echo "<td>";
                        echo "<form method='POST' action='eliminaManutenzionecontroller.php'>";
                        echo "<input type='hidden' name='id_manutenzione' value='".$row['ID']."'>";
                        echo "<button type='submit'>Elimina</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form method='POST' action='modificaManutenzione.php'>";
                        echo "<input type='hidden' name='id_manutenzione' value='".$row['ID']."'>";
                        echo "<button type='submit'>Modifica</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <br>
            <h2>Manutenzione Guasto:</h2>
            <table>
                <tr>
                    <th>Id Manutenzione</th>
                    <th>Data</th>
                    <th>Descrizione</th>
                    <th>Tempo Impiegato (min)</th>
                    <th>Id Manutentore</th>
                    <th>Id Macchinario</th>
                    <th>Elimina</th>
                    <th>Modifica</th>
                </tr>
                <?php
                    $query="select * from DOCUMENTO where TIPO_MANUTENZIONE='Guasto' AND MANUTENTORE_ID='$id'";
                    $result=$connessione->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['ID']."</td>";
                        echo "<td>".$row['DATA_SCRIVE']."</td>";
                        echo "<td>".str_replace("\r\n", "<br>",$row['DESCRIZIONE'])."</td>";
                        echo "<td>".$row['ORE_MANUTENZIONE']."</td>";
                        echo "<td>".$row['MANUTENTORE_ID']."</td>";
                        echo "<td>".$row['MACCHINARIO_ID']."</td>";
                        echo "<td>";
                        echo "<form method='POST' action='eliminaManutenzionecontroller.php'>";
                        echo "<input type='hidden' name='id_manutenzione' value='".$row['ID']."'>";
                        echo "<button type='submit'>Elimina</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form method='POST' action='modificaManutenzione.php'>";
                        echo "<input type='hidden' name='id_manutenzione' value='".$row['ID']."'>";
                        echo "<button type='submit'>modifica</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
                ?>
            </table>
            <br>
        <a href="logout.php">Logout</a>
        </center>
    </body>
</html>