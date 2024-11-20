<!DOCTYPE html>
<html>
<head>
    <title>Patient Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-weight: bold;
        }

        #form {
            width: 600px;
            margin: 15vh auto 15vh auto;
            background-color: #f0f8ff;
            border-radius: 5px;
            padding: 70px;
        }

        h1 {
            margin-top: 5px;
            text-align: center;
            color: #1e90ff;
        }

        #form button {
            background-color: #1e90ff;
            color: white;
            border-radius: 5px;
            border: 1px solid;
            padding: 10px;
            width: 40%;
            margin-top: 15px;
            margin-left: 50px;
        }

        .input-group {
            display: flex;
            flex-direction: column;
            width: 50%;
            margin-bottom: 15px;
            gap: 7px;
        }

        .input-group input {
            border-radius: 5px;
            font-size: 15px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: box-shadow 0.3s ease-in-out;
            padding: 8px;
        }

        .input-group input:focus {
            outline: 0;
        }

        .gender input[type="radio"],
        .dob input[type="date"],
        .hgt input[type="number"],
        .wgt input[type="number"],
        .time input[type="time"] {
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: box-shadow 0.3s ease-in-out;
            margin-top: 8px;
            padding: 8px;
            outline: 0
        }

        .hgt input[type="number"],
        .wgt input[type="number"] {
            width: 5%;
            padding: 8px;
        }

        .msg {
            display: none;
            font-size: 0.7rem;
        }

    </style>
    <script>
        let validate = () => {
            let email = document.getElementById("email").value;
            let name = document.getElementById("uname").value;
            let correct;
            console.log(email, name);
            document.querySelectorAll("span.msg")
                .forEach((x) => (x.style.display = "block"));


            let emailRe = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            if (name.length < 3 || name.length > 25) {
                document.querySelector("#uname+span.msg").style.color = "red";
                document.getElementById("uname").style.boxShadow = "0 0 7px red";
                document.querySelector("#uname+span.msg").innerHTML =
                    'Username must be between 3 and 25 characters.';
            } else {
                document.querySelector("#uname+span.msg").style.color = "green";
                document.getElementById("uname").style.boxShadow = "0 0 7px green";
                document.querySelector("#uname+span.msg").innerHTML =
                    "Valid username";
                correct = false;
            }

            if (!emailRe.test(email)) {
                document.querySelector("#email+span.msg").style.color = "red";
                document.getElementById("email").style.boxShadow = "0 0 7px red";
                document.querySelector("#email+span.msg").innerHTML = "Invalid email";
            } else {
                document.querySelector("#email+span.msg").style.color = "green";
                document.getElementById("email").style.boxShadow = "0 0 7px green";
                document.querySelector("#email+span.msg").innerHTML = "Valid email";
                correct = false;
            }

            if (correct === undefined) {
                console.log("Correct!");
            }
        }
    </script>

</head>
<body>
<div class="container">
    <form action="apointment.php" id="form" method="POST">
        <h1>Patient Details</h1>
        <div class="input-group">
            <label for="uname">Name:</label>
            <input type="text" name="uname" id="uname" placeholder="Your Name"/>
            <span class="msg"></span>
        </div>

        <div class="gender">
            <label>Gender:</label><br>
            <input type="radio" id="male" name="gender" value="male">
            <label for="male">Male</label>
            <input type="radio" id="female" name="gender" value="female">
            <label for="female">Female</label><br>
        </div><br>
        <div class="dob">
            <label for="dob"> Date of Birth:</label><br>
            <input type="date" name="dob" id="dob"/>
        </div><br>
        <label for="height">Height:</label><br>
        <span class="hgt">
          <input type="number" name="height" id="height" placeholder="#"/>
		</span><br><br>

        <label for="weight">Weight:</label><br>
        <span class="wgt">
          <input type="number" name="weight" id="weight" placeholder="#"/>
		</span><br><br>
        <div class="input-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" placeholder="Email"/>
            <span class="msg"> </span>
        </div>
        <div class="input-group">
            <label for="num">Phone Number:</label>
            <input type="tel" name="num" id="num" placeholder="###"/>
            <div class="error"></div>
        </div>

        <div class="add">
            <label for="address">Address:</label><br>
            <textarea name="address" id="address" cols="30" rows="10"></textarea><br>
            <div class="dob">
                <label for="dob">Appointment Date:</label><br>
                <input type="date" name="appointment_date" id="appointment_date"/>
            </div><br>
            <div class="time">
                <label for="timeInput">Choose a time:</label><br>
                <input type="time" id="timeInput" name="timeInput">
            </div>

            <button type="submit" onclick="validate(event)">Register</button>
        </div>
    </form>
</div>

</body>
</html>
