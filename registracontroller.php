<?php
 include "connessione.php";
session_start();
$nome=$_POST['nome'];
$cognome=$_POST['cognome'];
$ruolo = strtoupper($_POST['ruolo']);
$username=$_POST['username'];
$password=$_POST['password'];
$azienda=$_POST['azienda'];

    // Controllo se il nome utente esiste già
    $checkUsername = "SELECT * FROM UTENTE WHERE username='$username'";
    $result = $connessione->query($checkUsername);

    if ($result->num_rows > 0) {
        echo "<head>";
            echo " <link rel='stylesheet' href='CSS/stylecontroller.css'>";
            echo "</head>";
            echo "<head>";
                echo " <link rel='stylesheet' href='CSS/stylecontroller.css'>";
                echo "</head>";
                echo "<center>";
            echo "<h1>questo Username e' gia' in uso,prego inserisci un altro username</h1>";
            echo "<br>";
            echo "<form action='registracontroller.php' method='post'>";
            echo "<input type='text' name='username' placeholder='username'> <br> <br>";
            echo "<input type='hidden' name='azienda' value='".$azienda."' />";
            echo "<input type='hidden' name='ruolo' value='".$ruolo."' />";
            echo "<input type='hidden' name='nome' value='".$nome."' />";
            echo "<input type='hidden' name='cognome' value='".$cognome."' />";
            echo "<input type='hidden' name='password' value='".$password."' />";
            echo "<input type='submit' value='Registra'>";
            echo "</center>";

    } else {
        $password=MD5($password);
        try{
            if($nome==""|| $cognome=="" || $username=="" || $password==""){
                echo "<head>";
            echo " <link rel='stylesheet' href='CSS/stylecontroller.css'>";
            echo "</head>";
                echo '<center>';
                echo "<h1>c'e' stato un problema durante la registrazione, riprova </h1>";
                echo "<form action='registracontroller.php' method='post'>";
                echo "<input type='text' name='nome' placeholder='nome'> <br> <br>";
                echo "<input type='text' name='cognome' placeholder='cognome'> <br> <br>";
                echo "<input type='hidden' name='azienda' value='".$azienda."' />";
                echo '<select  name="ruolo">';
                echo '<option value="Amministratore">Amministratore</option> ';
                echo '<option value="Operatore">Operatore</option>';
                echo  '<option value="Manutentore">Manutentore</option>';
                echo '</select> <br> <br>';     
                echo "<input type='text' name='username' placeholder='username'> <br> <br>";
                echo "<input type='text' name='password' placeholder='password'> <br> <br>";
                echo "<input type='submit' value='Registra'>";
                echo '</center>';
            }else{
                $registra="insert into UTENTE (nome, cognome, ruolo, username, password,ability, azienda_id) values ('$nome', '$cognome', '$ruolo', '$username', '$password',1,'$azienda')";
                //echo "QUERY [".$registra."]<br/>";
                $connessione->query($registra);
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
                echo "Registrazione effetuata";
                echo "<br>";
                echo "<a href='profile.php'class='button'>Torna alla home</a>";
                echo "</center>";
            }
            
        }catch(Exception $e){
            $err = $e->getMessage();
            header("Location: registra.php?err=$err");
        }
    }

?>