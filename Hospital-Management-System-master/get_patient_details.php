<html>
    <head>
        <title>Get Patient Details</title>
        <link rel="stylesheet" type="text/css" href="Styles.css">
        <style>
            tr{
                background-color:blue;
                color:white;
                border: 2px solid black;
            }
            td{
                background-color:white;
                color:black;
            }

            table
            {
                position:relative;
                left:550px;
                box-shadow:0px 8px 16px rgba(0,0,0,0.3);
            }
        </style>
    </head>
    <body>
        <div id="section3">
            <h2>Get Patient Details</h2>
            <form method="post">
            <label for="pid">Patient ID</label>
            <input type="text" placeholder="Patient ID" name="pid"><br>
            <button type="submit">Get Patient Details</button>
        </form>
    </div>
    <?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $pid=(int)$_POST["pid"];
            //echo "$pid $hid";

            $servername="localhost";
            $username="root";
            $password="";
            $dbname="hospital";
            $conn=mysqli_connect($servername,$username,$password,$dbname);
            if(!$conn)
            {
                echo "<h3 style='red'>Connection Failed Due to : ". mysqli_connect_error() ."</h3>";
            }
            else
            {
                $sql="SELECT * FROM `inpatient`";
                $result=mysqli_query($conn,$sql);

                $num=mysqli_num_rows($result);
                
                if($num<=0)
                {
                    echo "<h3 style='red'>No record present in Table</h3>";
                }

                else
                {
                    echo "<table border='1px' cellspacing='0' cellpadding='10px'><tr><th>pid</th><th>aid</th><th>a_date</th><th>d_date</th><th>wno</th><th>bed_type</th></tr>";
                    while($r=mysqli_fetch_assoc($result))
                    {
                        if($pid==$r["pid"])
                        {
                            echo "<tr>";
                            echo "<td>". $r['pid']."</td>";
                            echo "<td>".$r['aid']."</td>";
                            echo "<td>".$r['a_date']."</td>";
                            echo "<td>".$r['d_date']."</td>";
                            echo "<td>".$r['wno']."</td>";
                            echo "<td>".$r['bed_type']."</td>";
                            echo "</tr>";
                            echo "<br/>";
                        }
                    }
                    echo "</table>";
                }
            }
        }
    ?>
    </body>
</html>