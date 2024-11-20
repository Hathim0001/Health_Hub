<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Leave Request Form</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .custom-container {
      background-color: #e7f1f7;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
    }
  </style>
</head>
<body>

<div class="container-fluid">
  <div class="row justify-content-center">
    <div class="col-md-6 custom-container mt-5">
      <h2 class="mb-4">Leave Request Form</h2>
      <form action="submit_leave.php" method="post">
        <div class="form-group">
          <label for="employeeName">Employee Name:</label>
          <input type="text" class="form-control" id="employeeName" name="employeeName" placeholder="Enter name" required>
        </div>
        <div class="form-group">
          <label for="employeeId">Employee ID:</label>
          <input type="text" class="form-control" id="employeeId" name="employeeId" placeholder="Enter ID" required>
        </div>
        <div class="form-group">
          <label for="leaveType">Leave Type:</label>
          <select class="form-control" id="leaveType" name="leaveType" required>
            <option value="">Select Leave Type</option>
            <option value="sick">Sick Leave</option>
            <option value="vacation">Vacation Leave</option>
            <option value="personal">Personal Leave</option>
          </select>
        </div>
        <div class="form-group">
          <label for="startDate">Start Date:</label>
          <input type="date" class="form-control" id="startDate" name="startDate" required>
        </div>
        <div class="form-group">
          <label for="endDate">End Date:</label>
          <input type="date" class="form-control" id="endDate" name="endDate" required>
        </div>
        <div class="form-group">
          <label for="reason">Reason:</label>
          <textarea class="form-control" id="reason" name="reason" rows="3" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS and dependencies -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
