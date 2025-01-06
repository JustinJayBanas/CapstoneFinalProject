<?php
// db.php
require '../config.php';

$conn = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$username = isset($_POST['username']) ? $_POST['username'] : '';

if (!empty($username)) {
    // Delete the user's location
    $stmt = $conn->prepare("DELETE FROM user_locations WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->close();
}

$conn->close();
echo "Logout successful";
?>
