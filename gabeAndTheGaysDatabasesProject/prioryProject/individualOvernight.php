
<?php
require("userlogedin.php");
?>
<!DOCTYPE html>
<head>
  <title>Individual Overnight Registrations</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <h4>Overnight Reservation:</h4>
  <form action="individualOvernightRegister.php" method="post">
    <!--goes to nightVisit, dayVisit, and bedResID-->

    <!--contact person, hidden, gotten from page value?-->
    <input type="hidden" name="person" value="$_COOKIE['login']"/>

    <!--numPpl for indiv is 1-->
    <input type="hidden" name="numPpl" value="1"/>

    <!--Check in date, required, date-->
    Check in<font color="red">*</font>:
    <input type="date" name="checkIn" required/>

    <!--Check in time, required, time-->
    <input type="time" name="timeIn" required/></br>

    <!--Check out date, required, date-->
    Check out<font color="red">*</font>:
    <input type="date" name="checkOut" required/>

    <!--Check out time, required, time-->
    <input type="time" name="timeOut" required/></br>

    <!--date reserve was made-->
    <input type="hidden" name="dateRecvd" id="todayDate"/>
    <script type="text/javascript">
    function getDate()
    {
      var today = new Date();
      var dd = today.getDate();
      var mm = today.getMonth()+1; //January is 0!
      var yyyy = today.getFullYear();
      if(dd<10){dd='0'+dd} if(mm<10){mm='0'+mm}
      today = yyyy+""+mm+""+dd;

      document.getElementById("todayDate").value = today;
    }

    //call getDate() when loading the page
    getDate();
    </script>

    <!--Tour needed, boolean-->
    Would you like to go on a tour of our facilities?
    <input type="radio" name="tour" value="true" checked> Yes.<br>
    <input type="radio" name="tour" value="false"> No.<br>

    <!--submitting form and required explain-->
    <input type="submit"/> <h6 style="color:red">*required</h6>
  </form>
</body>
