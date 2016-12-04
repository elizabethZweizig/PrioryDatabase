<?php require('userlogedin.php'); ?>
<!DOCTYPE html>
  <head>
  <title>Group Overnight Registrations</title>
        <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <h4>Overnight Reservations:</h4>
    <form action="groupOver.php" method="post">
      <!--goes to nightVisit, dayVisit, and bedResID-->

      <!--contact person, hidden, gotten from page value?-->
      <input type="hidden" name="person" value="$_COOKIE['login'].value"/>

      <!--name of group-->
      What is your group's name?
      <input type="text" name="groupName"/></br>

      <!--any special needs-->
      Does your group have any special needs we should be aware of?
      <input type="text" name="groupNeeds"/></br>

      <!--overnight?-->
      Will any of your group be staying overnight?
      <input type="radio" name="overnight" value="true"> Yes</br>
      <input type="radio" name="overnight" value="false" checked> No</br>

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
