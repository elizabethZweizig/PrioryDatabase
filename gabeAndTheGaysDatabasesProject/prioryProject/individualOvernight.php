<!DOCTYPE html>
  <head>
  <title>Individual Overnight Registrations</title>
  </head>
  <body>
    <?php
      require 'userlogedin.php';
    ?>
    <h4>Overnight Reservation:</h4>
    <form action="individualOvernightRegister.php" method="post">
      <!--goes to nightVisit, dayVisit, and bedResID-->

      <!--contact person, hidden, gotten from page value?-->
      <!--TODO: getting of pID from sign in (page only accessible if has account)-->
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

      <!--TODO: date the res was made-->
      <script>
      var today = Date.now();
      </script>
      <input type="hidden" name="dateRecvd" value="today"/>

      <!--Tour needed, boolean-->
      Would you like to go on a tour of our facilities?
      <input type="radio" name="tour" value="true" checked> Yes.<br>
      <input type="radio" name="tour" value="false"> No.<br>

      <!--submitting form and required explain-->
      <input type="submit"/> <h6 style="color:red">*required</h6>
    </form>
  </body>
