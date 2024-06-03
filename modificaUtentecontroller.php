<?php
include "connessione.php";
$id = $_GET['ID'];
$username = $_POST['username'];
$password = $_POST['password'];
$password = md5($password); // Note: MD5 is not a secure way to hash passwords. Consider using stronger hashing algorithms like bcrypt.

// Check if the username exists
$checkUsername = "SELECT * FROM UTENTE WHERE username='$username'";
$result = $connessione->query($checkUsername);

if ($result->num_rows > 0) {
    echo "<script>alert('Username già esistente, cambialo');</script>";
    header("Location: modificaUtente.php");
} else {
    // Prepare the update query dynamically
    $query_parts = array();
    if (!empty($username)) {
        $query_parts[] = "USERNAME='$username'";
    }
    if (!empty($password)) {
        $query_parts[] = "PASSWORD='$password'";
    }
    
    if (!empty($query_parts)) {
        $update_query = "UPDATE UTENTE SET " . implode(", ", $query_parts) . " WHERE ID= '$id'";
        
        try {
            $connessione->query($update_query);
            echo "<head>";
                echo " <link rel='stylesheet' href='CSS/stylecontroller.css'>";
                echo "</head>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<br>";
                echo "<center>";
            echo "<h1>Modifiche effettuate</h1>";
            echo "<br>";
            echo "<a href='profile.php'>Torna alla home</a>";
            echo "</center>";
        } catch (Exception $e) {
            $err = $e->getMessage();
            echo $err;
        }
    } else {
        echo "Nessun dato da aggiornare";
    }
}
?>