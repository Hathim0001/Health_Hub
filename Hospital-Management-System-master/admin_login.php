<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $admin_id=(int)$_POST["adminUsername"];
        //echo $admin_id;
        $pass=(string)$_POST["adminPassword"];
        //echo $pass;

        $conn=mysqli_connect("localhost","root","","hospital");
        if(!$conn)
        {
            die("<h3>Unable to establish connection : ". $mysqli_connect_error() ."</h3><br/>");
        }

        else
        {
            $sql="SELECT * FROM admin_table";
            $result=mysqli_query($conn,$sql);
            while($row = mysqli_fetch_assoc($result))
            {
                if($pass==$row["password"] && $admin_id==$row["aid"])
                {
                    echo "HELLO<br/>";
                    header("Location: ./admin.php");
                }      
            }

            echo "<h3 style='color:red;position:relative;top:350px;left:550px'>Re-Enter Password</h3>";
            
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="Styles.css">
</head>
<body>
    <div id="adminLogin">
        <h2>Admin Login</h2>
        <form id="adminLoginForm" method="post">
            <div class="form-group">
                <label for="adminUsername">ADMIN ID :</label>
                <input type="text" id="adminUsername" name="adminUsername">
                <div id="adminUsernameError" class="error-message"></div>
            </div>
            <div class="form-group">
                <label for="adminPassword">Password:</label>
                <input type="password" id="adminPassword" name="adminPassword">
                <div id="adminPasswordError" class="error-message"></div>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>