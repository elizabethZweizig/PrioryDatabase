<?php require("userlogedin.php"); ?>
<?php include("nav.html"); ?>

<!DOCTYPE html>
  <head>
  <title>Priory Program Setup</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
        <!--TODO: admin require-->
    <div class="divclass">
    <h3>Program Setup</h3>
    <form action="prioryEvent.php" method="post">
      <!--prioryEvent (
        eventID INTEGER PRIMARY KEY,
        startDate TEXT,
        endDate TEXT,
        name TEXT,
        description TEXT
      );-->

      <!--Check in date, required, date-->
      Start Date<font color="red">*</font>:
      <input type="date" name="startDate" required/></br>

      <!--Check out date, required, date-->
      End Date<font color="red">*</font>:
      <input type="date" name="endDate" required/></br>

      <!--program name-->
      Group Name<font color="red">*</font>:
      <input type="text" name="name" required/></br>

      <!--program description-->
        Description:
        <input type="text" name="description"/></br>

      <!--submitting form and required explain-->
      <input type="submit"/> <h6 style="color:red">*required</h6>
    </form>
    </div>
  </body>
