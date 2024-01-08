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
        
    }
}

?>
<!DOCTYPE html>
<html lang="">
    <body>
        <center>
            <h1>Manutentore: <?php echo $nome; ?></h1> <br> 
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
                                echo "<td><a href='manutenzionePreventiva.php'><button>OGGI</button></a></td>";
                            } else {
                                echo "<td>".$row['PROSSIMA_MANUTENZIONE']."</td>";
                            }
                            if($row['CHIAMATA_MANUTENTORE'] == 1) {
                                echo "<td><a href='manutenzioneGuasto.php'><button>Chiamata Manutenzione</button></a></td>";
                            } else {
                                echo "<td>NO</td>";
                            }
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