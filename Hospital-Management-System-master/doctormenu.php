<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Doctor Menu</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Custom CSS -->
  <style>
   
    .menu-container {
      margin-top: 50px;
    }
    .menu-item {
      border: 1px solid #dee2e6;
      padding: 20px;
      margin-bottom: 20px;
      border-radius: 5px;
      background-color:rgb(105, 228, 230);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .menu-item:hover {
      box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
    }
  </style>
</head>
<body>


<div class="container menu-container">
  <div class="row">
    <div class="col-md-12">
      <div class="menu-item">
        <h3>View Appointments</h3>
        <p>View appointments from appointment table.</p>
        <a href="view_appointments.php" class="btn btn-primary">Go to Appointments</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="menu-item">
        <h3>Request Leave</h3>
        <p>Submit leave requests.</p>
        <a href="Leave.php" class="btn btn-primary">Request Leave</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="menu-item">
        <h3>View Treatment Procedures</h3>
        <p>View treatment procedures from treatment price table.</p>
        <a href="view_treatment_procedures.php" class="btn btn-primary">View Procedures</a>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-12">
      <div class="menu-item">
        <h3>View Patient History</h3>
        <p>View patient history (inpatient and outpatient).</p>
        <a href="view_patient_history.php" class="btn btn-primary">View History</a>
      </div>
    </div>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

