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

// Initialize variables for error messages
$supplierError = $productError = $successMessage = "";

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $productName = $_POST["product-name"];
    $quantity = $_POST["quantity"];
    $deliveryDate = $_POST["delivery-date"];

    // Prepare and execute product check query
    $productCheck = "SELECT med_id, supplier_id FROM pharmacy WHERE name = '$productName'";
    $productResult = $conn->query($productCheck);

    if ($productResult->num_rows > 0) {
        // Fetch the result row
        $row = $productResult->fetch_assoc();
        
        // Fetch specific columns from the result row
        $med_id = $row["med_id"];
        $supplier_id = $row["supplier_id"];

        // Insert request into the database
        $sql = "INSERT INTO med_orders (med_id, quantity, supplier_id, expected_date) 
                VALUES ('$med_id', $quantity, '$supplier_id', '$deliveryDate')";
        if ($conn->query($sql) === TRUE) {
            header("Location: pharm_mod.php?success=req");

    } }
    else {
        header("Location: pharm_mod.php?error=req");
    }

}

// Close the database connection
$conn->close();
?>
