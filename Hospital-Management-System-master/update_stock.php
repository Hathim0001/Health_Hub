<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $medicineId = $_POST["medicine-select"];
    $quantitySold = $_POST["quantity-sold"];

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

    // Update the stock of the selected medicine
    $sql = "UPDATE pharmacy SET stock = stock - $quantitySold WHERE med_id = $medicineId";

    if ($conn->query($sql) === TRUE) {
        // Stock updated successfully
        header("Location: pharm_mod.php?success=up");
    } else {
        // Error updating stock
        header("Location: pharm_mod.php");
    }

    // Close the database connection
    $conn->close();
}
?>
