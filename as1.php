

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>as1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.html">Add Employee</a></li>
                <li><a href="view.php">View Employees</a></li>
            </ul>
        </nav>
        <img src="logo.png" alt="Company Logo">
    </header>

    <main>
        <h1>Add Employee</h1>
        <form action="/as1/as1.php" method="post">
            <label for="fname">First Name:</label>
            <input type="text" name="fname" id="fname" required><br>
            <label for="lname">Last Name:</label>
            <input type="text" name="lname" id="lname" required><br>
            <label for="position">Position:</label>
            <input type="text" name="position" id="position" required><br>
            <button type="submit">Add Employee</button>
        </form>
    </main>

    <footer>
        &copy; 2023 Your Company
    </footer>
</body>

<?php

include 'includes/as.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Validate and retrieve form data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $position = $_POST['position'];

    // Database connection parameters
    $servername = "localhost:3306";
    $username = "root";
    $password = "Eko.115221"; // Replace with your database password
    $database = "contacts"; // Replace with your database name

    // Create a database connection
    $conn = mysqli_connect($servername, $username, $password, $database);

    // Check if the connection was successful
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        // Prepare and execute the SQL query to insert employee data


        $sql = "INSERT INTO `as1` (`fname`, `lname`, `position`) VALUES ('$fname', '$lname', '$position')";
        $result=mysqli_query($conn,$sql);


        if($result) {
            echo "Data inserted successfully";
    
        }
        else {
            echo "Data not inserted due to" .mysqli_error($conn);
        }

        
    }
}
?>
</html>