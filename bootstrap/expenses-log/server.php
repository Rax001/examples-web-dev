<?php

// Get the request method
$method = $_SERVER['REQUEST_METHOD'];

// Read input for PUT/DELETE
$input = json_decode(file_get_contents("php://input"),true);

switch ($method) {
    case 'GET':
        $name = $_GET['name'] ?? 'Guest';
        echo "GET request received. Hello, $name!";
        break;
    
    case 'POST':
        $name = $_POST['name'] ?? 'No name';
        echo "POST request received. Name: $name";
        break;

    case 'PUT':
        $name = $input['name'] ?? 'No name';
        echo "PUT request received. Updating name to: $name";
        break;

    case 'DELETE':
        $id = $input['id'] ?? 'No name';
        echo "DELETE request received. Deleting item with ID: $id";
        break;

    default:
    http_response_code(405); // Method not allowed
    echo "Method $method not supported.";
    break;
}