<?php require("userlogedin.php"); ?>
<?php include("nav.html"); ?>

<!DOCTYPE html>
<head>
  <title> Reserve a Meeting Room </title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="divclass">
    <h3>Reserve a Meeting Room </h3>
    <form action="reserveDayRooms.php" method = "post">
      Group Name <font color= "red"> *</font> :
      <input type="text" name = "groupName"required/><br>
      Room Requested <font color= "red">*</font> :
      <input type="text" name="roomID"required/><br>
      Number of People in Group <font color= "red">*</font> :
      <input type="number" name="numPpl"required/><br>
      Date Requested: (MM-DD-YYYY) <font color= "red">*</font> :
      <input type= "text" name= "dateUsed"required/><br>
      Start Time: (ex. 15:30) <font color= "red">*</font> :
      <input type= "text" name= "timeIn"required/><br>
      End Time (ex. 17:00) <font color= "red">*</font> :
      <input type= "text" name= "timeOut"required/><br>

      <!--TODO: date the res was made-->
      <script>
      var today = Date.now();
      </script>
      <input type="hidden" name="dateRecvd" value="today"/>

      <input type="submit" value="Submit">
    </form>
  </div>
</body>
