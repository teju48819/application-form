<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'application_db');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from form
$firstName = $_POST['first_name'];
$lastName = $_POST['last_name'];
$dob = $_POST['dob'];
$age = $_POST['age'];
$gender = $_POST['gender'];
$email = $_POST['email'];
$position = $_POST['position'];
$languages = isset($_POST['languages']) ? implode(", ", $_POST['languages']) : "";
$password = password_hash($_POST['password'], PASSWORD_BCRYPT);

// Insert data into database
$sql = "INSERT INTO applications (first_name, last_name, dob, age, gender, email, position, languages, password) 
        VALUES ('$firstName', '$lastName', '$dob', '$age', '$gender', '$email', '$position', '$languages', '$password')";
        /* $sql;*/
if ($conn->query($sql) === TRUE) {
    echo "Record saved successfully! <a href='fetch.php'>View Records</a>";
} else {
    echo "Error: " . $conn->error;
}

$conn->close();
?>