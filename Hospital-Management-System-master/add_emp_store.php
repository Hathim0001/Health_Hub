<?php
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $dob=$_POST["dob"];
            $eid=$_POST["eid"];
            $hid=$_POST["hid"];
            $e_name=$_POST["e_name"];
            $e_role=$_POST["e_role"];
            $dept=$_POST["dept"];
            $contact_no=$_POST["contact_no"];
            $mail=$_POST["mail"];
            $duty_hours=$_POST["duty_hours"];
            $gender=$_POST["gender"];
            //echo "Gender is : ".$gender;
            $doj=$_POST["doj"];
            $spl=$_POST["spl"];
            $pexp=$_POST["pexp"];

            $servername="localhost";
            $hostname="root";
            $password="";
            $dbname="hospital";

            $conn=mysqli_connect($servername,$hostname,$password,$dbname);

            if(!$conn)
            {
                echo "<h3>Failed to connect due to : ". mysqli_connect_error() ."</h3><br/>";
            }
            else
            {
                //echo "<h3>Connection successful</h3><br/>";

                $sql="INSERT INTO `emp_details` ( `dob`, `eid`, `hid`, `e_name`, `e_role`, `dept`, `contact_no`, `mail`, `duty_hours`, `gender`, `doj`, `spl`, `pexp`) VALUES ( '$dob', '$eid', '$hid', '$e_name', '$e_role', '$dept', '$contact_no', '$mail', '$duty_hours', '$gender', '$doj', '$spl', '$pexp')";
                $result=mysqli_query($conn,$sql);

                if(! $result)
                {
                    echo "<h3>Unable to insert records due to : ". mysqli_error($conn)."</h3>";
                }
                else
                {
                    //echo "<h3>Insertion successful</h3><br/>";

                }
            }
        }
    ?>