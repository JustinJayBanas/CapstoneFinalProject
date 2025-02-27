<?php
// db.php
require '../config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM attractions";
$result = $conn->query($sql);

$attractions = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $attractions[] = $row;
    }
}

// Return attractions as JSON
header('Content-Type: application/json');
echo json_encode($attractions);

$conn->close();
?>