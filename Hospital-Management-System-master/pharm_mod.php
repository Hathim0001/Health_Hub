<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pharmacist Module</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <link rel="stylesheet" href="styles1.css">
</head>
<body>  
  <div class="management-container">
    <h2>Pharmacist Module</h2>

    <!-- Pharmacist Nav Tabs -->
    <ul class="nav nav-tabs">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#requestSupplier">Request Supplier</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#updateStock">Update Stock</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#viewPrescription">View Prescription</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#generateBill">Generate Bill</a>
      </li>
    </ul>

    <!-- Pharmacist Tab Content -->
    <div class="tab-content">
      <!-- Request Supplier Tab Content -->
      <div id="requestSupplier" class="tab-pane fade show active">
        <h3>Request Supplier</h3>
        <?php
        // Check if an error message is present in the URL
        if (isset($_GET['success']) && $_GET['success'] == 'req') {
            echo '<div id="reqSucs" class="success-mes">Request Successfully sent</div>';
        }
        if (isset($_GET['error']) && $_GET['error'] == 'req') {
          echo '<div id="reqError" class="error-message">Invalid Product</div>';
      }
        ?>
        <form id="request-supplier-form" method = "POST" action = "req_supplier.php">
          <!-- Request Supplier form content -->
          <div class="form-group">
            <label for="product-name">Product Name:</label>
            <input type="text" id="product-name" name="product-name" required>
          </div>
          <div class="form-group">
            <label for="quantity">Quantity:</label>
            <input type="number" id="quantity" name="quantity" required>
          </div>
          <div class="form-group">
            <label for="delivery-date">No of Days Expected For Delivery :</label>
            <input type="date" id="delivery-date" name="delivery-date" required>
          </div>
          <button type="submit" id="request-supplier-btn">Request Supplier</button>
        </form>
      </div>


      <!-- Update Stock Tab Content -->
      <div id="updateStock" class="tab-pane fade">
        <h3>Update Stock</h3>
        <?php
        // Check if an error message is present in the URL
        if (isset($_GET['success']) && $_GET['success'] == 'up') {
            echo '<div id="reqSucs" class="success-mes">Updated Successfully</div>';
        }
        ?>
        <form id="update-stock-form" method="POST" action="update_stock.php">
          <div class="form-group">
            <label for="medicine-select">Select Medicine:</label>
            <select id="medicine-select" name="medicine-select" required>
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "hospital";
                $conn = new mysqli($servername, $username, $password, $dbname);
                $sql = "SELECT med_id, name FROM pharmacy";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Output data of each row
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='" . $row["med_id"] . "'>" . $row["name"] . "</option>";
                    }
                } else {
                    echo "<option value=''>No medicines available</option>";
                }
                $conn->close();
                ?>
            </select>
          </div>
          <div class="form-group">
            <label for="quantity-sold">Quantity Sold:</label>
            <input type="number" id="quantity-sold" name="quantity-sold" min="1" required>
          </div>
          <button type="submit" id="update-stock-btn">Submit</button>
        </form>
      </div>

    <!-- View Prescription Tab Content -->
    <div id="viewPrescription" class="tab-pane fade full-height">
        <div class="container-fluid">
        <div class="row">
            <div class="col">
            <h3>View Prescription</h3>
            <div class="table-container">
                <div class="table-wrapper">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Prescription ID</th>
                        <th>Patient ID</th>
                        <th>Date</th>
                        <th>Doctor</th>
                        <th>Medicine</th>
                        <th>Dosage</th>
                        <th>Frequency</th>
                        <!-- Add more table headings if needed -->
                    </tr>
                    </thead>
                    <tbody>
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

                        // Fetch prescription data from the database
                        $sql = "SELECT * FROM prescription";
                        $result = $conn->query($sql);

                        // Check if there are any prescription records
                        if ($result->num_rows > 0) {
                            // Output table headers
                            echo "<table class='table'>";
                            echo "<thead>";
                            echo "<tr>";
                            echo "<th>Prescription ID</th>";
                            echo "<th>Patient ID</th>";
                            echo "<th>Date</th>";
                            echo "<th>Doctor</th>";
                            echo "<th>Medicine</th>";
                            echo "<th>Dosage</th>";
                            echo "<th>Frequency</th>";
                            echo "<th>Duration</th>";
                            echo "<th>Instructions</th>";
                            echo "</tr>";
                            echo "</thead>";
                            echo "<tbody>";
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row["prescription_id"] . "</td>";
                                echo "<td>" . $row["patient_id"] . "</td>";
                                echo "<td>" . $row["prescription_date"] . "</td>";
                                $doctorId = $row["doctor_id"];
                                $doctorQuery = "SELECT e_name FROM emp_details WHERE eid = $doctorId";
                                $doctorResult = $conn->query($doctorQuery);
                                if ($doctorResult->num_rows > 0) {
                                    $doctorRow = $doctorResult->fetch_assoc();
                                    echo "<td>" . $doctorRow["e_name"] . "</td>";
                                } else {
                                    echo "<td>No doctor found</td>";
                                }
                                echo "<td>" . $row["medication_name"] . "</td>";
                                echo "<td>" . $row["dosage"] . "</td>";
                                echo "<td>" . $row["frequency"] . "</td>";
                                echo "<td>" . $row["duration"] . "</td>";
                                echo "<td>" . $row["instructions"] . "</td>";
                                echo "</tr>";
                            }

                            echo "</tbody>";
                            echo "</table>";
                        } else {
                            echo '<div id="reqPres" class="error-message">No prescriptions found</div>';
                        }

                        $conn->close();
                      ?>

                    </tbody>
                </table>
                </div>
            </div>
            </div>
        </div>
        </div>
    </div>
   
   

      <!-- Generate Bill Tab Content -->        
      <div id="generateBill" class="tab-pane fade">
        <h3>Generate Bill</h3>
        <form id="bill-form" method="POST" action="pharm_bill.php">
          <div class="form-group">
            <label for="medicine-types">Number of Medicine Types:</label>
            <input type="number" id="medicine-types" name="medicine-types" min="1" required>
          </div>
          <div id="medicine-details" class="form-group">
                        <!-- Dynamically populated -->
          </div>
          <div class="form-group">
            <label for="payment-method">Payment Method:</label>
            <select id="payment-method" name="payment-method" required>
              <option value="" disabled selected>Select Payment Method</option>
              <option value="cash">Cash</option>
              <option value="credit-card">Credit Card</option>
              <option value="debit-card">Debit Card</option>
              <option value="online-payment">Online Payment</option>
            </select>
          </div>
          <button type="submit">Generate Bill</button>
        </form>
        <div id="bill-details" class="hidden">
          <!-- Bill details will be displayed here -->
        </div>
      </div>

      <!-- Confirmation pop-up window -->
     

      <script>
        document.getElementById('medicine-types').addEventListener('change', function() {
        var medicineTypes = parseInt(this.value);
        var medicineDetails = document.getElementById('medicine-details');
        medicineDetails.innerHTML = ''; // Clear previous content
       
        for (var i = 1; i <= medicineTypes; i++) {
          var medicineDropdown = document.createElement('select');
          medicineDropdown.id = 'medicine' + i;
          medicineDropdown.name = 'medicine' + i;
          medicineDropdown.innerHTML = '<?php
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

                                          // Fetch medicine names from the database
                                          $sql = "SELECT med_id, name FROM pharmacy";
                                          $result = $conn->query($sql);

                                          // Check if there are any medicines available
                                          if ($result->num_rows > 0) {
                                              echo '<select id="medicine-select" name="medicine-select" required>';
                                              echo '<option value="" disabled selected>Select Medicine</option>';
                                              while ($row = $result->fetch_assoc()) {
                                                  echo '<option value="' . $row["name"] . '">' . $row["name"] . '</option>';
                                              }
                                              echo '</select>';
                                          } else {
                                              echo '<div id="medError" class="error-message">No Medicines found</div>';
                                          }

                                          // Close the database connection
                                          $conn->close();
                                          ?>'
                                          ; // Sample medicines, replace with actual values
                                                  
          var quantityInput = document.createElement('input');
          quantityInput.type = 'number';
          quantityInput.id = 'quantity' + i;
          quantityInput.name = 'quantity' + i;
          quantityInput.placeholder = 'Quantity';
          quantityInput.min = '1';
          quantityInput.required = true;
         
          medicineDetails.appendChild(medicineDropdown);
          medicineDetails.appendChild(quantityInput);
          medicineDetails.appendChild(document.createElement('br'));
        }
      });

      </script>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>