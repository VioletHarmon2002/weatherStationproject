<?php

// Description: This script handles requests to interact with the database. It processes GET, POST, and DELETE requests for sensor data, including fetching existing data, adding new data, and deleting specific records.
// Author: Liza
// Date: 01.11.2024
header("Content-Type: application/json; charset=UTF-8");

// Database connection parameters
$servername = "mariadb"; 
$username = "root"; 
$password = "7YKyE8R2AhKzswfN"; 
$dbname = "Weatherstation"; 

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    respondWithJson(["error" => "Database connection failed: " . $conn->connect_error], 500);
    exit;
}


$method = $_SERVER['REQUEST_METHOD'];
switch ($method) {
    case 'GET':
        handleGetRequest($conn);
        break;
    case 'POST':
        handlePostRequest($conn);
        break;
    case 'DELETE':
        handleDeleteRequest($conn);
        break;
    default:
        respondWithJson(["error" => "Unsupported request method."], 405);
        exit;
}


$conn->close();


function handleGetRequest($conn) {
    $id = $_GET['id'] ?? null;

    
    if ($id) {
        $stmt = $conn->prepare("SELECT * FROM EnvironmentData WHERE id = ?");
        $stmt->bind_param("i", $id);
    } else {
        $stmt = $conn->prepare("SELECT * FROM EnvironmentData ORDER BY timestamp DESC");
    }

    
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $data = $result->fetch_all(MYSQLI_ASSOC);
        respondWithJson(["data" => $data]);
    } else {
        respondWithJson(["error" => "Failed to fetch data."], 500);
    }
    $stmt->close();
}


function handlePostRequest($conn) {
    $input = json_decode(file_get_contents('php://input'), true);

    // Check for JSON errors
    if (json_last_error() !== JSON_ERROR_NONE) {
        respondWithJson(["error" => "Invalid JSON format: " . json_last_error_msg()], 400);
        exit;
    }

    
    if (!isset($input['temperature'], $input['humidity'], $input['light_level'])) {
        respondWithJson(["error" => "Invalid input data."], 400);
        return;
    }

    
    $stmt = $conn->prepare("INSERT INTO EnvironmentData (temperature, humidity, light_level) VALUES (?, ?, ?)");
    $stmt->bind_param("ddi", $input['temperature'], $input['humidity'], $input['light_level']);

    if ($stmt->execute()) {
        respondWithJson(["success" => "Data inserted successfully.", "id" => $stmt->insert_id]);
    } else {
        respondWithJson(["error" => "Failed to insert data."], 500);
    }
    $stmt->close();
}


function handleDeleteRequest($conn) {
    $id = $_GET['id'] ?? null;

    
    if (!$id) {
        respondWithJson(["error" => "ID is required for deletion."], 400);
        return;
    }

    
    $stmt = $conn->prepare("DELETE FROM EnvironmentData WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        respondWithJson(["success" => "Data deleted successfully."]);
    } else {
        respondWithJson(["error" => "Failed to delete data."], 500);
    }
    $stmt->close();
}

// Function to respond with JSON
function respondWithJson($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data);
    exit;
}
?>
