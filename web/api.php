<?php
// Set content type to JSON for all responses
header("Content-Type: application/json; charset=UTF-8");

// Database connection details
$servername = "mariadb"; // Docker service name or localhost
$username = "root";
$password = "7YKyE8R2AhKzswfN";
$dbname = "weatherstation";

// Establish database connection using mysqli
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    respondWithJson(["error" => "Database connection failed."], 500);
    exit;
}

// Route the request based on the HTTP method
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
}

// Close the database connection
$conn->close();

// Function to handle GET requests for reading data
function handleGetRequest($conn) {
    $id = $_GET['id'] ?? null;

    // Fetch specific data or all data if id is not provided
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

// Function to handle POST requests for inserting new data
function handlePostRequest($conn) {
    // Read input JSON
    $input = json_decode(file_get_contents('php://input'), true);

    // Validate data
    if (!isset($input['temperature'], $input['humidity'], $input['light_level'])) {
        respondWithJson(["error" => "Invalid input data."], 400);
        return;
    }

    // Insert data
    $stmt = $conn->prepare("INSERT INTO EnvironmentData (temperature, humidity, light_level) VALUES (?, ?, ?)");
    $stmt->bind_param("ddi", $input['temperature'], $input['humidity'], $input['light_level']);

    if ($stmt->execute()) {
        respondWithJson(["success" => "Data inserted successfully.", "id" => $stmt->insert_id]);
    } else {
        respondWithJson(["error" => "Failed to insert data."], 500);
    }
    $stmt->close();
}

// Function to handle DELETE requests for deleting data
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

// Helper function to send JSON response with HTTP status code
function respondWithJson($data, $statusCode = 200) {
    http_response_code($statusCode);
    echo json_encode($data);
}
?>
