<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["uname"];
    $dob = $_POST["dob"];
    $gender = $_POST["gender"];
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $email = $_POST["email"];
    $contact_no = $_POST["num"];
    $address = $_POST["address"];
    $appointment_date = $_POST["appointment_date"];
    $appointment_time = $_POST["timeInput"];

    // SQL query to insert patient details into the database
    $sql = "INSERT INTO patients (name, dob, gender, height, weight, email, contact_no, address, appointment_date, appointment_time)
    VALUES ('$name', '$dob', '$gender', '$height', '$weight', '$email', '$contact_no', '$address', '$appointment_date', '$appointment_time')";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>