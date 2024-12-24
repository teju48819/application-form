<?php
$conn = new mysqli('localhost', 'root', '', 'application_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "DELETE FROM applications WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    header("Location: fetch.php");
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>