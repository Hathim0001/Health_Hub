<!DOCTYPE html>
<html>
<head>
    <title>Pharmacist Login</title>
    <link rel="stylesheet" type="text/css" href="Styles.css">
</head>
<body>
    <div id="pharmacistLogin">
        <h2>Pharmacist Login</h2>
        <?php
        // Check if an error message is present in the URL
        if (isset($_GET['error']) && $_GET['error'] == 'invalid_credentials') {
            echo '<div id="errorMessage" class="error-message">Invalid username or password. Please try again.</div>';
        }
        ?>
        <form id="pharmacistLoginForm" onsubmit="return validateForm()" action="pharm_check.php" method="POST">
            <div class="form-group">
                <label for="pharmacistUsername">Username:</label>
                <input type="text" id="pharmacistUsername" name="pharmacistUsername">
                <div id="pharmacistUsernameError" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="pharmacistPassword">Password:</label>
                <input type="password" id="pharmacistPassword" name="pharmacistPassword">
                <div id="pharmacistPasswordError" class="error-message"></div>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>

    <script>
        function validateForm() {
            var username = document.getElementById("pharmacistUsername").value;
            var password = document.getElementById("pharmacistPassword").value;
            var usernameError = document.getElementById("pharmacistUsernameError");
            var passwordError = document.getElementById("pharmacistPasswordError");
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
</body>
</html>
