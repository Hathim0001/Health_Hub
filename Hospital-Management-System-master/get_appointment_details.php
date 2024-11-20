<html>
    <head>
        <title>Set Appointment Details</title>
        <script>
            function validate(event)
            {
                //event.preventDefault();
                //alert("Called !");
                var flag=0;

                var hid=document.querySelector("#hid").value;
                //alert(hid);
                const hid_pattern=/^[0-9]{1,}$/;
                if(hid_pattern.test(hid))
                {
                    //alert("if hid");
                    document.querySelector("#hid").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else hid");
                    document.querySelector("#hid").style.border="2px solid red";
                    document.querySelector("#msg1").innerHTML="INVALID HOSPITAL ID";
                    document.querySelector("#msg1").style.color="red";
                }

                var pid=document.querySelector("#pid").value;
                //alert(pid);
                const pid_pattern=/^[0-9]{1,}$/;
                if(pid_pattern.test(pid))
                {
                    //alert("if pid");
                    document.querySelector("#pid").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else pid");
                    document.querySelector("#pid").style.border="2px solid red";
                    document.querySelector("#msg0").innerHTML="INVALID PATIENT ID";
                    document.querySelector("#msg0").style.color="red";
                }

                var app_id=document.querySelector("#app_id").value;
                //alert(app_id);
                const app_id_pattern=/^[0-9]{1,}$/;
                if(app_id_pattern.test(app_id))
                {
                    //alert("if app_id");
                    document.querySelector("#app_id").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else app_id");
                    document.querySelector("#app_id").style.border="2px solid red";
                    document.querySelector("#msg2").innerHTML="INVALID APPOINTMENT ID";
                    document.querySelector("#msg2").style.color="red";
                }
                //alert("FLAG : "+flag);

                if(flag==3)
                {
                    //alert("Success .")
                    return true;
                }

                else
                {
                    return false;
                }
                
            }
        </script>
        <link rel="stylesheet" type="text/css" href="Styles.css">
    </head>
    <body>
        <div id="section3">
            <h2>Set Appointment Details</h2>
            <form method="post" action="set_appointment_store.php" target="_blank" onsubmit="return validate()">
            <label for="eid">Patient ID</label>
            <input type="text" placeholder="Employee ID" name="pid" id="pid">
            <h4 id="msg0"></h4>
            <br>
            <label for="hid">Hospital ID</label>
            <input type="text" placeholder="Hospital ID" name="hid" id="hid">
            <h4 id="msg1"></h4>
            <br>
            <label for="Aid">Appointment ID</label>
            <input type="text" placeholder="Appointment ID" name="app_id" id="app_id">
            <h4 id="msg2"></h4>
            <br>
            <label for="A_date">Appointment Date</label>
            <input type="datetime-local" placeholder="Appointment Date" name="dt" id="dt">
            <br>
            <input type="submit" value="Set Appointment" style="background-color:blue;color:white;"/>
        </form>
    </div>
    </body>
</html>