<!DOCTYPE html>
<html lang="">
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
                $connesione= new mysqli('localhost','root','','MaintHelp'); 
                if($connesione->connect_error){
                    echo("Connection failed: " . $connesione->connect_error);
                    exit();
                }else{
                    $admin_id = $_SESSION['id'];
                    $query="select * from UTENTE WHERE ID != '$admin_id'";
                    $result=$connesione->query($query);
                    while($row=$result->fetch_assoc()){
                        echo "<tr>";
                        echo "<td>".$row['ID']."</td>";
                        echo "<td>".$row['NOME']."</td>";
                        echo "<td>".$row['COGNOME']."</td>";
                        echo "<td>".$row['USERNAME']."</td>";
                        echo "<td>".$row['RUOLO']."</td>";
                        echo "<td>";
                        echo "<form method='POST' action='eliminacontroller.php'>";
                        echo "<input type='hidden' name='id_utente' value='".$row['ID']."'>";
                        echo "<button type='submit'>Elimina</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "<td>";
                        echo "<form method='POST' action='modifica.php'>";
                        echo "<input type='hidden' name='id_utente' value='".$row['ID']."'>";
                        echo "<button type='submit'>Modifica</button>";
                        echo "</form>";
                        echo "</td>";
                        echo "</tr>";
                    }
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