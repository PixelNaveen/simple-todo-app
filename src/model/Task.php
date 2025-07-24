<?php
/**
 * Task Model Class
 */

class Task {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function addTask($title, $description) {
        $stmt = $this->conn->prepare("INSERT INTO task (title, description) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $description);
        return $stmt->execute();
    }

    public function getLatestTasks() {
        $sql = "SELECT id, title, description, created_at FROM task WHERE completed = FALSE ORDER BY created_at DESC LIMIT 5";
        $result = $this->conn->query($sql);

        if ($result) {
            return $result->fetch_all(MYSQLI_ASSOC);
        } else {
            error_log("Error fetching tasks: " . $this->conn->error);
            return [];
        }
    }

    public function markAsDone($id) {
        $stmt = $this->conn->prepare("UPDATE task SET completed = TRUE WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
