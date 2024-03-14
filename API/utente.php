<?php
$conn = new mysqli('localhost','root','','MaintHelp');
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
$sql = "SELECT * FROM UTENTE";
$result = $conn->query($sql);
$array = array();
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $array[] = $row;
    }   
}

// Print the JSON data
echo json_encode($array);
?>