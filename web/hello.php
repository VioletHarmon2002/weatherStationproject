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

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO EnvironmentData (sensor_id, temperature, humidity, light_level) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ifii", $sensor_id, $temperature, $humidity, $light_level);

// Set sensor ID and get data from POST request
$sensor_id = 1; // Assuming you have only one sensor for now

// Check if POST values are set and assign them, or assign default values
$temperature = isset($_POST['temperature']) ? (float)$_POST['temperature'] : 0.0; // Default to 0.0 if not set
$humidity = isset($_POST['humidity']) ? (int)$_POST['humidity'] : 0; // Default to 0 if not set
$light_level = isset($_POST['light_level']) ? (int)$_POST['light_level'] : 0; // Default to 0 if not set

// Execute the statement
if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close the connection
$stmt->close();
$conn->close();
?>
