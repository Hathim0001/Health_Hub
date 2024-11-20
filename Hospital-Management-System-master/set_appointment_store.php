<?php
    if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        $app_id=$_POST["app_id"];
        $pid=$_POST["pid"];
        $hid=$_POST["hid"];
        $dt=$_POST["dt"];

        $conn=mysqli_connect("localhost","root","","hospital");

        if(!$conn)
        {
            echo "<h3>Unable to connect due to : ". mysqli_connect_error() ."</h3>";
        }

        $sql="INSERT INTO appointment(app_id,pid,doc_id,time) VALUES($app_id,$pid,$hid,'$dt')";
        $result=mysqli_query($conn,$sql);

        if(!$result)
        {
            echo "<h3>Unable to insert due to : ". mysqli_error($conn) ."</h3>";
        }    
    }
?>