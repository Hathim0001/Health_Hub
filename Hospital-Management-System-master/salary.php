<html>
    <head>
        <title>Transfer Salary</title>
        <script>
            function validate(event)
            {
                event.preventDefault();
                //alert("Called !");
            }
        </script>
        <link rel="stylesheet" type="text/css" href="Styles.css">
    </head>
    <body>
        <div id="section3">
            <h2>Salary</h2>
        <form onsubmit="return validate()" method="post" target="_blank" action="salary_store.php">
            <label for="eid">Employee ID</label>
            <input type="text" placeholder="Employee ID" name="eid" required><br>
            <label for="hid">Hospital ID</label>
            <input type="text" placeholder="Hospital ID" name="hid" required><br>
            <label for="Amount">Salary Amount</label>
            <input type="text" placeholder="Amount to be transferred" name="sal" required><br>
            <label for="P_date">Payment date</label>
            <input type="date" placeholder="Payment Date" name="p_date" required><br>
            <input type="submit" value="Submit" style="background-color:blue;color:white"/>
        </form>
        </div>
    </body>
</html>