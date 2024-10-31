<?php
// Database configuration
$servername = "mariadb"; // As defined in Docker Compose
$username = "root";
$password = "7YKyE8R2AhKzswfN";
$dbname = "weatherstation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from EnvironmentData table
$sql = "SELECT sensor_id, temperature, humidity, light_level, timestamp FROM EnvironmentData";
$result = $conn->query($sql);

$data = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $data[] = $row; // Add each row to the data array
    }
}

// Return data as JSON
header('Content-Type: application/json');
echo json_encode($data);

// Close the connection
$conn->close();
?>
