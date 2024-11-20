<?php
            if($_SERVER["REQUEST_METHOD"]=="POST")
            {
                //echo "HELLO";
                $eid=$_POST["eid"];
                $hid=$_POST["hid"];
                $sal=$_POST["sal"];
                $p_date=$_POST["p_date"];

                //var_dump(array($eid,$hid,$sal,$p_date));

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

                    $sql="INSERT INTO `salary` (`eid`, `hid`, `sal`, `p_date`) VALUES ('$eid', '$hid', '$sal', '$p_date')";
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