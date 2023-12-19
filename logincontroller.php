<?php
session_start();

$username=$_POST['username'];
$password=$_POST['password'];

$password=MD5($password);

$connesione= new mysqli('localhost','root','','MaintHelp');
if($connesione->connect_error){
    echo("Connection failed: " . $connesione->connect_error);
    exit();
}else{
    try{
        $verifica="select * from UTENTE where USERNAME='$username' and PASSWORD='$password';";
        $result=$connesione->query($verifica);
       // echo("risultat".$result->num_rows);
        if($result->num_rows>0){
           // echo("risultat".$result->num_rows);
            while($user=$result->fetch_array(MYSQLI_ASSOC)){
               // $user=$result->fetch_row();
               // echo("id:".$user['ID']);
                $id=$user['ID'];
                $nome=$user['USERNAME'];
                $_SESSION['id']=$id;
                $_SESSION['nome']=$nome;
            }
        }
        $result->close();
        header("Location: profile.php");
        //echo(" id: ".$_SESSION['id']."".$id);
        
    }catch(Exception $e){
        $err = $e->getMessage();
        header("Location: registra.php?err=$err");
    }

}
?>