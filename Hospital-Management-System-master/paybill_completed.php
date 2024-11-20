<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hospital Management</title>
  <script>

    function validate(event)
    {
      alert("Called !");

      pid=document.querySelector("#pid").value;
      alert(pid);
      const pid_pattern=/^[0-9]{1,}$/;
      if(pid_pattern.test(pid))
      {
        alert("if pid");
        document.querySelector("#pid").style.border="2px solid green";
        flag=flag+1;
      }
      else
      {
        alert("else eid");
        document.querySelector("#pid").style.border="2px solid red";
        document.querySelector("#msg0").innerHTML="INVALID EMPLOYEE ID";
        document.querySelector("#msg0").style.color="red";
      }


    }
  </script>
  <link rel="stylesheet" href="styles1.css">
</head>
<body>  
  <div class="management-container">
    <h2>BILL SYSTEM</h2>
    <form id="management-form" method="post" action="bill_sys_store.php" target="_blank" onsubmit="return validate()">
      <div class="form-group">
        <label for="patient-id">Patient ID:</label>
        <input type="text" id="patient-id" name="pid" id="pid" required>
        <h4 id="msg0"></h4>
      </div>
      <div class="form-group">
        <label for="admission-type">Admission Type:</label>
        <select id="admission-type" name="adtype" id="adtype" required>
          <option value="" disabled selected>Select Admission Type</option>
          <option value="inpatient">Inpatient</option>
          <option value="outpatient">Outpatient</option>
        </select>
      </div>
      <div id="insurance-avail-group" class="hidden">
        <div class="form-group">
          <input type="checkbox" id="insurance" name="insurance">
          <label for="insurance">Avail Insurance</label>
        </div>
      </div>
      <div id="insurance-details" class="hidden">
        <div class="form-group">
          <label for="insurance-company">Insurance Company:</label>
          <input type="text" id="insurance-company" name="insurance-company" class="hidden">
        </div>
        <div class="form-group">
          <label for="policy-number">Policy Number:</label>
          <input type="text" id="policy-number" name="policy-number" class="hidden">
        </div>
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
      <div id="payment-section-inpatient" class="hidden">
        <div class="form-group">
          <label for="payment-inpatient">Payment Made for Inpatient:</label>
          <input type="text" id="payment-inpatient" name="payment-inpatient" placeholder="$">
        </div>
      </div>
      <div id="payment-section-outpatient" class="hidden">
        <div class="form-group">
          <label for="payment-outpatient">Payment Made for Outpatient:</label>
          <input type="text" id="payment-outpatient" name="payment-outpatient" placeholder="$">
        </div>
      </div>
      <button type="submit" id="submit-btn">Submit</button>
    </form>

    <!-- Confirmation pop-up window -->
    <div id="confirmation-popup" class="popup hidden">
      <div class="popup-content">
        <h3>Confirm Payment</h3>
        <p id="conf-patient-id"></p>
        <p id="conf-admission-type"></p>
        <p id="conf-insurance-company"></p>
        <p id="conf-policy-number"></p>
        <p id="conf-payment-method"></p>
        <p id="conf-payment-amount"></p>
        <button id="confirm-yes">Yes</button>
        <button id="confirm-no">No</button>
      </div>
    </div>

    <!-- Success message -->
    <div id="success-message" class="popup hidden">
      <div class="popup-content">
        <p>Payment Successful!</p>
        <button id="close-success">Close</button>
      </div>
    </div>
  </div>

  <!-- JavaScript code -->
  <script>
    // Function to show pop-up window
    function showPopup(popupId) {
      document.getElementById(popupId).classList.remove('hidden');
    }

    // Function to hide pop-up window
    function hidePopup(popupId) {
      document.getElementById(popupId).classList.add('hidden');
    }

    // Add event listener to form submission
    document.getElementById('management-form').addEventListener('submit', function(event) {
      event.preventDefault(); // Prevent form submission
      // Get form values
      var patientId = document.getElementById('patient-id').value;
      var admissionType = document.getElementById('admission-type').value;
      var insuranceCompany = document.getElementById('insurance-company').value;
      var policyNumber = document.getElementById('policy-number').value;
      var paymentMethod = document.getElementById('payment-method').value;
      if (admissionType === 'inpatient'){
      var paymentAmount =  document.getElementById('payment-inpatient').value;
      }else{
        var paymentAmount =  document.getElementById('payment-outpatient').value;
      }
      // Display confirmation pop-up with form values
      document.getElementById('conf-patient-id').textContent = 'Patient ID: ' + patientId;
      document.getElementById('conf-admission-type').textContent = 'Admission Type: ' + admissionType;
      document.getElementById('conf-insurance-company').textContent = 'Insurance Company: ' + insuranceCompany;
      document.getElementById('conf-policy-number').textContent = 'Policy Number: ' + policyNumber;
      document.getElementById('conf-payment-method').textContent = 'Payment Method: ' + paymentMethod;
      document.getElementById('conf-payment-amount').textContent = 'Payment Amount: $' + paymentAmount;
      showPopup('confirmation-popup');
    });

    document.getElementById('admission-type').addEventListener('change', function() {
      var admissionType = this.value;
      var insuranceAvailGroup = document.getElementById('insurance-avail-group');
      var insuranceDetails = document.getElementById('insurance-details');
      var insuranceCompany = document.getElementById('insurance-company');
      var policyNumber = document.getElementById('policy-number');
      var paymentSectionInpatient = document.getElementById('payment-section-inpatient');
      var paymentSectionOutpatient = document.getElementById('payment-section-outpatient');

      if (admissionType === 'inpatient') {
        insuranceAvailGroup.classList.remove('hidden');
        insuranceDetails.classList.remove('hidden');
        insuranceCompany.classList.add('hidden');
        policyNumber.classList.add('hidden');
        paymentSectionInpatient.classList.remove('hidden');
        paymentSectionOutpatient.classList.add('hidden');
      } else if (admissionType === 'outpatient') {
        insuranceAvailGroup.classList.add('hidden');
        insuranceDetails.classList.add('hidden');
        paymentSectionInpatient.classList.add('hidden');
        paymentSectionOutpatient.classList.remove('hidden');
      } else {
        insuranceAvailGroup.classList.add('hidden');
        insuranceDetails.classList.add('hidden');
        paymentSectionInpatient.classList.add('hidden');
        paymentSectionOutpatient.classList.add('hidden');
      }
    });

    document.getElementById('insurance').addEventListener('change', function() {
      var insuranceDetails = document.getElementById('insurance-details');
      var insuranceCompany = document.getElementById('insurance-company');
      var policyNumber = document.getElementById('policy-number');
      var admissionType = document.getElementById('admission-type').value;

      if (this.checked && admissionType === 'inpatient') {
        insuranceDetails.classList.remove('hidden');
        insuranceCompany.classList.remove('hidden');
        policyNumber.classList.remove('hidden');
      } else {
        insuranceDetails.classList.add('hidden');
        insuranceCompany.classList.add('hidden');
        policyNumber.classList.add('hidden');
      }
    });

    // Add event listener to confirm payment button
    document.getElementById('confirm-yes').addEventListener('click', function() {
      // Perform payment confirmation logic here (e.g., API call)
      // On successful confirmation, display success message
      hidePopup('confirmation-popup');
      showPopup('success-message');
    });

    // Add event listener to cancel payment button
    document.getElementById('confirm-no').addEventListener('click', function() {
      hidePopup('confirmation-popup');
    });

    // Add event listener to close success message button
    document.getElementById('close-success').addEventListener('click', function() {
      hidePopup('success-message');
    });
  </script>
</body>
</html>
