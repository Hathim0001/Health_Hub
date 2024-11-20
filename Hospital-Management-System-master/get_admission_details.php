<html>
    <head>
        <title>Set Admission Details</title>
        <link rel="stylesheet" type="text/css" href="Styles.css">
    </head>
    <body>
        <div id="section3">
            <h2>Set Admission Details</h2>
        <form method="post">
            <label for="pid">Patient ID</label>
            <input type="text" placeholder="Employee ID" name="pid"><br>
            <label for="hid">Hospital ID</label>
            <input type="text" placeholder="Hospital ID" name="hid"><br>
            <label for="Aid">Admission ID</label>
            <input type="text" placeholder="Appointment ID" name="aid"><br>
            <label for="A_date">Admission date</label>
            <input type="date" placeholder="Admission Date" name="a_date"><br>
            <label for="D_date">Discharge Date</label>
            <input type="date" placeholder="Discharge date" name="d_date"><br>
            <label for="Wno">Ward Number</label>
            <input type="text" placeholder="Ward Number" name="Wno"><br>
            <label for="Bed_type">Bed Type</label>
            <select id="alterField" name="bed_type">
                <option value="none"></option>
                <option value="Manual">Manual</option>
                <option value="Semi_Electric">Semi Electric</option>
                <option value="Fully_Electric">Fully Electric</option>
            </select><br>
            <button type="submit">Set Admission Details</button>
        </form>
        </div>
    </body>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $pid=$_POST["pid"];
            $hid=$_POST["hid"];
            $aid=$_POST["aid"];
            $a_date=$_POST["a_date"];
            $d_date=$_POST["d_date"];
            $wno=$_POST["Wno"];
            $bed_type=$_POST["bed_type"];

            echo var_dump(array($pid,$hid,$aid,$a_date,$d_date,$wno,$bed_type));

            $servername="localhost";
            $hostname="root";
            $password="";
            $dbname="hospital";

            $conn=mysqli_connect($servername,$hostname,$password,$dbname);

            if(!$conn)
            {
                echo "<h3>The connection failed due to : ". mysqli_connect_error() . "</h3><br/>";
            }

            else
            {
                echo "<h3>Connection Successful</h3><br/>";
                $sql="INSERT INTO `admission` (`pid`, `aid`, `hid`, `a_date`, `d_date`, `wno`, `bed_type`) VALUES ('$pid', '$aid', '$hid', '$a_date', '$d_date', '$wno', '$bed_type')";
                $result=mysqli_query($conn,$sql);

                if(!$result)
                {
                    echo "<h3>Unable to add record due to : ". mysqli_error($conn) . "</h3><br/>";
                }

            }
        }
    ?>
</html>