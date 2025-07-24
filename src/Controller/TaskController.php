<?php
/**
 * Task Controller Class
 */

require_once __DIR__ . '/../../config/db.php';
require_once __DIR__ . '/../model/Task.php';

class TaskController {
    private $model;

    public function __construct($conn) {
        $this->model = new Task($conn);
    }

    public function add($title, $description) {
        return $this->model->addTask($title, $description);
    }

    public function getTasks() {
        return $this->model->getLatestTasks();
    }

    public function markDone($id) {
        return $this->model->markAsDone($id);
    }
}
