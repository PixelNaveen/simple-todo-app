<?php
/**
 * Database connection configuration.
 */

$servername = "db";      // Docker Compose service name for MySQL
$username = "root";
$password = "root";
$dbname = "todoapp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


