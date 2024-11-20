<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        echo "HELLO";

       /* $pid=(int)$_POST["pid"];
        $at=(string)$_POST["adtype"];
        $pt=(string)$_POST["payment-type"];
        $p=(int)$_POST["payment-inpatient"];
        $p+=(int)$_POST["payment-outpatient"];
        echo $p;

        $conn=mysqli_conn("localhost","root","","hospital");
        if(!$conn)
        {
            echo "<h3>Unable to connect due to ". mysqli_connect_error()."</h3>";
        }
        
        $sql="INSERT INTO bill VALUES($pid,$at,$pt,$p)";
        $result=mysqli_query($conn,$sql);
        if(!$result)
        {
            echo "<h3>Unable to insert due to ". mysqli_error($conn)."</h3>";
        }*/
    }
?>