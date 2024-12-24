<?php
$conn = new mysqli('localhost', 'root', '', 'application_db');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$id = $_GET['id'];
$result = $conn->query(query: "SELECT * FROM applications WHERE id =  $id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color:rgb(213, 203, 188);
        }
        
        .form-container {
            width: 60%;
            margin: 20px auto;
            background: #1e4d6b;
            padding: 20px;
            border-radius: 8px;
            color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        
        .form-container h2 {
            text-align: center;
            margin-bottom: 30px;
            font-size: 38px;
            font-weight: bold;
            letter-spacing: 1px;
        }
        
        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
        }
        
        .form-grid>div {
            display: grid;
            grid-template-columns: 30% 1fr;
        }
        
        .form-grid label {
            display: block;
            margin-bottom: 5px;
        }
        
        .form-grid input,
        .form-grid select {
            width: 100%;
            padding: 8px;
            border: none;
            border-radius: 4px;
        }
        
        .form-grid input[type="checkbox"],
        .form-grid input[type="radio"] {
            width: auto;
            margin-right: 10px;
        }
        
        .options-group {
            grid-column: span 2;
            /* Makes these sections span two columns */
        }
        
        .options-group label {
            display: inline-block;
            margin-right: 10px;
        }
        
        .buttons {
            text-align: center;
            margin-top: 20px;
        }
        
        .buttons input {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            background-color: rgb(213, 58, 30);
            color: white;
            cursor: pointer;
            margin: 0 5px;
        }
        
        .buttons input:hover {
            background-color: darkorange;
        }
    </style>
</head>
<body>
     <div class="form-container">
        <h2>Application Form</h2>
        <form action="editfile.php?id=<?php echo $row['id']; ?>" method="post">
    
            <div class="form-grid">
                <!-- First Name -->
                <div>
                    <label for="first_name">First Name:</label>
                    <input type="text" id="first_name" name="first_name" value=<?php echo $row['first_name']; ?> required>
                </div>
                <!-- Last Name -->
                <div>
                    <label for="last_name">Last Name:</label>
                    <input type="text" id="last_name" name="last_name"value= <?php echo $row['last_name']; ?> required>
                </div>

                <!-- Date of Birth -->
                <div>
                    <label for="dob">Date of Birth:</label>
                    <input type="date" id="dob" name="dob" value= <?php echo $row['dob']; ?>  required>
                </div>
                <!-- Age -->
                <div>
                    <label for="age">Age:</label>
                    <input type="number" id="age" name="age" value= <?php echo $row['age']; ?> required>
                </div>

                <!-- Gender -->
                <div>
                    <label for="gender">Gender:</label>
                    <select id="gender" name="gender" value=<?php echo $row['gender']; ?> required>
                        <option value="male" selected>Male</option>
                        <option value="female">Female</option>
                    </select>
                </div>
                <!-- Email -->
                <div>
                    <label for="email">Email Address:</label>
                    <input type="email" id="email" name="email"value=<?php echo $row['email']; ?> required>
                </div>

                <!-- Position -->
                <div class="options-group">
                    <label>Positions Available:</label>
                     <label><input type="radio" name="position" value="<?php echo $row['position'] === 'Junior Developer' ? 'Junior Developer' : ''; ?>"
                     <?php echo $row['position'] === 'Junior Developer' ? 'checked' : ''; ?>>Junior Developer</label>
                     <label>
                        <input type="radio" name="position" value="<?php echo $row['position'] === 'Mid-level Developer' ? 'Mid-level Developer' : ''; ?>" 
                        <?php echo $row['position'] === 'Mid-level Developer' ? 'checked' : ''; ?>>Mid-level Developer</label>
                    <label>
                         <input type="radio" name="position" value="<?php echo $row['position'] === 'Senior Developer' ? 'Senior Developer' : ''; ?>" 
                         <?php echo $row['position'] === 'Senior Developer' ? 'checked' : ''; ?>>
                         Senior Developer
                    </label>
                </div>

                <div class="options-group">
                    <label>Programming Languages:</label>
                    <label><input type="checkbox" name="languages[]" value="Java" <?php echo in_array("Java", explode(", ", $row['languages'])) ? "checked=true": "" ?>> Java</label>
                    <label><input type="checkbox" name="languages[]" value="JavaScript" <?php echo in_array("JavaScript", explode(", ", $row['languages'])) ? "checked=true": "" ?>> JavaScript</label>
                    <label><input type="checkbox" name="languages[]" value="Python" <?php echo in_array("Python", explode(", ", $row['languages'])) ? "checked=true": "" ?>> Python</label>
                </div> 

                <!-- Password -->
                <div>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" value=<?php echo $row['email']; ?> required>
                </div>
                <!-- Confirm Password -->
                <div>
                    <label for="confirm_password">Confirm Password:</label>
                    <input type="password" id="confirm_password" name="confirm_password" value=<?php echo $row['email']; ?> required>
                </div>
            </div>

            <!-- Buttons -->
            <div class="buttons">
                <input type="submit" value="Submit">
                <input type="reset" value="Reset">
            </div>
        </form>
</body>
</html>


<?php $conn->close(); ?>