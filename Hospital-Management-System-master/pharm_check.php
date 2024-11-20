<?php
// Establish a connection to the MySQL database
$servername = "localhost"; // Change this to your MySQL server hostname
$username = "root"; // Change this to your MySQL username
$password = ""; // Change this to your MySQL password
$dbname = "hospital"; // Change this to your MySQL database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the username and password from the form
    $pharmacistUsername = $_POST["pharmacistUsername"];
    $pharmacistPassword = $_POST["pharmacistPassword"];

    // Prepare an SQL statement to query the database
    $sql = "SELECT * FROM admin WHERE aid = '$pharmacistUsername' AND password = '$pharmacistPassword'";
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Authentication successful
        // Redirect to phar_mod.php
        header("Location: pharm_mod.php");
        exit();
    } else {
        // Authentication failed
        // Redirect back to login page with error message
        header("Location: pharmacist_login.php?error=invalid_credentials");
        exit();
    }
}

// Close the database connection
$conn->close();
?>
