<?php
session_start();
//echo($_SESSION['id']);
if(!isset($_SESSION['ruolo'])){
    header("Location: login.php");
}else{
    if($_SESSION['ruolo']!="MANUTENTORE"){
        header("Location: login.php");
    }else{
        $nome=$_SESSION['nome'];
        $id=$_SESSION['id'];
        
    }
}

?>
<!DOCTYPE html>
<html lang="">
    <body>
        <center>
            <h1>Manutentore: <?php echo $nome; ?></h1>
            <h1>Manutenzioni:</h1>
            <table border="1">
                <tr>
                    <th>Id Macchinario</th>
                    <th>Data ultima manutenzione</th>
                    <th>Data prossima manutenzione</th>
                    <th>Chiamata manutenzione</th>
                </tr>
                <?php
                    $connesione= new mysqli('localhost','root','','MaintHelp'); 
                    if($connesione->connect_error){
                        echo("Connection failed: " . $connesione->connect_error);
                        exit();
                    }else{
                        $query="select * from MACCHINARIO";
                        $result=$connesione->query($query);
                        while($row=$result->fetch_assoc()){
                            echo "<tr>";
                            echo "<td>".$row['ID']."</td>";
                            echo "<td>".$row['ULTIMA_MANUTENZIONE']."</td>";
                            if($row['PROSSIMA_MANUTENZIONE'] <= date("Y-m-d")) {
                                echo "<td><a href='manutenzionePreventiva.php?ID=".$row['ID']."'><button>OGGI</button></a></td>";
                            } else {
                                echo "<td>".$row['PROSSIMA_MANUTENZIONE']."</td>";
                            }
                            if($row['CHIAMATA_MANUTENTORE'] == 1) {
                                echo "<td><a href='manutenzioneGuasto.php?ID=".$row['ID']."'><button>Chiamata Manutenzione</button></a></td>";
                            } else {
                                echo "<td>NO</td>";
                            }
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
            <br>
            <h1>Elimina Manutenzione:</h1> 
            <h2>Manutenzione Preventiva:</h2>
            <table border="1">
                <tr>
                    <th>Id Manutenzione</th>
                    <th>Data</th>
                    <th>Descrizione</th>
                    <th>Tempo Impiegato (min)</th>
                    <th>Id Manutentore</th>
                    <th>Id Macchinario</th>
                    <th>Elimina</th>
                </tr>
                <?php
                    $connesione= new mysqli('localhost','root','','MaintHelp'); 
                    if($connesione->connect_error){
                        echo("Connection failed: " . $connesione->connect_error);
                        exit();
                    }else{
                        $query="select * from DOCUMENTO where TIPO_MANUTENZIONE='preventiva'";
                        $result=$connesione->query($query);
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
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
            <br>
            <h2>Manutenzione Guasto:</h2>
            <table border="1">
                <tr>
                    <th>Id Manutenzione</th>
                    <th>Data</th>
                    <th>Descrizione</th>
                    <th>Tempo Impiegato (min)</th>
                    <th>Id Manutentore</th>
                    <th>Id Macchinario</th>
                    <th>Elimina</th>
                </tr>
                <?php
                    $connesione= new mysqli('localhost','root','','MaintHelp'); 
                    if($connesione->connect_error){
                        echo("Connection failed: " . $connesione->connect_error);
                        exit();
                    }else{
                        $query="select * from DOCUMENTO where TIPO_MANUTENZIONE='Guasto'";
                        $result=$connesione->query($query);
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
                            echo "</tr>";
                        }
                    }
                ?>
            </table>
            <br>
        <a href="logout.php">Logout</a>
        </center>
    </body>
</html>