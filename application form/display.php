
<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'applications_db');

// Check connection
if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

// Fetch records
$sql = "SELECT * FROM applications";
$result = $conn->query($sql);

// Display records in HTML table
echo "<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Application Records</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f4f4f4;
        }
    </style>
</head>
<body>
    <h1>Application Records</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Email</th>
                <th>Position</th>
                <th>Languages</th>
            </tr>
        </thead>
        <tbody>";

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['first_name']}</td>
                <td>{$row['last_name']}</td>
                <td>{$row['dob']}</td>
                <td>{$row['age']}</td>
                <td>{$row['gender']}</td>
                <td>{$row['email']}</td>
                <td>{$row['position']}</td>
                <td>{$row['languages']}</td>
            </tr>";
    }
} else {
    echo "<tr><td colspan='9'>No records found</td></tr>";
}

echo "</tbody></table></body></html>";

$conn->close();
?>   
