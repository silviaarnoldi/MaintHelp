<?php
$conn = new mysqli('localhost','root','','MaintHelp');
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
if(isset($_SERVER['PATH_INFO'])){
    $id=ltrim($_SERVER['PATH_INFO'],'/');
    $sql = "SELECT * FROM MACCHINARIO WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
}else{
    $sql = "SELECT * FROM MACCHINARIO";
    $stmt = $conn->prepare($sql);
}
$stmt->execute();
$result = $stmt->get_result();
if($result->num_rows > 0){
    $utenti = array();
    while($row = $result->fetch_assoc()){
        $utenti[] = $row;
    }
    $json=json_encode($utenti, JSON_PRETTY_PRINT);
    header('Content-Type: application/json');
    header('Access-Control-Allow-Origin: *');
    echo $json;
}else{
    echo "Nessun macchinario trovato";
}
$stmt->close();
$conn->close();

?>