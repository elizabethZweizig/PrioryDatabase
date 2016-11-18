<!DOCTYPE html>
  <head>
  <title>Program Registrations</title>
  </head>
  <body>
    <h4>Program Registrations</h4>
    <form action="DayProgramRegister.php" method="post">
      <!--goes to roster-->

      <!--Program name, required, string-->
      Program<font color="red">*</font>:
      <input type="text" name="programName" required/></br>

      <!--contact person, hidden, gotten from page value?-->
      <!--TODO: getting of pID from sign in (page only accessible if has account)-->
      <input type="hidden" name="contact" value="$_GET['pID']"/></br>

      <!--TODO: date the res was made-->
      <input type="hidden" name="dateRecvd" value=""/>

      <!--number of people being registered-->
      <!--TODO: get total number of people that could be in this group-->
      <select name="numPpl">
        <?php
        $people = 5;
         for ($i = 1; $i <= $people; $i++){
           echo "<option value='$i'> $i </option>";
         }
        ?>
      </select>

      <!--submitting form and required explain-->
      <input type="submit"/> <h6 style="color:red">*required</h6>
    </form>
  </body>
