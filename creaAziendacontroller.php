<?php
 include "connessione.php";
session_start();
$nome=$_POST['nome'];
$indirizzo=$_POST['indirizzo'];
$provincia=$_POST['provincia'];
$codice_postale=$_POST['codice_postale'];
$id=$_POST['id'];

    // Controllo se il nome utente esiste già
    $checkUsername = "SELECT * FROM AZIENDA WHERE NOME='$nome'";
    $result = $connessione->query($checkUsername);

    if ($result->num_rows > 0) {
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
            echo "<h1>questo Nome e' gia' in uso,prego inserisci un altro nome</h1>";
            echo "<br>";
            echo "<form action='creaAziendaocontroller.php' method='post'>";
            echo "<input type='text' name='nome' placeholder='nome'> <br> <br>";
            echo "<input type='hidden' name='indirizzo' value='".$indirizzo."' />";
            echo "<input type='hidden' name='provincia' value='".$provincia."' />";
            echo "<input type='hidden' name='codice_postale' value='".$codice_postale."' />";
            echo "<input type='hidden' name='id' value='".$id."' />";
            echo "<input type='submit' value='Registra'>";
            echo "</center>";

    } else {
        try{
            if($nome==""|| $indirizzo=="" || $provincia=="" || $codice_postale==""){
                echo "<head>";
                echo " <link rel='stylesheet' href='CSS/stylecontroller.css'>";
                echo "</head>";
                echo "<center>";
                echo "<h1>c'e' stato un problema durante la registrazione, riprova </h1>";
                echo "<form action='creaAziendaocontroller.php' method='post'>";
                echo "<input type='text' name='nome' placeholder='nome'> <br> <br>";
                echo "<input type='text' name='indirizzo' placeholder='indirizzo'> <br> <br>";    
                echo "<input type='text' name='provincia' placeholder='provincia'> <br> <br>";
                echo "<input type='text' name='codice_postale' placeholder='codice_postale'> <br> <br>";
                echo "<input type='hidden' name='id' value='".$id."' />";
                echo "<input type='submit' value='Registra'>";
                echo '</center>';
            }else{
                $registra="insert into AZIENDA (nome, indirizzo, provincia, codice_postale) values ('$nome', '$indirizzo', '$provincia', '$codice_postale')";
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
                echo "<h1>Registrazione effetuata</h1>";
                echo "<br>";
                echo "<a href='profile.php'>Torna alla home</a>";
                echo "</center>";
            }
            
        }catch(Exception $e){
            $err = $e->getMessage();
            header("Location: registra.php?err=$err");
        }
    }

?>