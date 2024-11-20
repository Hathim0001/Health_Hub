<?php
// Database connection parameters
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password
$database = "hospital"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve patient details
$sql = "SELECT * FROM treatmentprocedures";
$result = $conn->query($sql);

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Treatment Procedures</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Patient ID</th>
                    <th>Doctor ID</th>
                    <th>Procedure Date</th>
                    <th>Procedure Type</th>
                    <th>Procedure Description</th>
                    <th>Procedure Cost</th>
                    <th>Discharge Date</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["procedure_id"] . "</td>";
                        echo "<td>" . $row["patient_id"] . "</td>";
                        echo "<td>" . $row["doctor_id"] . "</td>";
                        echo "<td>" . $row["procedure_type"] . "</td>";
                        echo "<td>" . $row["procedure_date"] . "</td>";
                        echo "<td>" . $row["procedure_description"] . "</td>";
                        echo "<td>" . $row["procedure_cost"] . "</td>";
                        echo "<td>" . $row["discharge_date"] . "</td>";
            echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No Procedures found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>

