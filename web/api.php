<?php
header('Content-Type: application/json'); // Set the content type to JSON
$response = array("success" => true); // Create an associative array
echo json_encode($response); // Encode the array as JSON and output it
?>
