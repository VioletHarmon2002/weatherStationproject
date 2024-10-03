<?php

$host = 'mariadb';        
$port = '3306';           
$dbname = 'time_registration'; 
$username = 'root';       
$password = '7YKyE8R2AhKzswfN'; 


$conn = new mysqli($host, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    echo "Connected successfully!";
}


$conn->close();
?>
