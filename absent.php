<?php
include("database.php");

// Get form data
$studentfullname = $_POST['name'];
$id = $_POST['id'];
$date = date('Y-m-d H:i:s'); // Get current date and time

// Insert data into project_absence table
$sql = "INSERT INTO project_absence (student fullname, id, date) VALUES ('$studentfullname ', '$id', '$date')";

if ($conn->query($sql) === TRUE) {
    echo "Student marked as absent.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Absent Students</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Absent Students</h1>
        <table>
            <tr>
                <th>Full Name</th>
                <th>ID</th>
                <th>Time</th>
            </tr>
            <?php
            // Database connection details
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "abscence";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve data from project_absence table
            $sql = "SELECT student fullname, id, date FROM project_absence";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr><td>" . $row["student fullname"]. "</td><td>" . $row["id"] . "</td><td>" . $row["time"] . "</td></tr>";
                }
            } else {
                echo "<tr><td colspan='3'>No absent students found.</td></tr>";
            }

            $conn->close();
            ?>
        </table>
    </div>
</body>
</html>
