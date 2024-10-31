<?php
// Database configuration
$servername = "mariadb";       // As defined in Docker Compose
$username = "root";
$password = "7YKyE8R2AhKzswfN";
$dbname = "weatherstation";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from POST request
$temperature = $_POST['temperature'];
$humidity = $_POST['humidity'];

// Validate received data
if (isset($temperature) && isset($humidity)) {
    // Prepare SQL statement
    $stmt = $conn->prepare("INSERT INTO sensor_data (temperature, humidity, timestamp) VALUES (?, ?, NOW())");
    $stmt->bind_param("dd", $temperature, $humidity);

    if ($stmt->execute()) {
        echo "Data inserted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "Invalid data";
}

$conn->close();
?>
