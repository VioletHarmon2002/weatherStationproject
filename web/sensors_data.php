<?php
header("Content-Type: application/json");

$servername = "mariadb";       // As defined in Docker Compose
$username = "root";
$password = "7YKyE8R2AhKzswfN";
$dbname = "weatherstation";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die(json_encode(["error" => "Connection failed: " . $conn->connect_error]));
}

$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'POST') {
    // Capture POST data from Arduino (JSON format)
    $input = json_decode(file_get_contents("php://input"), true);
    
    // Extract data from JSON
    $sensor_name = $input['sensor_name'];
    $temperature = $input['temperature'];
    $humidity = $input['humidity'];
    $light_level = $input['light_level'];
    $red_led = isset($input['red_led']) ? (bool)$input['red_led'] : null;
    $blue_led = isset($input['blue_led']) ? (bool)$input['blue_led'] : null;
    $button_state = isset($input['button_state']) ? (bool)$input['button_state'] : null;
    $formatted_time = $input['formatted_time'] ?? null;

    // Fetch sensor ID based on sensor name
    $stmt = $conn->prepare("SELECT sensor_id FROM Sensors WHERE sensor_name = ?");
    $stmt->bind_param("s", $sensor_name);
    $stmt->execute();
    $stmt->bind_result($sensor_id);
    $stmt->fetch();
    $stmt->close();

    // Insert new sensor if it doesn't exist
    if (!$sensor_id) {
        $stmt = $conn->prepare("INSERT INTO Sensors (sensor_name, sensor_type) VALUES (?, ?)");
        $sensor_type = "environment"; // Define a default type or dynamically handle types
        $stmt->bind_param("ss", $sensor_name, $sensor_type);
        $stmt->execute();
        $sensor_id = $stmt->insert_id;
        $stmt->close();
    }

    // Insert environment data
    if (is_numeric($temperature) && is_numeric($humidity) && is_numeric($light_level)) {
        $stmt = $conn->prepare("INSERT INTO EnvironmentData (sensor_id, temperature, humidity, light_level) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("iddd", $sensor_id, $temperature, $humidity, $light_level);
        $stmt->execute();
        $stmt->close();
    }

    // Insert device state if LED and button states are provided
    if (!is_null($red_led) && !is_null($blue_led) && !is_null($button_state)) {
        $stmt = $conn->prepare("INSERT INTO DeviceState (red_led, blue_led, button_state) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $red_led, $blue_led, $button_state);
        $stmt->execute();
        $stmt->close();
    }

    // Insert time log if provided
    if ($formatted_time) {
        $stmt = $conn->prepare("INSERT INTO TimeLogs (formatted_time) VALUES (?)");
        $stmt->bind_param("s", $formatted_time);
        $stmt->execute();
        $stmt->close();
    }

    echo json_encode(["success" => "Data inserted successfully."]);
    
} elseif ($method === 'GET') {
    // Retrieve the latest data entries for environment and device state
    $data = [];

    // Get latest environment data
    $sql = "SELECT * FROM EnvironmentData ORDER BY timestamp DESC LIMIT 1";
    $result = $conn->query($sql);
    $data['environment'] = $result->num_rows > 0 ? $result->fetch_assoc() : ["error" => "No environment data found."];
    
    // Get latest device state
    $sql = "SELECT * FROM DeviceState ORDER BY timestamp DESC LIMIT 1";
    $result = $conn->query($sql);
    $data['device_state'] = $result->num_rows > 0 ? $result->fetch_assoc() : ["error" => "No device state data found."];

    // Get latest time log
    $sql = "SELECT * FROM TimeLogs ORDER BY timestamp DESC LIMIT 1";
    $result = $conn->query($sql);
    $data['time_log'] = $result->num_rows > 0 ? $result->fetch_assoc() : ["error" => "No time log found."];

    echo json_encode($data);
}

$conn->close();
?>
