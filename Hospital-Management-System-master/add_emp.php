<html>
    <head>
        <title>Add employee form</title>
        <script>
            function validate(event)
            {
                //event.preventDefault();
                //alert("Called !");
                var flag=0;
                eid=document.querySelector("#eid").value;
                //alert(eid);
                const eid_pattern=/^[0-9]{1,}$/;
                if(eid_pattern.test(eid))
                {
                    // alert("if eid");
                    document.querySelector("#eid").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else eid");
                    document.querySelector("#eid").style.border="2px solid red";
                    document.querySelector("#msg1").innerHTML="INVALID EMPLOYEE ID";
                    document.querySelector("#msg1").style.color="red";
                }

                hid=document.querySelector("#hid").value;
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
                    document.querySelector("#msg2").innerHTML="INVALID HOSPITAL ID";
                    document.querySelector("#msg2").style.color="red";
                }

                var e_name=document.querySelector("#e_name").value;
                const e_name_pattern=/^[a-zA-Z0-9]{3,25}$/;
                if(e_name_pattern.test(e_name))
                {
                    //alert("if e_name");
                    document.querySelector("#e_name").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else e_name");
                    document.querySelector("#e_name").style.border="2px solid red";
                    document.querySelector("#msg3").innerHTML="INVALID EMPLOYEE NAME";
                    document.querySelector("#msg3").style.color="red";
                }

                var e_role=document.querySelector("#e_role").value;
                const e_role_pattern=/^[a-zA-Z0-9]{3,25}$/;
                var oflag=0;
                if(e_role_pattern.test(e_role))
                {
                    //alert("if e_role");
                    const arr=["surgeon","pediatrition","nutritionist","gendoc","driver","nurse","cleaner"];
                    for(var i=0;i<arr.length;i++)
                    {
                        if(e_role==arr[i])
                        {
                            alert("Success !");
                            document.querySelector("#e_role").style.border="2px solid green";
                            flag=flag+1;
                            oflag=1;
                            break;
                        }

                    }
                }
                else
                {
                    //alert("else e_name");
                    document.querySelector("#e_role").style.border="2px solid red";
                    document.querySelector("#msg4").innerHTML="INVALID EMPLOYEE ROLE";
                    document.querySelector("#msg4").style.color="red";
                }

                if(oflag==0)
                {
                    //alert("else e_name");
                    document.querySelector("#e_role").style.border="2px solid red";
                    document.querySelector("#msg4").innerHTML="INVALID EMPLOYEE ROLE";
                    document.querySelector("#msg4").style.color="red";   
                }

                var phone=document.querySelector("#phone").value;
                const phone_pattern=/^[0-9]{10}$/;
                if(phone_pattern.test(phone))
                {
                    //alert("if phone");
                    document.querySelector("#phone").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else phone");
                    document.querySelector("#phone").style.border="2px solid red";
                    document.querySelector("#msg6").innerHTML="INVALID PHONE NUMBER";
                    document.querySelector("#msg6").style.color="red";
                }

                var dept=document.querySelector("#dept").value;
                const dept_pattern=/^[a-zA-Z]{3,25}$/;
                if(dept_pattern.test(dept))
                {
                    //alert("if dept");
                    document.querySelector("#dept").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else dept");
                    document.querySelector("#dept").style.border="2px solid red";
                    document.querySelector("#msg5").innerHTML="INVALID sDEPT NAME";
                    document.querySelector("#msg5").style.color="red";
                }

                var mail=document.querySelector("#mail").value;
                const mail_pattern=/^[a-zA-Z0-9_.]+@[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
                if(mail_pattern.test(mail))
                {
                    //alert("if mail");
                    document.querySelector("#mail").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else mail");
                    document.querySelector("#mail").style.border="2px solid red";
                    document.querySelector("#msg7").innerHTML="INVALID EMAIL";
                    document.querySelector("#msg7").style.color="red";
                }

                var dh=document.querySelector("#dh").value;
                //alert(dh);
                const dh_pattern=/^[0-9]{1,}$/;
                if(dh_pattern.test(dh))
                {
                    //alert("if dh");
                    document.querySelector("#dh").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else dh");
                    document.querySelector("#dh").style.border="2px solid red";
                    document.querySelector("#msg8").innerHTML="INVALID DUTY HOURS";
                    document.querySelector("#msg8").style.color="red";
                }

                var gender=document.querySelector("#gender");

                if(gender.selectedIndex==0)
                {
                    //alert("else gender");
                    document.querySelector("#gender").style.border="2px solid red";
                    document.querySelector("#msg9").innerHTML="INVALID DUTY HOURS";
                    document.querySelector("#msg9").style.color="red";
                }

                else{
                    //alert("if gender");
                    document.querySelector("#gender").style.border="2px solid green";
                    flag=flag+1;
                }

                var spl=document.querySelector("#spl").value;
                const spl_pattern=/^[a-zA-Z]{3,25}$/;
                if(spl_pattern.test(spl))
                {
                    //alert("if spl");
                    document.querySelector("#spl").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else spl");
                    document.querySelector("#spl").style.border="2px solid red";
                    document.querySelector("#msg11").innerHTML="INVALID SPECIALISATION";
                    document.querySelector("#msg11").style.color="red";
                }

                var pe=document.querySelector("#pe").value;
                //alert(pe);
                const pe_pattern=/^[0-9]{1,}$/;
                if(pe_pattern.test(pe))
                {
                    //alert("if pe");
                    document.querySelector("#pe").style.border="2px solid green";
                    flag=flag+1;
                }
                else
                {
                    //alert("else pe");
                    document.querySelector("#pe").style.border="2px solid red";
                    document.querySelector("#msg12").innerHTML="INVALID DUTY HOURS";
                    document.querySelector("#msg12").style.color="red";
                }

                //alert("FLAG : "+flag)

                if(flag==11)
                {
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
            <h2>Add Employee</h2>
            <form method="post" action="add_emp_store.php" target="_blank" onsubmit="return validate()">
            <label for="dob">Date Of Birth</label>
            <input type="date" placeholder="yyyy-mm-dd" name="dob" id="dob">
            <h4 id="msg0"></h4>
            <br>
            <label for="eid">Employee ID</label>
            <input type="text" placeholder="Employee ID" name="eid" id="eid" required>
            <h4 id="msg1"></h4>
            <br>
            <label for="hid">Hospital ID</label>
            <input type="text" placeholder="Hospital ID" name="hid" id="hid" required>
            <h4 id="msg2"></h4>
            <br>
            <label for="e_name">Employee Name</label>
            <input type="text" placeholder="Name" name="e_name" id="e_name" required>
            <h4 id="msg3"></h4>
            <br>
            <label for="e_role">Employee Role</label>
            <input type="text" placeholder="Employee Role" name="e_role" id="e_role" required>
            <h4 id="msg4"></h4>
            <br>
            <label for="dept">Department</label>
            <input type="text" placeholder="Department" name="dept" id="dept" required>
            <h4 id="msg5"></h4>
            <br>
            <label for="contact_no">Contact Number</label>
            <input type="text" placeholder="Contact Number" name="contact_no" id="phone" required>
            <h4 id="msg6"></h4>
            <br>
            <label for="email">Email</label>
            <input type="text" placeholder="Email" name="mail" id="mail" required>
            <h4 id="msg7"></h4>
            <br>
            <label for="duty_hours">Duty Hours</label>
            <input type="text" placeholder="Duty Hours" name="duty_hours" id="dh" required>
            <h4 id="msg8"></h4>
            <br>
            <label for="gender">Gender</label>
            <select placeholder="select an option" name="gender" id="gender" required><br>
            <option value="-1" hidden>Select a Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option></select>
            <h4 id="msg9"></h4>
            <label for="doj">Date Of Joining</label>
            <input type="date" placeholder="yyyy-mm-dd" name="doj" id="doj" required>
            <h4 id="msg10"></h4>
            <br>
            <label for="specialization">Specialization</label>
            <input type="text" placeholder="Specialization" name="spl" id="spl" required>
            <h4 id="msg11"></h4>
            <br>
            <label for="experience">Prior experience</label>
            <input type="text" placeholder="Prior experience" name="pexp" id="pe" required>
            <h4 id="msg12"></h4>
            <br>
            <input type="submit" value="Add Employee"  style="background-color:blue;color:white;"/>
        </form>
    </div>
</body>