<?php
$conn = new mysqli('localhost', 'root', '', 'application_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM applications";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Applications</title>
</head>
<body>
  <h2>Applications List</h2>
  <table border="1" cellpadding="10">
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>dob</th>
      <th>age</th>
      <th>Position</th>
      <th>Languages</th>
      <th>Actions</th>
    </tr>
    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
      <td><?php echo $row['first_name']; ?></td>
      <td><?php echo $row['last_name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['dob']; ?></td>
      <td><?php echo $row['age']; ?></td>
      <td><?php echo $row['gender']; ?></td>
      <td><?php echo $row['position']; ?></td>
      <td><?php echo $row['languages']; ?></td>
      <td>
        <a href="edit.php?id=<?php echo $row['id']; ?>">Edit</a> | 
        <a href="delete.php?id=<?php echo $row['id']; ?>">Delete</a>
      </td>
    </tr>
    <?php endwhile; ?>
  </table>
</body>
</html>
<?php $conn->close(); ?>
