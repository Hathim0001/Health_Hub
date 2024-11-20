<!DOCTYPE html>
<html>
<head>
    <title>Alter employee form</title>
    <link rel="stylesheet" type="text/css" href="Styles.css">
    <script>
        function showTextBox() {
            var selectBox = document.getElementById("alterField");
            var selectedValue = selectBox.options[selectBox.selectedIndex].value;
            var textBoxContainer = document.getElementById("textBoxContainer");
            
            if (selectedValue === "dob")
            {
                var input = document.createElement("input");
                input.type = "date";
                input.placeholder = "yyyy-mm-dd";
                textBoxContainer.appendChild(input);
            } 
            else if (selectedValue === "ename") 
            {
                var input = document.createElement("input");
                input.type = "text";
                input.placeholder = "Enter new name";
                textBoxContainer.appendChild(input);
            } 
            else if (selectedValue === "erole") 
            {
                var input = document.createElement("input");
                input.type = "text";
                input.placeholder = "Enter new role";
                textBoxContainer.appendChild(input);
            } 
            else if (selectedValue === "dept") 
            {
                var input = document.createElement("input");
                input.type = "text";
                input.placeholder = "Enter new Department";
                textBoxContainer.appendChild(input);
            }
            else if (selectedValue === "contact") 
            {
                var input = document.createElement("input");
                input.type = "text";
                input.placeholder = "Enter new contact";
                textBoxContainer.appendChild(input);
            }  
            else if (selectedValue === "email") 
            {
                var input = document.createElement("input");
                input.type = "text";
                input.placeholder = "Enter new email";
                textBoxContainer.appendChild(input);
            } 
            else if (selectedValue === "duty") 
            {
                var input = document.createElement("input");
                input.type = "text";
                input.placeholder = "Enter changed duty hours";
                textBoxContainer.appendChild(input);
            } 
            else if (selectedValue === "specialization") 
            {
                var input = document.createElement("input");
                input.type = "text";
                input.placeholder = "Enter new specialization";
                textBoxContainer.appendChild(input);
            }

            else if (selectedValue === "experience") 
            {
                var input = document.createElement("input");
                input.type = "text";
                input.placeholder = "Enter new prior experience";
                textBoxContainer.appendChild(input);
            }
        }
    </script>
</head>
<body>
<div id="section3">
    <h2>Alter Employee Details</h2>
    <form>
        <label for="eid">Employee ID</label>
        <input type="text" placeholder="Employee ID"><br>
        <label for="hid">Hospital ID</label>
        <input type="text" placeholder="Hospital ID"><br>
        <label for="alter">Enter the field to be altered</label>
        <select id="alterField" onchange="showTextBox()">
            <option value="none"></option>
            <option value="dob">Date of Birth</option>
            <option value="ename">Employee Name</option>
            <option value="erole">Employee Role</option>
            <option value="dept">Department</option>
            <option value="contact">Contact Number</option>
            <option value="email">Email</option>
            <option value="duty">Duty Hours</option>
            <option value="specialization">Specialization</option>
            <option value="experience">Prior experience</option>
        </select><br>
        <div id="textBoxContainer"></div> <!-- Container to hold dynamically generated text box -->
        <button type="submit">Alter Employee</button>
    </form>
</div>
</body>
</html>
