<!DOCTYPE html>
<html>
<head>
    <title>Home Page</title>
    <link rel="stylesheet" type="text/css" href="Styles.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300..700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="section1">
        <h1 style="color: white;">Welcome!</h1>
        <div id="home">
            <table cellspacing="15px">
                <tr>
                    <td><button onclick="window.location.href='admin_login.php'"><img src="Assets/profile_icon.jpg" height="150px" width="150px"></button></td>
                    <td><button onclick="window.location.href='doctor_login.php'"><img src="Assets/doctor_icon.jpg" height="150px" width="150px"></button></td>
                    <td><button onclick="window.location.href='patient_module.php'"><img src="Assets/patient_icon.jpg" height="150px" width="150px"></button></td>
                    <td><button onclick="window.location.href='pharmacist_login.php'"><img src="Assets/pharmacist_icon.jpg" height="150px" width="150px"></button></td>      
                </tr>
                <tr style="text-align: center;">
                    <td>Admin</td>
                    <td>Doctor</td>
                    <td>Patient</td>
                    <td>Pharmacist</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>