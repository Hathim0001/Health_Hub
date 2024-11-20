<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hospital";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $medicineTypes = $_POST["medicine-types"];

    $paymentMethod = $_POST["payment-method"];
    for ($i = 1; $i <= $medicineTypes; $i++) {
        $selectedMedicine = $_POST["medicine$i"];
        $quantity = $_POST["quantity$i"];
        $check = "SELECT stock FROM pharmacy WHERE name = '$selectedMedicine'";
        if($check < $quantity)
        {
            header("Location: pharm_mod.php?error=bill");
        }
        $sql = "UPDATE pharmacy SET stock = stock + $quantity WHERE name = '$selectedMedicine'";
      }

    echo '<!DOCTYPE html>
    <html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Generated Bill</title>
      <style>
      body {
        font-family: Arial, sans-serif;
    }
    
    .container {
        max-width: 800px;
        margin: 0 auto;
    }
    
    .bill {
        border-collapse: collapse;
        width: 100%;
    }
    
    .bill th,
    .bill td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }
    
    .bill th {
        background-color: #f2f2f2;
    }
    
    .print-button {
        margin-top: 20px;
        padding: 10px 20px;
        background-color: #007bff;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
    }
    
    .print-button:hover {
        background-color: #0056b3;
      </style>
    </head>
    <body>
      <div class="container">
        <h2>Generated Bill</h2>';
        echo "<div>Payment Method: $paymentMethod </div>";
        echo '<table class="bill">
          <thead>
            <tr>
              <th>Medicine Name</th>
              <th>Quantity</th>
              <!-- Add more columns as needed -->
            </tr>
          </thead>
          <tbody>';
            for ($i = 1; $i <= $medicineTypes; $i++) {
              $selectedMedicine = $_POST["medicine$i"];
              $quantity = $_POST["quantity$i"];
              echo "<tr>";
              echo "<td>$selectedMedicine</td>";
              echo "<td>$quantity</td>";
              echo "</tr>";
            }
          echo '</tbody>
        </table>
        <button class = "print-button" onclick="window.print()">Print Bill</button>

    </html>
    ';
  }
?>
