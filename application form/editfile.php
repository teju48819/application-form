<?php
$conn = new mysqli('localhost', 'root', '', 'application_db');

if ($conn->connect_error) {
    die(" Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {    
    $firstName = $_POST['first_name'];
    $lastName = $_POST['last_name'];
    $email = $_POST['email'];
    $dob=$_POST['dob'];
    $age=$_POST['age'];
    $gender = $_POST['gender'];
    $position = $_POST['position'];
    $languages=isset($_POST['languages']) ? implode(", ", $_POST['languages']) : "";

    $sql = "UPDATE applications SET first_name='$firstName', last_name='$lastName', email='$email', dob='$dob', age='$age', gender='$gender', position='$position', languages='$languages' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        header("Location: fetch.php");
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
