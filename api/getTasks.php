<?php
/**
 * API Endpoint: Get Tasks
 */

require_once __DIR__ . '/../config/db.php';
require_once __DIR__ . '/../src/Controller/TaskController.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Headers: Content-Type");

if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
    exit(0);
}

$controller = new TaskController($conn);
$tasks = $controller->getTasks();

echo json_encode($tasks);
