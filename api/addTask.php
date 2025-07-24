<?php
/**
 * API Endpoint: Add Task
 */

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/Controller/TaskController.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

$data = json_decode(file_get_contents("php://input"));

if ($data === null && json_last_error() !== JSON_ERROR_NONE) {
    echo json_encode([
        "success" => false,
        "message" => "Invalid JSON format in request body."
    ]);
    exit();
}

if (!empty($data->title) && !empty($data->description)) {
    $controller = new TaskController($conn);
    $result = $controller->add($data->title, $data->description);

    echo json_encode([
        "success" => $result,
        "message" => $result ? "Task added successfully." : "Failed to add task."
    ]);
} else {
    echo json_encode([
        "success" => false,
        "message" => "Missing title or description."
    ]);
}
