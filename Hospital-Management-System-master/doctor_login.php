<!DOCTYPE html>
<html>
<head>
    <title>Doctor Login</title>
    <link rel="stylesheet" type="text/css" href="Styles.css">
</head>
<body>
    <div id="doctorLogin">
        <h2>Doctor Login</h2>
        <form id="doctorLoginForm" onsubmit="return validateForm()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="form-group">
                <label for="doctorUsername">Username:</label>
                <input type="text" id="doctorUsername" name="doctorUsername">
                <div id="doctorUsernameError" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="doctorPassword">Password:</label>
                <input type="password" id="doctorPassword" name="doctorPassword">
                <div id="doctorPasswordError" class="error-message"></div>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("doctorUsername").value;
            var password = document.getElementById("doctorPassword").value;
            var usernameError = document.getElementById("doctorUsernameError");
            var passwordError = document.getElementById("doctorPasswordError");
            var valid = true;

            // Reset previous error messages
            usernameError.innerHTML = "";
            passwordError.innerHTML = "";

            // Validate username
            if (username.trim() === "") {
                usernameError.innerHTML = "Please enter your username";
                valid = false;
            }

            // Validate password
            if (password.trim() === "") {
                passwordError.innerHTML = "Please enter your password";
                valid = false;
            }

            return valid;
        }
    </script>
    
    <?php
    // Processing form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        $doctorUsername = $_POST["doctorUsername"];
        $doctorPassword = $_POST["doctorPassword"];

        // Prepare and execute statement
        $stmt = $conn->prepare("SELECT * FROM Doctor WHERE username = ? AND passwordd = ?");
        $stmt->bind_param("ss", $doctorUsername, $doctorPassword);
        $stmt->execute();
        $result = $stmt->get_result();

        // Check if the login credentials are valid
        if ($result->num_rows > 0) {
            echo "Login successful";
            // Redirect to the doctor menu page
            header("Location: doctormenu.php");
            exit(); // Ensure no further output is sent
        } else {
            echo "Invalid username or password";
        }

        $stmt->close();
        $conn->close();
    }
    ?>
</body>
</html>
