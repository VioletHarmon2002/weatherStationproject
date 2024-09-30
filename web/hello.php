<?php

$host = 'localhost'; 
$db = 'time_registration';
$user = 'root';
$pass = '7YKyE8R2AhKzswfN';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM Devices";
$result = $conn->query($sql);

$devices = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $devices[] = $row;
    }
}
header('Content-Type: application/json');
echo json_encode($devices);

$conn->close();
?>

